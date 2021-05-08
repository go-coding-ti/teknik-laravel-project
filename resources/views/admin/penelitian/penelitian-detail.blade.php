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
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-list"></i> Detail Data Penelitian</h1>
    </div>
    <form method="POST" enctype="multipart/form-data" action="{{route('penelitian-detail', $datapenelitian->id_penelitian)}}">
    @csrf
        <div class="card shadow">
                <div class="form-group card-header shadow">
                    <div class="row">
                        <div class="col">
                            <h3 class="font-weight-bold text-primary"><i class="fas fa-search"></i> Detail Penelitian</h3>
                        </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin Ingin Mengupdate Data?')"><i class="fas fa-save"></i> Update</button>
                            <a href="{{route('penelitian-list')}}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</a>
                        </div>
                    </div>
                </div>
        </div>
                <div class="form-group card-body">
                    <div class="row align-items-center">
                        <div class="col col-10 ">
                            <label for="judul" class="font-weight-bold text-dark">Judul Penelitian</label>                                
                                @if($datapenelitian->judul != null)
                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Penelitian" value="{{$datapenelitian->judul}}">
                                @else
                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul Penelitian" value="">
                                @endif
                        </div>
                        <div class="col col-2 ">
                            <label for="tahunajaran" class="font-weight-bold text-dark">Tahun Ajaran</label>                                
                                @if($tahunajaran != null)
                                    <input type="text" class="form-control" id="tahunajaran" name="tahunajaran" placeholder="Masukan Tahun Ajaran" value="{{$tahunajaran->semester}} {{$tahunajaran->tahun_ajaran}}">
                                @else
                                    <input type="text" class="form-control" id="tahunajaran" name="tahunajaran" placeholder="Masukan Tahun Ajaran" value="">
                                @endif
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col col-2">
                            <label for="isbn" class="font-weight-bold text-dark">ISBN</label>
                                @if($datapenelitian->isbn != null)
                                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Masukan ISBN" value="{{$datapenelitian->isbn}}">
                                @else
                                    <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Masukan ISBN" value="">
                                @endif
                        </div>
                        <div class="col col-2">
                            <label for="penerbit" class="font-weight-bold text-dark">Penerbit</label>
                                @if($datapenelitian->penerbit != null)
                                    <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukan Penerbit" value="{{$datapenelitian->penerbit}}">
                                @else
                                    <input type="text" class="form-control" id="penerbir" name="penerbit" placeholder="Masukan Penerbit" value="">
                                @endif
                        </div>
                        <div class="col col-2">
                            <label for="edisi" class="font-weight-bold text-dark">Edisi</label>
                                @if($datapenelitian->edisi != null)
                                    <input type="text" class="form-control" id="edisi" name="edisi" placeholder="Masukan Edisi" value="{{$datapenelitian->edisi}}">
                                @else
                                    <input type="text" class="form-control" id="edisi" name="edisi" placeholder="Masukan Edisi" value="">
                                @endif
                        </div>
                        <div class="col col-2">
                            <label for="jumhal" class="font-weight-bold text-dark">Jumlah Halaman</label>
                                @if($datapenelitian->jumlah_halaman != null)
                                    <input type="text" class="form-control" id="jumhal" name="jumhal" placeholder="Masukan Judul Penelitian" value="{{$datapenelitian->jumlah_halaman}}">
                                @else
                                    <input type="text" class="form-control" id="jumhal" name="jumhal" placeholder="Masukan Judul Penelitian" value="">
                                @endif
                        </div>
                        <div class="col col-2">
                            <label for="bulan" class="font-weight-bold text-dark">Bulan Publikasi</label>
                                @if($datapenelitian->bulan_publikasi != null)
                                    <input type="text" class="form-control" id="bulan" name="bulan" placeholder="Masukan Bulan publikasi" value="{{$datapenelitian->bulan_publikasi}}">
                                @else
                                    <input type="text" class="form-control" id="bulan" name="bulan" placeholder="Masukan Bulan Publikasi" value="">
                                @endif
                        </div>
                        <div class="col col-2">
                            <label for="tahun" class="font-weight-bold text-dark">Tahun Publikasi</label>
                                @if($datapenelitian->tahun_publikasi != null)
                                    <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukan Tahun Publikasi" value="{{$datapenelitian->tahun_publikasi}}">
                                @else
                                    <input type="text" class="form-control" id="tahun" name="tahun" placeholder="Masukan Tahun Publikasi" value="">
                                @endif
                        </div>
                    </div>
                    <div class="row row-cols-4 align-items-center">
                    <div class="col col-12">
                            <label for="keterangan" class="font-weight-bold text-dark">Keterangan</label>
                                @if($datapenelitian->keterangan != null)
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Tahun Publikasi" value="{{$datapenelitian->keterangan}}">
                                @elseif($alltahun != null)
                                <select class="form-control" id="JenisSerdos" name="jenisserdos">
                                <option value="" >Pilih Jenis Serdos</option>
                                    @foreach($alltahun as $tahun)
                                        <option value="$tahun->id" >{{$tahun->semester}} {{$tahun->tahun_ajaran}}</option>
                                    @endforeach
                                </select>
                                @endif
                    </div>
                    </div>
                </div>
    </form>
</div>
@endsection