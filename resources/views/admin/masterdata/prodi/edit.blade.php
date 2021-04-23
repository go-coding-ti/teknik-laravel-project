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
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-list"></i> Edit Data Prodi</h1>
    </div>
    <form method="POST" enctype="multipart/form-data" action="/admin/masterdata/prodi/update/{{$dataprodi->id_prodi}}">
    @csrf
    <div class="card shadow">
        <div class="form-group card-header shadow">
            <div class="row">
                <div class="col">
                    <h3 class="font-weight-bold text-primary"><i class="fas fa-university"></i> Data Prodi</h3>
                </div>
            </div>
        </div>
        <div class="form-group card-body">    
            <div class="row">
                <div class='col'>
                    <label for="id_fakultas" class="font-weight-bold text-dark">Fakultas</label>
                    <select class="form-control" id="id_fakultas" name="id_fakultas">
                        <option value="" selected>Pilih Unit</option>
                            @foreach($unit as $u)
                                <option value="{{$u->id_fakultas}}" {{ $dataprodi->id_fakultas==$u->id_fakultas ? 'selected' : '' }}>{{$u->fakultas}}</option>
                            @endforeach
                    </select>
                    <small style="color: red">
                        @error('id_fakultas')
                            {{$message}}
                        @enderror
                    </small>
                </div>
                <div class='col'>
                    <label for="prodi" class="font-weight-bold text-dark">Nama Prodi</label>
                    <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Masukan Nama Prodi" value="{{$dataprodi->prodi}}">
                    <small style="color: red">
                        @error('prodi')
                            {{$message}}
                        @enderror
                    </small>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin Ingin Menambah Data?')"><i class="fas fa-save"></i> Simpan</button>
                    <a href="{{route('masterdata-prodi-index')}}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</a>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection