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
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
    x.style.display = "block";
    } else {
    x.style.display = "none";
    }
}
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
            url:'/admin/datauser/dosen/export/dosen/submit',
            data:data,
            success: function(data){
                console.log(data);
            },error: function(data){

            }
        })
    } );
    
});
</script>
{{-- <script>
    $(document).ready(function() {
    var dt = $('#example').DataTable({
        scrollY:        200,
        scrollCollapse: true,
        paging:         true,
        searchPanes: {
            clear: false,
            viewTotal: true,
            columns: [0, 3, 11]
        },
        dom: 'Plfrtip',
        columnDefs: [
            {
                orderable: false,
                searchPanes: {
                    show: true,
                    options: [
                        {
                            label: 'Checked',
                            value: function(rowData,rowIdx) {
                                return this.row(rowIdx, {selected: true}).any();
                            }
                        },
                        {
                            label: 'Un-Checked',
                            value: function(rowData, rowIdx) {
                                return this.row(rowIdx, {selected: true}).any() === false;
                            }
                        }
                    ]
                },
                targets: [0]
            },
            {
                searchPanes: {
                    show: true,
                    options: [
                        @foreach ($prodi as $prodis)
                        {
                            label: '{{$prodis->prodi}}',
                            value: function(rowData, rowIdx) {
                                return rowData[11].match('{{$prodis->prodi}}');
                            }
                        },
                        @endforeach
                    ]
                },
                targets: [11]
            },
            {
                searchPanes: {
                    show: true,
                    options: [
                        {
                            label: 'Not Edinburgh',
                            value: function(rowData, rowIdx) {
                                return rowData[3] !== 'Edinburgh';
                            }
                        },
                        {
                            label: 'Not London',
                            value: function(rowData, rowIdx) {
                                return rowData[3] !== 'London';
                            }
                        }
                    ],
                    combiner: 'and'
                },
                targets: [3]
            }
        ],
        
        order: [[ 1, 'desc' ]]
    });
    dt.searchPanes.container().prependTo(dt.table().container());
    dt.searchPanes.resizePanes();
    dt.searchPanes.container().hide();
    $('#toggle').on('click', function () {
        dt.searchPanes.container().toggle();
    });
    $("input.planned_checked").change(function(e) {
        e.preventDefault();
        // Get the column API object
        var column = dt.column( $(this).attr('data-column') );
        // Toggle the visibility
        column.visible( ! column.visible() );
    } );
});
</script> --}}
@endsection
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div style="margin-left: 10px;" class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-list"></i> Eksport Data Dosen</h1>
        </div>
            <!-- DataTales Example -->
            <!-- Copy drisini -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Eksport Form Data Dosen</h6>
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
                <form enctype="multipart/form-data" action="/admin/datauser/dosen/export/dosen/submit" method="POST">
                @csrf
                @if($dosen == NULL)
                    <button style="margin-bottom: 10px" id="sub" class="btn btn-success" type="submit" disabled><i class="fas fa-download"></i> Export Data Dosen (.xlsx)</button></th>
                @else
                    <button style="margin-bottom: 10px" id="sub" class="btn btn-success" type="submit"><i class="fas fa-download"></i> Export Data Dosen (.xlsx)</button></th>
                @endif
                <a style="margin-bottom: 10px;" class="btn btn-info dropdown-toggle text-white" onclick="myFunction()"><i class="fas fa-print"></i> Opsi Cetak</a>
                <a style="margin-bottom: 10px;" class= "btn btn-warning dropdown-toggle text-white" id="toggle" ><i class="fas fa-search"></i> Advanced Search</a>
                <div id="myDIV" style="display: none">
                    <div style="overflow: scroll;">
                        <table class="table table-bordered" id="dataTables" cellspacing="0">
                            <thead>
                                <tr>
                                    <th colspan="{{count($header)}}">Centang Opsi Dibawah untuk Menghilangkan Kolom yang Tidak Ingin Dicetak</th>
                                </tr>
                            </thead> 
                            <tbody>
                                <tr>
                                    @foreach ($header as $head)
                                    <td style="width: 30%">
                                        <label><input type="checkbox" name="planned_checked" class="planned_checked" data-column="{{$loop->iteration}}"><br>{{$head->heading}}</label> 
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <table class="table table-bordered" id="dataTable" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Action</th>
                        <th>Nama</th>
                        <th>Tahun Ajaran</th>
                        {{-- <th>NIDN</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Status Pegawai</th>
                        <th>Kepangkatan</th>
                        <th>Unit</th>
                        <th>Sub Unit</th>
                        <th>Keaktifan</th>
                        <th>Jabatan Fungsional</th>
                        <th>Pendidikan</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>TMT Keaktifan</th>
                        <th>Status Serdos</th>
                        <th>Tahun Serdos</th>
                        <th>Tahun Ajaran</th> --}}
                    </tr>
                    </thead>
                    <tbody>
                        @if($dosen != NULL)
                        @foreach($dosen as $data)
                        <tr>
                        <td align="center">
                            <a class="btn btn-danger btn-sm" id='del' onclick="var table = $('#dataTable').DataTable();table.row($(this).parents('tr')).remove().draw();">
                                <i style="color:#fff" class="fas fa-trash"></i>
                            </a>
                            </td>
                            <td>
                                {{$data->nama}}
                                <input type="hidden" id="row-1-tahun" name="row_nama[]" value="{{$data->nama}}">
                            </td>
                            <td>
                                @foreach ($data->tahunajaran as $index=>$tahunajarandosen)
                                    @if ($loop->last)
                                        {{ $tahunajarandosen->ta->semester}} - {{ $tahunajarandosen->ta->tahun_ajaran}}
                                    @endif
                                @endforeach
                                
                                <input type="hidden" id="row-1-nip" name="row_ta[]" 
                                @foreach ($data->tahunajaran as $index=>$tahunajarandosen)
                                    @if ($loop->last)
                                    @php $test = $tahunajarandosen->ta->semester. "-" .$tahunajarandosen->ta->tahun_ajaran @endphp
                                        value="{{$test}}"
                                    @endif
                                @endforeach>
                            </td>
                            {{-- <td>
                                <input type="hidden" id="row-1-nidn" name="row_nidn[]" value="{{$data}}">
                            </td>
                            <td>
                                <input type="hidden" id="row-1-nama" name="row_nama[]" value="{{$data}} ">
                            </td>
                            <td>
                                <input type="hidden" id="row-1-alamat" name="row_alamat[]" value="{{$data}} ">
                            </td>
                            <td>
                                <input type="hidden" id="row-1-jeniskelamin" name="row_jeniskelamin[]" value="{{$data}} ">
                            </td>
                            <td>
                                <input type="hidden" id="row-1-tanggallahir" name="row_tanggallahir[]" value="{{$data}} "></td>
                            <td>
                                <input type="hidden" id="row-1-status" name="row_status[]" value=" {{$data}}">
                            </td>
                            <td>
                                <input type="hidden" id="row-1-kepangkatan" name="row_kepangkatan[]" value="{{$data}} ">
                            </td>
                            <td>
                                <input type="hidden" id="row-1-unit" name="row_unit[]" value=" {{$data}}">
                            </td>
                            <td>
                                {{$data->prodi->prodi}}
                                <input type="hidden" id="row-1-subunit" name="row_subunit[]" value=" {{$data}}">
                            </td>
                            <td>
                                <input type="hidden" id="row-1-keaktifan" name="row_keaktifan[]" value="{{$data}} ">
                            </td>
                            <td>
                                <input type="hidden" id="row-1-jabatan" name="row_jabatan[]" value=" {{$data}}">
                            </td>
                            <td>
                                <input type="hidden" id="row-1-pendidikan" name="row_pendidikan[]" value=" {{$data}}">
                            </td>
                            <td>
                                <input type="hidden" id="row-1-email" name="row_email[]" value="{{$data}} ">
                            </td>
                            <td>
                                <input type="hidden" id="row-1-telepon" name="row_telepon[]" value=" {{$data}}">
                            </td>
                            <td>
                                <input type="hidden" id="row-1-tmtkeaktifan" name="row_tmt_keaktifan[]" value="{{$data}} ">
                            </td>
                            <td>
                                <input type="hidden" id="row-1-statusserdos" name="row_status_serdos[]" value="{{$data}} ">
                            </td>
                            <td>
                                <input type="hidden" id="row-1-tahunserdos" name="row_tahun_serdos[]" value="{{$data}} ">
                            </td>
                            <td>
                                <input type="hidden" id="row-1-tahunajaran" name="row_tahun_ajaran[]" value="{{$data}} ">
                            </td> --}}
                        </tr>
                        @endforeach
                    @else

                    @endif
                    </tbody>
                </table>
                </form>
                </div>
            </div>
            </div>
        </div>
        <!-- /.container-fluid -->
@endsection