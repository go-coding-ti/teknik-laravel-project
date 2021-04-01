@extends('adminlayout.layout')
@section('content')
<div class="modal fade" id="modal-global">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-body">
              <div class="text-center">
                  <i class="fa fa-3x fa-refresh fa-spin"></i>
                  <div>
                    <h4>Pilih Salah Satu</h4>
                    <div class="row">
                      <input type="file" class="form-control-file" id="excel" name="excel">
                    </div>
                    <a class= "btn btn-primary text-white" id="toggle" ><i class="fas fa-download"></i> Import Data Dosen</a>
                    <a class= "btn btn-info text-white" id="toggle" ><i class="fas fa-upload"></i> Export Data Dosen</a>
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
              <div class="table-responsive">
              <a class= "btn btn-success text-white" href="{{route('dosen-createpage')}}"><i class="fas fa-plus"></i> Tambah Data Dosen</a>
              <a data-toggle="modal" data-target="#modal-global" class= "btn btn-primary text-white" id="toggle" ><i class="fas fa-download"></i> Import & Export Data Dosen</a>  
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>No HP</th>
                      <th>Status Keaktifan</th>
                      <th>Tmt Keaktifan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($data as $i => $dosen)
                    <tr>
                      <td>{{$dosen->nip}}</td>
                      <td>{{$dosen->nama}}</td>
                      <td>{{$dosen->jenis_kelamin}}</td>
                      <td>{{$dosen->no_hp}}</td>
                      <td>{{$dosen->status_keaktifan}}</td>
                      <td>{{$dosen->tmt_keaktifan}}</td>
                      <td>
                        <a href="/admin/detail/dosen/{{$dosen->nip}}" class="btn btn-warning btn-sm"><i class="fas fa-eye"></i></a>
                        <a style="margin-right:7px" class="btn btn-danger btn-sm" href="/admin/{{$dosen->nip}}/delete" onclick="return confirm('Apakah Anda Yakin ?')"><i class="fas fa-trash"></i></a>
                      </td>
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