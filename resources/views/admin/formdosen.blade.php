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
                <div class="row card-header">
                    <div class="col">
                        <label for="nidn" class="font-weight-bold text-dark">NIDN/NIDK/NUP</label>
                        <input type="text" class="form-control" id="nidn" placeholder="">
                    </div>
                    <div class="col">
                        <label for="nip" class="font-weight-bold text-dark">NIP</label>
                        <input type="text" class="form-control" id="nip" placeholder="Last name">
                    </div>
                    <div class="col ">
                        <img src="" style="height:120px;width:100px;" class="align-self-center" id="propic">
                        <input type="file" class="form-control mt-2" name="file">
                    </div>
                </div>
                    <label for="InputName" class="font-weight-bold text-dark">Nama Lengkap</label>
                    <input type="text" class="form-control" id="InputName"  placeholder="">
                </div>
                <div class="form-group card-header">
                <div class="row card-header">
                    <div class="col">
                        <label for="gelardepan" class="font-weight-bold text-dark">Gelar Depan</label>
                        <input type="text" class="form-control" id="gelardepan" placeholder="">
                    </div>
                    <div class="col">
                        <label for="gelarbelakang" class="font-weight-bold text-dark">Gelar Belakang</label>
                        <input type="text" class="form-control" id="gelarbelakang" placeholder="">
                    </div>
                </div>
                <div class="form-group card-header">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection