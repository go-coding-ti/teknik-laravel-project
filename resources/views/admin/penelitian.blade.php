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
                <a class= "btn btn-success text-white" id="toggle" ><i class="fas fa-plus"></i> Advanced Search</a>
                  <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th >Karya Ilmiah</th>
                        <th >Validator</th>
                        <th >Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                  </table>
              </div>
            </div>
        </div>
        <!-- DATA TABLE END -->
          
</div>

@endsection