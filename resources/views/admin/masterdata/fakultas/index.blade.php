@extends('adminlayout.layout')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div style="margin-left: 10px;" class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-list"></i> Master Data Fakultas</h1>
        </div>
        <!-- DataTales Example -->
        <!-- Copy drisini -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Data Fakultas</h6>
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
            <a class= "btn btn-success text-white" href="{{route('masterdata-fakultas-create')}}"><i class="fas fa-plus"></i> Tambah Data Fakultas</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Nama Fakultas</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($datafakultas as $fakultas)
                    <tr>
                        <td align="center">
                            <a href="/admin/masterdata/fakultas/detail/{{$fakultas->id_fakultas}}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            <a style="margin-right:7px" class="btn btn-danger btn-sm" href="/admin/masterdata/fakultas/delete/{{$fakultas->id_fakultas}}" onclick="return confirm('Apakah Anda Yakin ?')"><i class="fas fa-trash"></i></a>
                        </td>
                        <td>
                            {{$fakultas->fakultas}}
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