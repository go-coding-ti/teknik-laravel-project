@extends('adminlayout.layout')
@section('content')


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
                <form action="{{Route('show-review-penelitian')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="input-group mb-4">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile" name="inputfile">
                        <label class="custom-file-label" for="inputGroupFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Import</button>
                    </div>
                </div>
                </form>
              <div class="table-responsive">
                <a class= "btn btn-warning text-white" id="toggle" ><i class="fas fa-search"></i> Advanced Search</a>
                  <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Judul</th>
                        <th>Tahun Publish</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if($datapenelitian != NULL)
                            @foreach($datapenelitian as $d)
                            <tr>
                                    <td><input value="{{$d['nama']}}"></input></td>
                                    <td><input value="{{$d['judul']}}"></input></td>
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