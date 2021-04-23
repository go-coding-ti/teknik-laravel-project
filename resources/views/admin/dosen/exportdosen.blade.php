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
            url:'/admin/submit/import/dosen',
            data:data,
            success: function(data){
                console.log(data);
            },error: function(data){

            }
          })
      } );
  });
</script>
<script>
    $(document).ready(function() {
    var dt = $('#example').DataTable({
        searchPanes: {
            viewTotal: true,
            columns: [0, 3, 4]
        },
        dom: 'Plfrtip',
        columnDefs: [
            {
                orderable: false,
                className: 'select-checkbox',
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
                        {
                            label: 'Under 20',
                            value: function(rowData, rowIdx) {
                                return rowData[4] < 20;
                            }
                        },
                        {
                            label: '20 to 30',
                            value: function(rowData, rowIdx) {
                                return rowData[4] <= 30 && rowData[4] >=20;
                            }
                        },
                         {
                            label: '30 to 40',
                            value: function(rowData, rowIdx) {
                                return rowData[4] <= 40 && rowData[4] >=30;
                            }
                        },
                         {
                            label: '40 to 50',
                            value: function(rowData, rowIdx) {
                                return rowData[4] <= 50 && rowData[4] >=40;
                            }
                        },
                         {
                            label: '50 to 60',
                            value: function(rowData, rowIdx) {
                                return rowData[4] <= 60 && rowData[4] >=50;
                            }
                        },
                         {
                            label: 'Over 60',
                            value: function(rowData, rowIdx) {
                                return rowData[4] > 60;
                            }
                        }
                    ]
                },
                targets: [4]
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
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]]
    });
 
    dt.on('select.dt', () => {          
        dt.searchPanes.rebuildPane(0, true);
    });
 
    dt.on('deselect.dt', () => {
        dt.searchPanes.rebuildPane(0, true);
    });
});
</script>
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
                <form enctype="multipart/form-data" action="/admin/submit/import/dosen" method="POST">
                  @csrf
                  <table class="table table-bordered" id="example" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Action</th>
                        <th>Tahun</th>
                        <th>NIP</th>
                        <th>NIDN</th>
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
                        <th>Tahun Ajaran</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if($dosen != NULL)
                        @foreach($dosen as $data)
                        <tr>
                          <td align="center">
                            <a class="btn btn-danger btn-sm" id='del' 
                            onclick="var table = $('#dataTable').DataTable();table.row($(this).parents('tr')).remove().draw();">
                              <i style="color:#fff" class="fas fa-trash"></i>
                            </a>
                            </td>
                            <td><input type="text" id="row-1-tahun" name="row_tahun[]" value="{{$data['tahun']}}"></td>
                            <td><input type="text" id="row-1-nip" name="row_nip[]" value="{{$data['nip']}}"></td>
                            <td><input type="text" id="row-1-nidn" name="row_nidn[]" value="{{$data['nidn']}}"></td>
                            <td><input type="text" id="row-1-nama" name="row_nama[]" value="{{$data['nama']}} "></td>
                            <td><input type="text" id="row-1-alamat" name="row_alamat[]" value="{{$data['alamat_tinggal']}} "></td>
                            <td><input type="text" id="row-1-jeniskelamin" name="row_jeniskelamin[]" value="{{$data['jenis_kelamin']}} "></td>
                            <td><input type="text" id="row-1-tanggallahir" name="row_tanggallahir[]" value="{{PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($data['tanggal_lahir'])->format('Y-m-d')}} "></td>
                            <td><input type="text" id="row-1-status" name="row_status[]" value=" {{$data['status_pegawai']}}"></td>
                            <td><input type="text" id="row-1-kepangkatan" name="row_kepangkatan[]" value="{{$data['kepangkatan']}} "></td>
                            <td><input type="text" id="row-1-unit" name="row_unit[]" value=" {{$data['unit']}}"></td>
                            <td><input type="text" id="row-1-subunit" name="row_subunit[]" value=" {{$data['sunit']}}"></td>
                            <td><input type="text" id="row-1-keaktifan" name="row_keaktifan[]" value="{{$data['keaktifan']}} "></td>
                            <td><input type="text" id="row-1-jabatan" name="row_jabatan[]" value=" {{$data['jabatan_fungsional']}}"></td>
                            <td><input type="text" id="row-1-pendidikan" name="row_pendidikan[]" value=" {{$data['pendidikan_terakhir']}}"></td>
                            <td><input type="text" id="row-1-email" name="row_email[]" value="{{$data['email']}} "></td>
                            <td><input type="text" id="row-1-telepon" name="row_telepon[]" value=" {{$data['telepon']}}"></td>
                            <td><input type="text" id="row-1-tmtkeaktifan" name="row_tmt_keaktifan[]" value="{{PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($data['tmt_sk_keaktifan'])->format('Y-m-d')}} "></td>
                            <td><input type="text" id="row-1-statusserdos" name="row_status_serdos[]" value="{{$data['status_serdos']}} "></td>
                            <td><input type="text" id="row-1-tahunserdos" name="row_tahun_serdos[]" value="{{$data['tahun_serdos']}} "></td>
                            <td><input type="text" id="row-1-tahunajaran" name="row_tahun_ajaran[]" value="{{$data['tahun_ajaran']}} "></td>
                        </tr>
                        @endforeach
                      @else
  
                      @endif
                    </tbody>
                    @if($dosen == NULL)
                    <tfoot>
                        <tr>
                            <th align="center" colspan="21"><button id="sub" class="btn btn-success" type="submit" disabled><i class="fas fa-download"></i> Download Data Dosen</button></th>
                        </tr>
                    </tfoot>
                    @else
                    <tfoot>
                      <tr>
                          <th align="center" colspan="21"><button id="sub" class="btn btn-success" type="submit"><i class="fas fa-download"></i> Download Data Dosen</button></th>
                      </tr>
                  </tfoot>
                    @endif
                  </table>
                </form>
                </div>
              </div>
            </div>
        </div>
        <!-- /.container-fluid -->
@endsection