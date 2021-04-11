@extends('adminlayout.layout')
@section('content')
@section('add_js')
<script>
<<<<<<< HEAD
   $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });
    
</script>
@endsection

<?php
  function myfunction($row, $value){
        if($row == 1){
          $d['nama'] = $value;
          echo($d['nama']);
        }elseif($row == 2){
          $d['judul'] = $value;
          echo($d['judul']);
        }
    }
?>
=======
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
>>>>>>> d41227880772b8136ede52364bc1fc3aa96b5661

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
<<<<<<< HEAD
                    <div class="custom-file">
                    <label class="custom-file-label" for="inputGroupFile">Choose file</label>
                        <input type="file" class="form-control-file" id="inputGroupFile" name="inputfile">
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Import</button>
                    </div>
=======
                  <div class="custom-file">
                    <label class="custom-file-label" for="inputGroupFile">Format File: .xls, .xlsx, .csv</label>
                    <input type="file" class="form-control-file" id="inputGroupFile" name="inputfile">
                  </div>
                  <div class="input-group-append">
                      <button class="btn btn-success" type="submit">Import</button>
                  </div>
>>>>>>> d41227880772b8136ede52364bc1fc3aa96b5661
                </div>
                </form>
              <div class="table-responsive">
                <a class= "btn btn-warning text-white" id="toggle" ><i class="fas fa-search"></i> Advanced Search</a>
                <form enctype="multipart/form-data" action="/admin/import/penelitian-save" method="POST">
                  @csrf
                  <table class="table table-bordered" id="dataTable" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Judul</th>
                      </tr>
                    </thead>
                    <tbody>
<<<<<<< HEAD
                        @if($datapenelitian != NULL)
                            @foreach($datapenelitian as $d)
                            <tr>
                                <td onclick="">{{$d['nama']}}</td>
                                    <!-- <td><input onkeyup="echo()" value="{{$d['nama']}}"></input></td> -->
                                    <!-- <td><input onkeyup="myfunction( 2, $d['judul'])" value="{{$d['judul']}}"></input></td> -->
                            </tr>
                            @endforeach
                        @else
=======
                      @if($datapenelitian != NULL)
                          @foreach($datapenelitian as $d)
                          <tr>
                            <td><input value="{{$d['nama']}}" name="row_nama[]"></td>
                            <td><input value="{{$d['judul']}}" name="row_judul[]"></td>
                          </tr>
                          @endforeach
                      @else
>>>>>>> d41227880772b8136ede52364bc1fc3aa96b5661

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