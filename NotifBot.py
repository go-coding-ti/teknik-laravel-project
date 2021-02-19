import json
import requests
import time
import urllib
import mysql.connector
import linecache
import sys
from datetime import datetime
from dateutil.relativedelta import relativedelta
from multiprocessing import Process

#konektor database
db = mysql.connector.connect(
            host="localhost",
            user="root",
            passwd="P3rson@5",
            auth_plugin="mysql_native_password",
            db="kepangkatan_db")

#token dari bot setelah daftar di @botfather
TOKEN = "1612136099:AAHceVlIADjGbVvdbiO498tMUb4ezFVKqpU"
#url dari bot
URL = "https://api.telegram.org/bot{}/".format(TOKEN)

def PrintException():
    exc_type, exc_obj, tb = sys.exc_info()
    f = tb.tb_frame
    lineno = tb.tb_lineno
    filename = f.f_code.co_filename
    linecache.checkcache(filename)
    line = linecache.getline(filename, lineno, f.f_globals)
    print('EXCEPTION IN ({}, LINE {} "{}"): {}'.format(filename, lineno, line.strip(), exc_obj))


#fungsi untuk mendapatkan url lalu ditaruh di variabel content
def get_url(url):
    response = requests.get(url)
    content = response.content.decode("utf8")
    return content

#fungsi untuk mendapatkan file json dari url lalu ditaruh di variabel js
def get_json_from_url(url):
    content = get_url(url)
    js = json.loads(content)
    return js


#fungsi untuk mendapatkan chat id dan text terbaru lalu ditaruh di variabel text dan chat_id
def get_last_chat_id_and_text(updates):
    num_updates = len(updates["result"])
    last_update = num_updates - 1
    text = updates["result"][last_update]["message"]["text"]
    chat_id = updates["result"][last_update]["message"]["chat"]["id"]
    return (text, chat_id)

#fungsi untuk mendapatkan update json
def get_updates(offset=None):
    url = URL + "getUpdates?timeout=100"
    if offset:
        url += "&offset={}".format(offset)
    js = get_json_from_url(url)
    return js

#fungsi untuk mendapatkan id update terbaru
def get_last_update_id(updates):
    update_ids = []
    for update in updates["result"]:
        update_ids.append(int(update["update_id"]))
    return max(update_ids)

#fungsi untuk mengirim pesan, data pesan akan di parse ke url
def send_message(text, chat_id):
    text = urllib.parse.quote_plus(text)
    url = URL + "sendMessage?text={}&chat_id={}".format(text, chat_id)
    get_url(url)


#fungsi untuk mengambil data dari database lalu dikirim ke fungsi send_message
#untuk selanjutnya nnti bakal dikirim ke user
def regist(updates):
    for update in updates["result"]:
        db = mysql.connector.connect(
            host="localhost",
            user="root",
            passwd="P3rson@5",
            auth_plugin="mysql_native_password",
            db="kepangkatan_db")
        cursor = db.cursor()
        try:
            text = update["message"]["text"]
            chat = update["message"]["chat"]["id"]
            nipcek = str(text)
            cursor.execute("select chat_id from tb_dosen where nip like %s limit 1",(("%" + nipcek + "%",)))
            checkid = cursor.fetchone()
            cursor.close()

            cursor = db.cursor()
            cursor.execute("select nip from tb_dosen where nip like %s limit 1", (("%" + nipcek + "%",)))
            checknip = cursor.fetchone()
            cursor.close()

            if(str(checknip[0])) is not None:
                if(text == str(checknip[0])):
                    if(checkid[0] == None):
                        ids = str(chat)
                        cursor = db.cursor()
                        insertChatId = "update tb_dosen set chat_id = '%s' where nip = %s" % (ids,checknip[0])
                        cursor.execute(insertChatId)
                        db.commit()
                        send_message("Telegram berhasil terdaftar!", chat)
                    else:
                        send_message("Telegram sudah terdaftar!", checkid[0])
                else:
                    send_message("NIP tidak ditemukan!", checkid[0])
                    print(nipcek)

        except Exception:
            PrintException()

def notification():
    while True:
        checktahun = datetime.now() - relativedelta(years=2)
        cekdate = checktahun.date()

        cursor = db.cursor()
        cursor.execute("select chat_id from tb_dosen where tmt_keaktifan like %s", (("%" + str(cekdate) + "%",)))
        tahun = cursor.fetchall()
        cursor.close()

        for i in tahun:
            print(i)

        break




#fungsi main yang digunakan untuk looping tidak terbatas dengan while true
#fungsi main disini memanggil fungsi ngerjain_sendiri dan looping koneksi ke database
def main():
    last_update_id = None
    db = mysql.connector.connect(
        host="localhost",
        user="root",
        passwd="P3rson@5",
        auth_plugin="mysql_native_password",
        db="kepangkatan_db")
    while True:
        updates = get_updates(last_update_id)
        if len(updates["result"]) > 0:
            last_update_id = get_last_update_id(updates) + 1
            regist(updates)
        db.close()
        time.sleep(0.5)

#fungsi yang memanggil fungsi main
if __name__ == '__main__':
    proc1 = Process(target=main)
    proc1.start()

    proc2 = Process(target=notification)
    proc2.start()
