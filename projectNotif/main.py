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

#token dari bot setelah daftar di @botfather
TOKEN = "1612136099:AAHceVlIADjGbVvdbiO498tMUb4ezFVKqpU"
#url dari bot
URL = "https://api.telegram.org/bot{}/".format(TOKEN)
dbs = mysql.connector.connect(
        host="localhost",
        user="root",
        passwd="Dragoncit1234",
        db="kepangkatan_db")

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
        db = dbs
        try:
            text = update["message"]["text"]
            chat = update["message"]["chat"]["id"]
            nipcek = str(text)

            cursor = db.cursor()
            cursor.execute("select chat_id from tb_dosen where nip like %s limit 1",(("%" + nipcek + "%",)))
            checkid = cursor.fetchone()
            cursor.close()

            cursor = db.cursor()
            cursor.execute("select nip from tb_dosen where nip like %s limit 1", (("%" + nipcek + "%",)))
            checknip = cursor.fetchone()
            cursor.close()

            cursor = db.cursor()
            cursor.execute("select nama from tb_dosen where nip like %s limit 1", (("%" + nipcek + "%",)))
            nama = cursor.fetchone()
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
                        print(chat)
                    else:
                        message = "Telegram sudah terdaftar!\nNama Dosen: %s" % (nama[0])
                        send_message(message, checkid[0])
                        print(checkid[0])
                else:
                    send_message("NIP tidak ditemukan!", checkid[0])
                    print(nipcek)

        except Exception:
            PrintException()

def notification():
    db = mysql.connector.connect(
        host="localhost",
        user="root",
        passwd="Dragoncit1234",
        db="kepangkatan_db")
    upharian = datetime.now() - relativedelta(years=0)
    uphari = upharian.date()

    harian = []
    cursor = db.cursor()
    cursor.execute("select notification_table.chat_id, notification_table.cek_hari, tb_dosen.nama, notification_table.flag, notification_table.id_kepangkatan, notification_table.nip_dosen from notification_table inner join tb_dosen on tb_dosen.nip = notification_table.nip_dosen")
    harian = cursor.fetchall()
    cursor.close()

    for h in harian:
        hku = str(h[1] + relativedelta(days=7))
        if (str(uphari) == hku and h[3] == 0):
            db = mysql.connector.connect(
                host="localhost",
                user="root",
                passwd="Dragoncit1234",
                db="kepangkatan_db")
            # idku = ''.join(x)
            send_message("*This Message is Generated by System*\nDosen atas nama: %s\nNIP: %s \nAnda Berhak Mendapatkan kenaikan Pangkat!" % (h[2], h[5]), h[0])
            cursor = db.cursor()

            upDate = "update notification_table set cek_hari = '%s' where id_kepangkatan = %s" % (str(uphari),h[4])
            cursor.execute(upDate)
            db.commit()

            upDateF = "update notification_table set flag = %s where id_kepangkatan = %s" % (1, h[4])
            cursor.execute(upDateF)
            db.commit()

            db.close()
            print("Ada Notif untuk", h[2])
        elif(str(uphari) == hku and h[3] == 1):
            db = mysql.connector.connect(
                host="localhost",
                user="root",
                passwd="Dragoncit1234",
                db="kepangkatan_db")
            # idku = ''.join(x)
            send_message("*This Message is Generated by System*\nDosen atas nama: %s\nNIP: %s \nAnda Berhak Mendapatkan kenaikan Pangkat!" % (h[2], h[5]), h[0])
            cursor = db.cursor()

            upDate = "update notification_table set cek_hari = '%s' where chat_id = %s" % (str(uphari), h[0])
            cursor.execute(upDate)
            db.commit()

            upDateF = "update notification_table set flag = %s where id_kepangkatan = %s" % (2, h[4])
            cursor.execute(upDateF)
            db.commit()

            db.close()
            print("Ada Notif untuk", h[2])
        else:
            print("Tidak Ada Notif")

#fungsi main yang digunakan untuk looping tidak terbatas dengan while true
#fungsi main disini memanggil fungsi ngerjain_sendiri dan looping koneksi ke database
def main():
    last_update_id = None
    while True:
        notification()
        updates = get_updates(last_update_id)
        if len(updates["result"]) > 0:
            last_update_id = get_last_update_id(updates) + 1
            regist(updates)
        time.sleep(0.1)

#fungsi yang memanggil fungsi main
if __name__ == '__main__':
    proc1 = Process(target=main)
    proc1.start()