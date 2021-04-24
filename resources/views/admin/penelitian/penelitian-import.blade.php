@extends('adminlayout.layout')
@section('content')
@section('add_js')
<script>
  $('input[type="file"]').change(function(e){
      var fileName = e.target.files[0].name;
      $('.custom-file-label').html(fileName);
  });
</script>
<script>
    $(document).ready(function() {
      
      $('#sub').click( function() {
          var data = $('input').serialize();
          $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
          })e.preventDefault(e);

          $.ajax({
            type:"POST",
            url:'/admin/import/penelitian-save',
            data:data,
            success: function(data){
                console.log(data);
            },error: function(data){

            }
          })
      } );
  });
</script>
@endsection
<div class="container-fluid">
        <div style="margin-left: 10px;" class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-list"></i> Import Data Penelitian</h1>
        </div>

    
        <!-- DATA TABLES -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Import Penelitian</h6>
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
                <form action="{{Route('show-review-penelitian')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="input-group mb-4">
                  <div class="custom-file">
                    <label class="custom-file-label" for="inputGroupFile">Format File: .xls, .xlsx, .csv</label>
                    <input type="file" class="form-control-file" id="inputGroupFile" name="inputfile">
                  </div>
                  <div class="input-group-append">
                      <button class="btn btn-success" type="submit">Import</button>
                  </div>
                </div>
                </form>
              <div class="table-responsive">
                <a class= "btn btn-warning text-white" id="toggle" ><i class="fas fa-search"></i> Advanced Search</a>
                <form enctype="multipart/form-data" action="/admin/import/penelitian-save" method="POST">
                  @csrf
                  <table class="table table-bordered" id="dataTable" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Action</th>
                        <th>Karya</th>
                        <th>Penulis</th>
                        <th>NIP</th>
                        <th>Tahun Publikasi</th>
                        <th>Tahun Ajaran</th>
                        <th>Unit</th>
                        <th>Sunit</th>
                        <th>Kegiatan</th>
                        <th>File 1</th>
                        <th>File 2</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if($datapenelitian != NULL)
                          @foreach($datapenelitian as $d)
                            @if($d['karya'] == null)
                              @continue
                            @else
                            <tr>
                              <td align="center"><a class="btn btn-danger btn-sm" id='del' onclick="var table = $('#dataTable').DataTable();
                                table.row($(this).parents('tr')).remove().draw();
                                return confirm('Apakah Anda Yakin ?')"><i class="fas fa-trash"></i></a></td>
                              <td><input value="{{$d['karya']}}" name="row_judul[]"></td>
                              <td><input value="{{$d['nama']}}" name="row_nama[]"></td>
                              <td><input value="{{$d['nip']}}" name="row_nip[]"></td>
                              <td><input value="{{$d['tahun_publikasi']}}" name="row_tahunpub[]"></td>
                              <td><input value="{{$d['tahun_ajaran']}}" name="row_tahunajar[]"></td>
                              <td><input value="{{$d['unit']}}" name="row_unit[]"></td>
                              <td><input value="{{$d['sunit']}}" name="row_sunit[]"></td>
                              <td><input value="{{$d['kegiatan']}}" name="row_kategori[]"></td>
                              <td><input value="{{$d['file_1']}}" name="row_file1[]"></td>
                              <td><input value="{{$d['file_2']}}" name="row_file2[]"></td>
                            </tr>
                            @endif
                          @endforeach
                          
                      @else

                      @endif
                    </tbody>
                    @if($datapenelitian == NULL)
                    <tfoot>
                        <tr>
                            <th align="center" colspan="2"><button id="sub" class="btn btn-success" type="submit" disabled><i class="fas fa-upload"></i> Upload Semua ke Tabel Penelitian</button></th>
                        </tr>
                    </tfoot>
                    @else
                    <tfoot>
                      <tr>
                          <th align="center" colspan="2"><button id="sub" class="btn btn-success" type="submit"><i class="fas fa-upload"></i> Upload Semua ke Tabel Penelitian</button></th>
                      </tr>
                    </tfoot>
                    @endif
                  </table>
                </form>
              </div>
            </div>
        </div>
        <!-- DATA TABLE END -->
          
</div>


@endsection