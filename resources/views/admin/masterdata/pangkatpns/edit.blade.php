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
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-list"></i> Edit Data Pangkat PNS</h1>
    </div>
    <form method="POST" enctype="multipart/form-data" action="/admin/masterdata/pangkatpns/update/{{$datapp->id_pangkat_pns}}">
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
                    <label for="pangkat" class="font-weight-bold text-dark">Jenis pangkat</label>
                    <select class="form-control" id="pangkat" name="pangkat">
                        <option value="" {{ $datapp->pangkat==NULL ? 'selected' : '' }}>Pilih Jenis Serdos</option>
                        <option value="Penata Muda" {{ $datapp->pangkat=="Penata Muda" ? 'selected' : '' }}>Penata Muda</option>
                        <option value="Penata Muda Tk. I" {{ $datapp->pangkat=="Penata Muda Tk. I" ? 'selected' : '' }}>Penata Muda Tk. I</option>
                        <option value="Penata" {{ $datapp->pangkat=="Penata" ? 'selected' : '' }}>Penata</option>
                        <option value="Penata Tk. I" {{ $datapp->pangkat=="Penata Tk. I" ? 'selected' : '' }}>Penata Tk. I</option>
                        <option value="Pembina" {{ $datapp->pangkat=="Pembina" ? 'selected' : '' }}>Pembina</option>
                        <option value="Pembina Tk. I" {{ $datapp->pangkat=="Pembina Tk. I" ? 'selected' : '' }}>Pembina Tk. I</option>
                        <option value="Pembina Utama Muda" {{ $datapp->pangkat=="Pembina Utama Muda" ? 'selected' : '' }}>Pembina Utama Muda</option>
                        <option value="Pembina Utama Madya" {{ $datapp->pangkat=="Pembina Utama Madya" ? 'selected' : '' }}>Pembina Utama Madya</option>
                        <option value="Pembina Utama" {{ $datapp->pangkat=="Pembina Utama" ? 'selected' : '' }}>Pembina Utama</option>
                        <option value="CPNS - 3A" {{ $datapp->pangkat=="CPNS - 3A" ? 'selected' : '' }}>CPNS - 3A</option>
                        <option value="CPNS - 3B" {{ $datapp->pangkat=="CPNS - 3B" ? 'selected' : '' }}>CPNS - 3B</option>
                        <option value="CPNS Belum Memiliki Pangkat" {{ $datapp->pangkat=="CPNS Belum Memiliki Pangkat" ? 'selected' : '' }}>CPNS Belum Memiliki Pangkat</option>
                        <option value="Tidak ada data" {{ $datapp->pangkat=="Tidak ada data" ? 'selected' : '' }}>Tidak ada data</option>
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
                        <option value="Gol. III/a" {{ $datapp->golongan=="Gol. III/a" ? 'selected' : '' }}>Gol. III/a</option>
                        <option value="Gol. III/b" {{ $datapp->golongan=="Gol. III/b" ? 'selected' : '' }}>Gol. III/b</option>
                        <option value="Gol. III/c" {{ $datapp->golongan=="Gol. III/c" ? 'selected' : '' }}>Gol. III/c</option>
                        <option value="Gol. III/d" {{ $datapp->golongan=="Gol. III/d" ? 'selected' : '' }}>Gol. III/d</option>
                        <option value="Gol. IV/a" {{ $datapp->golongan=="Gol. IV/a" ? 'selected' : '' }}>Gol. IV/a</option>
                        <option value="Gol. IV/b" {{ $datapp->golongan=="Gol. IV/b" ? 'selected' : '' }}>Gol. IV/b</option>
                        <option value="Gol. IV/c" {{ $datapp->golongan=="Gol. IV/c" ? 'selected' : '' }}>Gol. IV/c</option>
                        <option value="Gol. IV/d" {{ $datapp->golongan=="Gol. IV/d" ? 'selected' : '' }}>Gol. IV/d</option>
                        <option value="Gol. IV/e" {{ $datapp->golongan=="Gol. IV/e" ? 'selected' : '' }}>Gol. IV/e</option>
                        <option value="Belum memiliki pangkat" {{ $datapp->golongan=="Belum memiliki pangkat" ? 'selected' : '' }}>Belum memiliki pangkat</option>
                        <option value="Tidak ada data" {{ $datapp->golongan=="Tidak ada data" ? 'selected' : '' }}>Tidak ada data</option>
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