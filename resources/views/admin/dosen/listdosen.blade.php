@extends('adminlayout.layout')
@section('content')
@section('add_js')
    
@endsection
<div class="modal fade" id="modal-global">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-body">
              <div class="text-center">
                  <i class="fa fa-3x fa-refresh fa-spin"></i>
                  <div>
                    <h4>Pilih Salah Satu</h4>
                    <br>
                    <a href="/admin/datauser/dosen/import/dosen" class= "btn btn-primary text-white" id="toggle" ><i class="fas fa-download"></i> Import Data Dosen</a>
                    <a href="/admin/datauser/dosen/export/dosen" class= "btn btn-info text-white" id="toggle" ><i class="fas fa-upload"></i> Export Data Dosen</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div style="margin-left: 10px;" class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-list"></i> Master Data Dosen</h1>
        </div>
          <!-- DataTales Example -->
          <!-- Copy drisini -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Data Dosen</h6>
            </div>
            <div class="card-body">
              @if (Session::has('error'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <i class="fa fa-times"></i> 
                    {{ Session::get('error') }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                @endif
                @if (isset($errors) && $errors->any())
                  <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                      {{$error}}
                    @endforeach
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
                @if (!empty($success))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check"></i> {{$success}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                @endif
              <div class="table-responsive">
              <a class= "btn btn-success text-white" href="{{route('dosen-createpage')}}"><i class="fas fa-plus"></i> Tambah Data Dosen</a>
              <a data-toggle="modal" data-target="#modal-global" class= "btn btn-primary text-white" id="toggle" ><i class="fas fa-download"></i> Import & Export Data Dosen</a>  
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead align="center">
                    <tr>
                      <th>Action</th>
                      <th>NIP</th>
                      <th>Foto</th>
                      <th>Nama(dengan gelar)</th>
                      <th>No HP</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($data as $i => $dosen)
                    <tr>
                      <td align="center">
                        <a href="/admin/datauser/dosen/detaildosen/{{$dosen->nip}}" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>
                        <a style="margin-right:7px" class="btn btn-danger btn-sm" href="/admin/datauser/dosen/{{$dosen->nip}}/delete" onclick="return confirm('Apakah Anda Yakin ?')"><i class="fas fa-trash"></i></a>
                      </td>
                      <td>{{$dosen->nip}}</td>
                      <td align="center">
                        @if($dosen->foto!=null)
                          <img src="{{asset('img/'.$dosen->foto)}}" class="mb-3" style="border:solid #000 3px;height:200px;width:150px;" id="propic">
                        @else
                          <img src="{{asset('img/user.jpg')}}" class="mb-3" style="border:solid #000 3px;height:200px;width:150px;" id="propic">
                        @endif
                      </td>
                      @if(is_null($dosen->gelar_depan) && is_null($dosen->gelar_belakang))
                        <td>{{$dosen->nama}}</td>
                      @elseif(is_null($dosen->gelar_depan))
                        <td>{{$dosen->nama}}, {{$dosen->gelar_belakang}}</td>
                      @else
                        <td>{{$dosen->gelar_depan}} {{$dosen->nama}}, {{$dosen->gelar_belakang}}</td>
                      @endif
                      <td>{{$dosen->no_hp}}</td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
      <!-- /.container-fluid -->
@endsection