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
    <form method="POST" enctype="multipart/form-data" action="{{route('penelitian-update', $datapenelitian->id_penelitian)}}">
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
            <div class="form-group card-body mb-5">
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
                            @elseif($alltahun != null)
                                <select class="form-control" id="tahunajaran" name="tahunajaran">
                                <option value="" >Pilih Tahun Ajaran</option>
                                @foreach($alltahun as $tahun)
                                    <option value="{{$tahun->id}}" >{{$tahun->semester}} {{$tahun->tahun_ajaran}}</option>
                                @endforeach
                            </select>
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
                                <input type="text" class="form-control" id="jumhal" name="jumhal" placeholder="Masukan Jumlah Halaman" value="{{$datapenelitian->jumlah_halaman}}">
                            @else
                                <input type="text" class="form-control" id="jumhal" name="jumhal" placeholder="Masukan Jumlah Halaman" value="">
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
                <div class="row row align-items-center">
                       <div class="col col-12">
                            <label for="keterangan" class="font-weight-bold text-dark">Keterangan</label>
                                @if($datapenelitian->keterangan != null)
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Keterangan" value="{{$datapenelitian->keterangan}}">
                                @else
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Keterangan" value="">
                                @endif
                        </div>
                </div>
                <div class="row row align-items-center">
                       <div class="col col-12">
                            <label for="keterangan" class="font-weight-bold text-dark">Status Validitas</label>
                                @if($datapenelitian->status_validitas != null)
                                    <input type="text" class="form-control" id="statvalid" name="statvalid" placeholder="Masukan Status Validitas" value="{{$datapenelitian->status_validitas}}">
                                @else
                                    <input type="text" class="form-control" id="statvalid" name="statvalid" placeholder="Masukan Status Validitas" value="">
                                @endif
                        </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card shadow">
            <div class="form-group card-header shadow">
                <div class="row">
                    <div class="col">
                        <h3 class="font-weight-bold text-primary"><i class="fas fa-search"></i> File Penelitian</h3>
                    </div>
                </div>
            </div>
            <div class="form-group card-body mb-4">
                    <div class="row align-items-center">
                        <div class="col col-6 ">
                            <label for="filesktugas" class="font-weight-bold text-dark">File SK Tugas</label>                                
                                @if($datapenelitian->file_sk_tugas != null)
                                    <input type="text" class="form-control" id="filesktugas" name="filesktugas" placeholder="Masukan Link File" value="{{$datapenelitian->file_sk_tugas}}">
                                @else
                                    <input type="text" class="form-control" id="filesktugas" name="filesktugas" placeholder="Masukan Link File" value="">
                                @endif
                        </div>
                        <div class="col col-6 ">
                            <label for="filebukitkerja" class="font-weight-bold text-dark">File Bukti Kerja</label>                                
                                @if($datapenelitian->file_bukti_kerja != null)
                                    <input type="text" class="form-control" id="filebuktikerja" name="filebuktikerja" placeholder="Masukan Link File" value="{{$datapenelitian->file_bukti_kerja}}">
                                @else
                                    <input type="text" class="form-control" id="filebuktikerja" name="filebuktikerja" placeholder="Masukan Link File" value="">
                                @endif
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col col-6 ">
                            <label for="file2" class="font-weight-bold text-dark">File 1</label>                                
                                @if($datapenelitian->file_1 != null)
                                    <input type="text" class="form-control" id="file1" name="file1" placeholder="Masukan Link File" value="{{$datapenelitian->file_1}}">
                                @else
                                    <input type="text" class="form-control" id="file1" name="file1" placeholder="Masukan Link File" value="">
                                @endif
                        </div>
                        <div class="col col-6 ">
                            <label for="file2" class="font-weight-bold text-dark">File 2</label>                                
                                @if($datapenelitian->file_2 != null)
                                    <input type="text" class="form-control" id="file2" name="file2" placeholder="Masukan Link File" value="{{$datapenelitian->file_2}}">
                                @else
                                    <input type="text" class="form-control" id="file2" name="file2" placeholder="Masukan Link File" value="">
                                @endif
                        </div>
                    </div>
            </div>
        </div>
        <br>
        <div class="card shadow">
            <div class="form-group card-header shadow">
                <div class="row">
                    <div class="col">
                        <h3 class="font-weight-bold text-primary"><i class="fas fa-user"></i> Penulis</h3>
                    </div>
                </div>
            </div>
            <div class="form-group card-body mb-4">
                <div class="row align-items-center">
                    @if($penulis != null)
                    <p class="d-none">{{$i = 1}}</p>
                        @foreach($penulis as $p)
                            @if($p->getPenulis_ke() != null)
                                @if($p->role == 'Dosen')
                                    <div class="col col-6 ">
                                        <label for="penulis{{$p->getPenulis_ke()}}" class="font-weight-bold text-dark">Penulis ke {{$p->getPenulis_ke()}}</label>
                                        <input type="text" class="form-control" id="penulis{{$p->getPenulis_ke()}}" name="penulis{{$p->getPenulis_ke()}}" placeholder="Masukan Nama Penulis" value="{{$p->nama_penulis}}">
                                    </div>
                                    <div class="col col-4">
                                        <label for="nip{{$p->getPenulis_ke()}}" class="font-weight-bold text-dark">NIP</label>
                                        <input type="text" class="form-control" id="nip{{$p->getPenulis_ke()}}" name="nip{{$p->getPenulis_ke()}}" placeholder="Masukan nama Penulis" value="{{$p->id_dosen}}">
                                    </div>
                                    <div class="col col-2">
                                        <a href="{{route('dosen-detail', $p->id_dosen)}}" class="btn btn-primary"><i class="fas fa-user"></i> Lihat Dosen</a>
                                    </div>    
                                @else
                                    <div class="col col-6 ">
                                        <label for="penulis{{$p->getPenulis_ke()}}" class="font-weight-bold text-dark">Penulis ke {{$p->getPenulis_ke()}}</label>
                                        <input type="text" class="form-control" id="penulis{{$p->getPenulis_ke()}}" name="penulis{{$p->getPenulis_ke()}}" placeholder="Masukan Nama Penulis" value="{{$p->nama_penulis}}">
                                    </div>
                                    <div class="col col-6">
                                        <label for="nip{{$p->getPenulis_ke()}}" class="font-weight-bold text-dark">ID Penulis</label>
                                        <input type="text" class="form-control" id="nip{{$p->getPenulis_ke()}}" name="nip{{$p->getPenulis_ke()}}" placeholder="Masukan nama Penulis" value="{{$p->id_dosen}}">
                                    </div>
                                @endif
                            @else
                                @if($p->role == 'Dosen')
                                    <div class="col col-6 ">
                                        <label for="penulis{{$i}}" class="font-weight-bold text-dark">Penulis</label>
                                        <input type="text" class="form-control" id="penulis{{$i}}" name="penulis{{$i}}" placeholder="Masukan Nama Penulis" value="{{$p->nama_penulis}}">
                                    </div>
                                    <div class="col col-4">
                                        <label for="nip{{$i}}" class="font-weight-bold text-dark">NIP</label>
                                        <input type="text" class="form-control" id="nip{{$i}}" name="nip{{$i}}" placeholder="Masukan nama Penulis" value="{{$p->id_dosen}}">
                                    </div>
                                    <div class="col col-2 h-150">
                                        <a href="{{route('penelitian-list')}}" class="btn btn-primary"><i class="fas fa-user"></i> Lihat Dosen</a>
                                    </div>    
                                @else
                                    <div class="col col-6 ">
                                        <label for="penulis{{$i}}" class="font-weight-bold text-dark">Penulis</label>
                                        <input type="text" class="form-control" id="penulis{{$i}}" name="penulis{{$i}}" placeholder="Masukan Nama Penulis" value="{{$p->nama_penulis}}">
                                    </div>
                                    <div class="col col-6">
                                        <label for="nip{{$i}}" class="font-weight-bold text-dark">ID Penulis</label>
                                        <input type="text" class="form-control" id="nip{{$i}}" name="nip{{$i}}" placeholder="Masukan nama Penulis" value="{{$p->id_dosen}}">
                                    </div>
                                @endif
                            @endif
                        <p class="d-none">{{$i += 1}}</p>
                        @endforeach
                    @else
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>
@endsection