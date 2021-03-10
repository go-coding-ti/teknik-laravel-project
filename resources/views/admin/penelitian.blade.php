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
</div>


@endsection