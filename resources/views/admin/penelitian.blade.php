@extends('adminlayout.layout')
@section('content')
<div class="container-fluid">
        <div style="margin-left: 10px;" class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-list"></i> Master Data Penelitian</h1>
        </div>

        <div class="card shadow mt-5">
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
        </div>

          <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa fa-angle-double-right"></i> Menghasilkan Karya Ilmiah sesuai Bidang Ilmunya</h6>
            </a>

            @foreach($kategori as $k)
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
              <a href="#collapseCardExample{{$k->id}}" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">&nbsp&nbsp&nbsp<i class="fas fa fa-angle-double-right"></i> {{$k->kategori_penelitian}}</h6>
              </a>
              <div class="collapse show" id="collapseCardExample{{$k->id}}">
                <div class="card-body ml-4">
                  This is a collapsable card example using Bootstrap's built in collapse functionality1. <strong>Click on the card header</strong> to see the card body collapse and expand!
                </div>
              </div>
              {{-- <div class="card-body">
                This is a collapsable card example using Bootstrap's built in collapse functionality2. <strong>Click on the card header</strong> to see the card body collapse and expand!
              </div> --}}
            </div>
            @endforeach
          </div>
</div>


@endsection