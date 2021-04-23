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
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-list"></i> Tambah Data Pangkat PNS</h1>
    </div>
    <form method="POST" enctype="multipart/form-data" action="{{route('masterdata-pangkatpns-store')}}">
    @csrf
    <div class="card shadow">
        <div class="form-group card-header shadow">
            <div class="row">
                <div class="col">
                    <h3 class="font-weight-bold text-primary"><i class="fas fa-university"></i> Data Pangkat PNS</h3>
                </div>
            </div>
        </div>
        <div class="form-group card-body">    
            <div class="row">
                <div class='col'>
                    <label for="pangkat" class="font-weight-bold text-dark">Jenis Pangkat</label>
                    <select class="form-control" id="pangkat" name="pangkat">
                        <option value="" selected>Pilih Jenis Serdos</option>
                        <option value="Penata Muda">Penata Muda</option>
                        <option value="Penata Muda Tk. I">Penata Muda Tk. I</option>
                        <option value="Penata">Penata</option>
                        <option value="Penata Tk. I">Penata Tk. I</option>
                        <option value="Pembina">Pembina</option>
                        <option value="Pembina Tk. I">Pembina Tk. I</option>
                        <option value="Pembina Utama Muda">Pembina Utama Muda</option>
                        <option value="Pembina Utama Madya">Pembina Utama Madya</option>
                        <option value="Pembina Utama">Pembina Utama</option>
                        <option value="CPNS - 3A">CPNS - 3A</option>
                        <option value="CPNS - 3B">CPNS - 3B</option>
                        <option value="CPNS Belum Memiliki Pangkat">CPNS Belum Memiliki Pangkat</option>
                        <option value="Tidak ada data">Tidak ada data</option>
                    </select>
                    <small style="color: red">
                        @error('pangkat')
                            {{$message}}
                        @enderror
                    </small>
                </div>
                <div class='col'>
                    <label for="golongan" class="font-weight-bold text-dark">Jenis Golongan</label>
                    <select class="form-control" id="golongan" name="golongan">
                        <option value="" selected>Pilih Jenis Golongan</option>
                        <option value="Gol. III/a">Gol. III/a</option>
                        <option value="Gol. III/b">Gol. III/b</option>
                        <option value="Gol. III/c">Gol. III/c</option>
                        <option value="Gol. III/d">Gol. III/d</option>
                        <option value="Gol. IV/a">Gol. IV/a</option>
                        <option value="Gol. IV/b">Gol. IV/b</option>
                        <option value="Gol. IV/c">Gol. IV/c</option>
                        <option value="Gol. IV/d">Gol. IV/d</option>
                        <option value="Gol. IV/e">Gol. IV/e</option>
                        <option value="Belum memiliki pangkat">Belum memiliki pangkat</option>
                        <option value="Tidak ada data">Tidak ada data</option>
                    </select>
                    <small style="color: red">
                        @error('golongan')
                            {{$message}}
                        @enderror
                    </small>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin Ingin Menambah Data?')"><i class="fas fa-save"></i> Simpan</button>
                    <a href="{{route('masterdata-pangkatpns-index')}}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</a>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection