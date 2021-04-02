@extends('adminlayout.layout')
@section('content')
@section('add_js')
<script>
   $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
</script>
@endsection
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
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-list"></i> Import Data Dosen</h1>
          </div>
            <!-- DataTales Example -->
            <!-- Copy drisini -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Import Form Data Dosen</h6>
              </div>
              <div class="card-body">
                <form action="{{route('import-dosen')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="input-group mb-4">
                        <div class="custom-file">
                            <label class="custom-file-label" for="inputGroupFile">Format File: .xlsx, .csv</label>
                            <input type="file" class="form-control-file" id="inputGroupFile" name="inputfile">
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Import</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Status Pegawai</th>
                        <th>Unit</th>
                        <th>Sub Unit</th>
                        <th>Keaktifan</th>
                        <th>Pangkat</th>
                        <th>Jabatan</th>
                        <th>Pendidikan</th>
                        <th>Email</th>
                        <th>Telepon</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse($imports as $data)
                    <tr>
                        <td><input type="text" id="row-1-nip" name="row-1-nip" value="{{$data->nip}}"></td>
                        <td><input type="text" id="row-1-nama" name="row-1-nama" value="{{$data->nama}} "></td>
                        <td><input type="text" id="row-1-tempatlahir" name="row-1-tempatlahir" value=" {{$data->tempatlahir}}"></td>
                        <td><input type="text" id="row-1-tanggallahir" name="row-1-tanggallahir" value="{{$data->tanggallahir}} "></td>
                        <td><input type="text" id="row-1-status" name="row-1-status" value=" {{$data->statuspegawai}}"></td>
                        <td><input type="text" id="row-1-unit" name="row-1-unit" value=" {{$data->unit}}"></td>
                        <td><input type="text" id="row-1-subunit" name="row-1-subunit" value=" {{$data->subunit}}"></td>
                        <td><input type="text" id="row-1-keaktifan" name="row-1-keaktifan" value="{{$data->keaktifan}} "></td>
                        <td><input type="text" id="row-1-pangkat" name="row-1-pangkat" value=" {{$data->pangkat}}"></td>
                        <td><input type="text" id="row-1-jabatan" name="row-1-jabatan" value=" {{$data->jabatan}}"></td>
                        <td><input type="text" id="row-1-pendidikan" name="row-1-pendidikan" value=" {{$data->pendidikan}}"></td>
                        <td><input type="text" id="row-1-email" name="row-1-email" value="{{$data->email}} "></td>
                        <td><input type="text" id="row-1-telepon" name="row-1-telepon" value=" {{$data->telepon}}"></td>
                    </tr>
                    @empty
                    <tr>
                        <td align="center" colspan="13">Data Kosong</td>
                    </tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th align="center" colspan="13"><button class="btn btn-success" type="submit">Upload ke Tabel Dosen</button></th>
                        </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
        </div>
        <!-- /.container-fluid -->
@endsection