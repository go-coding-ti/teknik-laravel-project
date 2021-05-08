@extends('adminlayout.layout')
@section('content')
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
    <div style="margin-left: 10px;" class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-list"></i> Tambah Data Tahun Ajaran</h1>
    </div>
    <form method="POST" enctype="multipart/form-data" action="{{route('masterdata-tahunajaran-store')}}">
    @csrf
    <div class="card shadow">
        <div class="form-group card-header shadow">
            <div class="row">
                <div class="col">
                    <h3 class="font-weight-bold text-primary"><i class="fas fa-university"></i> Data Tahun Ajaran</h3>
                </div>
            </div>
        </div>
        <div class="form-group card-body">    
            <div class="row">
                <div class='col'>
                    <label for="semester" class="font-weight-bold text-dark">Semester</label>
                    <select class="form-control" id="semester" name="semester">
                        <option value="" selected>Pilih Semester</option>
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
                    <small style="color: red">
                        @error('semester')
                            {{$message}}
                        @enderror
                    </small>
                </div>
                <div class='col'>
                    <label for="tahunajaran" class="font-weight-bold text-dark">Tahun Ajaran</label>
                    <input type="text" class="form-control" id="tahunajaran" name="tahunajaran" placeholder="Masukan Tahun Ajaran">
                    <small>
                        *Contoh Format Input Tahun Ajaran: 2020 
                    </small>
                    <small style="color: red">
                        @error('tahunajaran')
                            {{$message}}
                        @enderror
                    </small>
                </div>
                <div class='col'>
                    <label for="statusta" class="font-weight-bold text-dark">Status</label>
                    <select class="form-control" id="statusta" name="statusta">
                        <option value="" selected>Pilih Status</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Non-Aktif">Non-Aktif</option>
                    </select>
                    <small style="color: red">
                        @error('statusta')
                            {{$message}}
                        @enderror
                    </small>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin Ingin Menambah Data?')"><i class="fas fa-save"></i> Simpan</button>
                    <a href="{{route('masterdata-tahunajaran-index')}}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</a>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection