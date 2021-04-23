@extends('userlayout.layout')
@section('content')
@section('add_js')
    <script src="{{ asset('assets/admin/js/bootstrap-show-password.js')}}"></script>
@endsection
<div class="container-fluid">
    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-times"></i> 
        {{ Session::get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fa fa-check"></i> {{Session::get('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <form method="POST" enctype="multipart/form-data" action="/">
    @csrf
    <div class="card shadow">
        <div class="form-group card-header shadow">
            <div class="row">
                <div class="col">
                    <h3 class="font-weight-bold text-primary"><i class="fas fa-key"></i> Change Password</h3>
                </div>
            </div>
        </div>
        <div class="form-group card-body">
            <h6><b>*Harap ganti password anda sebelum mengakses semua fitur pada laman ini</b></h6>
            <br>
            <label for="oldpass" class="font-weight-bold text-dark">Masukan Password Lama</label>
            <div class="input-group mb-4">    
                <input type="password" class="form-control" id="oldpass" name="oldpass" placeholder="Masukan Password Lama" data-toggle="password">
            </div>
            <small style="color: red">
                @error('oldpass')
                    {{$message}}
                @enderror
            </small>

            <label for="newpass" class="font-weight-bold text-dark">Masukan Password Baru</label>
            <div class="input-group mb-4">
                <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Masukan Password Baru" data-toggle="password">
            </div>
            <small style="color: red">
                @error('newpass')
                    {{$message}}
                @enderror
            </small>
            
            <label for="confirmpass" class="font-weight-bold text-dark">Konfirmasi Password</label>
            <div class="input-group mb-4">
                <input type="password" class="form-control" id="confirmpass" name="confirmpass" placeholder="Konfirmasi Password">
            </div>
            <small style="color: red">
                @error('confirmpass')
                    {{$message}}
                @enderror
            </small>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin')"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection