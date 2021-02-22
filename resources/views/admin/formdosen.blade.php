@extends('adminlayout.layout')
@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Dosen</h6>
        </div>

        <div class="card shadow">
            <form method="POST" enctype="multipart/form-data" action="">
                <div class="form-group card-header">
                    <div class="row align-items-center">
                        <div class="col col-4">
                            <label for="nidn" class="font-weight-bold text-dark">NIDN/NIDK/NUP</label>
                            <input type="text" class="form-control" id="nidn" placeholder="">
                        </div>
                        <div class="col col-4">
                            <label for="nip" class="font-weight-bold text-dark">NIP</label>
                            <input type="text" class="form-control" id="nip" placeholder="Last name">
                        </div>
                        <div class="col col-sm-1">
                        
                        </div>
                        <div class="col">
                            <img src="" class="mb-3" style="height:120px;width:100px;" id="propic">
                            <input type="file" class="form-control-file" name="file">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="gelardepan" class="font-weight-bold text-dark">Gelar Depan</label>
                            <input type="text" class="form-control" id="gelardepan" placeholder="">
                        </div>
                        <div class="col">
                            <label for="InputName" class="font-weight-bold text-dark">Nama Lengkap</label>
                            <input type="text" class="form-control" id="InputName"  placeholder="">
                        </div>
                        <div class="col">
                            <label for="gelarbelakang" class="font-weight-bold text-dark">Gelar Belakang</label>
                            <input type="text" class="form-control" id="gelarbelakang" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-lg-2">
                            <label for="InputTempatLahir" class="font-weight-bold text-dark">Status Dosen</label>
                            <select class="form-control">
                                <option value="test">test</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="InputTempatLahir" class="font-weight-bold text-dark">Tempat Lahir</label>
                            <input type="text" class="form-control" id="InputTempatLahir"  placeholder="">
                        </div>
                        <div class="col">
                            <label for="InputTanggalLahir" class="font-weight-bold text-dark">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="InputTanggalLahir"  placeholder="">
                        </div>
                        <div class="col col-lg-2">
                            <label for="JenisKelamin" class="font-weight-bold text-dark">Jenis Kelamin</label>
                            <select class="form-control">
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="InputAlamatDomisili" class="font-weight-bold text-dark">Alamat Domisili (Tinggal Sekarang)</label>
                            <input type="text" class="form-control" id="InputAlamatDomisili"  placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="InputAlamatRumah" class="font-weight-bold text-dark">Alamat Rumah (Sesuai KK/KTP)</label>
                            <input type="text" class="form-control" id="InputAlamatRumah"  placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection