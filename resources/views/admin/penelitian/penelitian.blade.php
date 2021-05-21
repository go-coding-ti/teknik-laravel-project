@extends('adminlayout.layout')
@section('content')


<div class="container-fluid">
        <div style="margin-left: 10px;" class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-list"></i> Master Data Penelitian</h1>
        </div>

        <!-- <div class="card shadow mt-5">
          <div class="row">
            <div class="col">
              <select name="" id="">
                <optgroup label='>> Menghasilkan Karya Ilmiah sesuai Bidang Ilmunya'>
                  @foreach($kategori as $k)
                    <optgroup  label='&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp >> {{$k->kategori_penelitian}}'>
                    
                    </optgroup>
                  @endforeach
                </optgroup>
              </select>

            </div>
          </div>
        </div> -->
        <!-- DATA TABLES -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Penelitian</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <a class= "btn btn-warning text-white" id="toggle" ><i class="fas fa-search"></i> Advanced Search</a>
                <a class= "btn btn-primary text-white" href="{{Route('show-import-penelitian')}}" id="toggle" ><i class="fas fa-download"></i> Import Data Penelitian</a>
                  <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                    <thead align="center">
                      <tr>
                        <th>Action</th>
                        <th>Judul</th>
                        <th>Tahun Ajaran</th>
                        <th>Tahun Publikasi</th>
                        <th>Kategori</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($datapenelitian !=  null)
                        @foreach($datapenelitian as $d)
                        <tr>
                          <td align="center">
                            <a href="{{Route('penelitian-detail', $d->id_penelitian)}}" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>
                            <a style="margin-right:7px" class="btn btn-danger btn-sm" href="{{Route('penelitian-delete', $d->id_penelitian)}}" onclick="return confirm('Apakah Anda Yakin ?')"><i class="fas fa-trash"></i></a>
                          </td>
                          <td>{{$d->judul}}</td>
                          @if($d->tahun_ajaran != null)
                            @foreach($tahunajaran as $t)
                              @if($t->id == $d->tahun_ajaran)
                                <td>{{$t->semester}} {{$t->tahun_ajaran}}</td>
                              @else
                                @continue
                              @endif
                            @endforeach
                          @else
                            <td>Data Tidak Tersedia</td>
                          @endif
                          <td>{{$d->tahun_publikasi}}</td>
                          <td>{{$d->kategori}}</td>
                        </tr>
                        @endforeach
                      @else
                      @endif
                    </tbody>

                  </table>
              </div>
            </div>
        </div>
        <!-- DATA TABLE END -->
          
</div>

@endsection