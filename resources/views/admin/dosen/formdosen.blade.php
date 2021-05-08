@extends('adminlayout.layout')
@section('content')
@section('add_js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#propic').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#profile_image").change(function() {
  readURL(this);
});
</script>
@endsection
<div class="container-fluid">
    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa fa-times"></i> 
        {{ Session::get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
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
    <div style="margin-left: 10px;" class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-list"></i> Tambah Data Dosen</h1>
    </div>
    <form method="POST" enctype="multipart/form-data" action="{{route('dosen-store')}}">
    @csrf
    <div class="card shadow">
            <div class="form-group card-header shadow">
                <div class="row">
                    <div class="col">
                        <h3 class="font-weight-bold text-primary"><i class="fas fa-user"></i> Data Dosen</h3>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda Yakin Ingin Menyimpan Data?')"><i class="fas fa-save"></i> Simpan</button>
                            <a href="{{route('admin-home')}}" class="btn btn-danger"><i class="fas fa-times"></i> Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group card-body">
                <div class="row align-items-center">
                    <div class="col col-3 ">
                        <div style="margin-top: -30px" class="row">
                            <div align="center" class='col'>
                                <img src="{{asset('img/user.jpg')}}" class="mb-3" style="border:solid #000 3px;height:200px;width:150px;" id="propic">
                            </div>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="profile_image" name="profile_image" onchange="this.nextElementSibling.innerText = this.files[0].name">
                            <label for="profile_image" class="custom-file-label foto">.jpg/.png</label>
                            <small style="color: red">
                                @error('profile_image')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>
                    </div>

                    <div class="col col-sm-1"></div>

                    <div  class="col col-4">
                        <div class="row">
                            <div class='col'>
                                <label for="JenisSerdos" class="font-weight-bold text-dark">Jenis Serdos</label>
                                <select class="form-control" id="JenisSerdos" name="jenisserdos">
                                    <option value="" selected>Pilih Jenis Serdos</option>
                                    <option value="NIDN" {{old('jenisserdos')=='NIDN' ? 'selected' : ''}}>NIDN</option>
                                    <option value="NIDK" {{old('jenisserdos')=='NIDK' ? 'selected' : ''}}>NIDK</option>
                                    <option value="NUP" {{old('jenisserdos')=='NUP' ? 'selected' : ''}}>NUP</option>
                                </select>
                                <small style="color: red">
                                    @error('jenisserdos')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                            <div class='col'>
                                <label for="nidn" class="font-weight-bold text-dark">NIDN/NIDK/NUP</label>
                                <input type="text" class="form-control" id="nidn" name="nidn" placeholder="Masukan NIDN/NIDK/NUP" value="{{$errors->any() ? old('nidn') : ''}}">
                                <small style="color: red">
                                    @error('nidn')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class='col'>
                                <label for="InputEmail" class="font-weight-bold text-dark">Email Aktif</label>
                                <input type="email" class="form-control" id="InputEmail" name="email" placeholder="Masukan Email" value="{{$errors->any() ? old('email') : ''}}">
                                <small style="color: red">
                                    @error('email')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="col col-4">
                        <div class="row">
                            <div class='col'>
                        <label for="nip" class="font-weight-bold text-dark">NIP</label>
                        <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukan NIP" value="{{$errors->any() ? old('nip') : ''}}">
                        <small style="color: red">
                            @error('nip')
                                {{$message}}
                            @enderror
                        </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class='col'>
                                <label for="InputTelpRumah" class="font-weight-bold text-dark">Telp Rumah</label>
                                <input type="text" class="form-control" id="InputTelpRumahRumah" name="telprumah" placeholder="No. Telp Rumah" value="{{$errors->any() ? old('telprumah') : ''}}">
                                <small style="color: red">
                                    @error('telprumah')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                            <div class='col'>
                                <label for="InputNoHp" class="font-weight-bold text-dark">No HP</label>
                                <input type="text" class="form-control" id="InputNoHp" name="nohp" placeholder="No. HP" value="{{$errors->any() ? old('nohp') : ''}}">
                                <small style="color: red">
                                    @error('nohp')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="gelardepan" class="font-weight-bold text-dark">Gelar Depan</label>
                        <input type="text" class="form-control" id="gelardepan" name="gelardepan" placeholder="Masukan Gelar Depan" value="{{$errors->any() ? old('gelardepan') : ''}}">
                        <small>
                            Contoh jika gelar depan lebih dari satu (Prof. Dr.)
                        </small>
                        <small style="color: red">
                            @error('gelardepan')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                    <div class="col">
                        <label for="InputName" class="font-weight-bold text-dark">Nama Lengkap</label>
                        <input type="text" class="form-control" id="InputName" name="nama" placeholder="Masukan Nama Lengkap" value="{{$errors->any() ? old('nama') : ''}}">
                        <small style="color: red">
                            @error('nama')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                    <div class="col">
                        <label for="gelarbelakang" class="font-weight-bold text-dark">Gelar Belakang</label>
                        <input type="text" class="form-control" id="gelarbelakang" name="gelarbelakang" placeholder="Masukan Gelar Belakang" value="{{$errors->any() ? old('gelarbelakang') : ''}}">
                        <small>
                            Contoh jika gelar belakang lebih dari satu (S.Kom., M.T)
                        </small>
                        <small style="color: red">
                            @error('gelarbelakang')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="InputTempatLahir" class="font-weight-bold text-dark">Tempat Lahir</label>
                        <input type="text" class="form-control" id="InputTempatLahir" name="tempatlahir" placeholder="Masukan Tempat Lahir" value="{{$errors->any() ? old('tempatlahir') : ''}}">
                        <small style="color: red">
                            @error('tempatlahir')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                    <div class="col">
                        <label for="InputTanggalLahir" class="font-weight-bold text-dark">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="InputTanggalLahir" name="tanggallahir" value="{{$errors->any() ? old('tanggallahir') : ''}}">
                        <small style="color: red">
                            @error('tanggallahir')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                    <div class="col">
                        <label for="JenisKelamin" class="font-weight-bold text-dark">Jenis Kelamin</label>
                        <select class="form-control" id="JenisKelamin" name="jeniskelamin">
                            <option value="" selected>Pilih JK</option>
                            <option value="Pria" {{old('jeniskelamin')=='Pria' ? 'selected' : ''}}>Pria</option>
                            <option value="Wanita" {{old('jeniskelamin')=='Wanita' ? 'selected' : ''}}>Wanita</option>
                        </select>
                        <small style="color: red">
                            @error('jeniskelamin')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="TahunAjaran" class="font-weight-bold text-dark">Tahun Ajaran</label>
                        <select class="form-control" name="tahunAjaran" id="tahunAjaran">
                            <option value="" selected>Pilih Tahun Ajaran</option>
                            @foreach ($tahun as $ta)
                                <option value="{{$ta->id}}" {{old('tahunAjaran')==$ta->id ? 'selected' : ''}}>{{$ta->semester}} - {{$ta->tahun_ajaran}}</option>
                            @endforeach
                        </select>
                        <small style="color: red">
                            @error('tahunAjaran')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                    <div class="col">
                        <label for="StatusDosen" class="font-weight-bold text-dark">Status Dosen</label>
                        <select class="form-control" name="statusdosen" id="StatusDosen">
                            <option value="" selected>Pilih Status</option>
                            @foreach ($statusDosen as $status)
                                <option value="{{$status->id_status_dosen}}" {{old('statusdosen')==$status->id_status_dosen ? 'selected' : ''}}>{{$status->status_dosen}}</option>
                            @endforeach
                        </select>
                        <small style="color: red">
                            @error('statusdosen')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                    <div class="col">
                        <label for="tmtStatusDosen" class="font-weight-bold text-dark">TMT Status Dosen</label>
                        <input type="date" class="form-control" id="tmtStatusDosen" name="tmtStatusDosen" value="{{$errors->any() ? old('tmtStatusDosen') : ''}}">
                        <small style="color: red">
                            @error('tmtStatusDosen')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="StatusKepegawaian" class="font-weight-bold text-dark">Status Kepegawaian</label>
                        <select class="form-control" name="statusKepegawaian" id="StatusKepegawaian">
                            <option value="" selected>Pilih Status</option>
                            @foreach ($statusKepegawaian as $status)
                                <option value="{{$status->id_status_kepegawaian}}" {{old('statusKepegawaian')==$status->id_status_kepegawaian ? 'selected' : ''}}>{{$status->status_kepegawaian}}</option>
                            @endforeach
                        </select>
                        <small style="color: red">
                            @error('statusKepegawaian')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                    <div class="col">
                        <label for="tmtStatusKepegawaian" class="font-weight-bold text-dark">TMT Status Kepegawaian</label>
                        <input type="date" class="form-control" id="tmtStatusKepegawaian" name="tmtStatusKepegawaian" value="{{$errors->any() ? old('tmtStatusKepegawaian') : ''}}">
                        <small style="color: red">
                            @error('tmtStatusKepegawaian')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="InputAlamatDomisili" class="font-weight-bold text-dark">Alamat Domisili (Alamat Tinggal Sekarang)</label>
                        <input type="text" class="form-control" id="InputAlamatDomisili" name="alamatdomisili"  placeholder="Masukan Alamat Domisili" value="{{$errors->any() ? old('alamatdomisili') : ''}}">
                        <small style="color: red">
                            @error('alamatdomisili')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="InputAlamatRumah" class="font-weight-bold text-dark">Alamat Rumah (Sesuai KK/KTP)</label>
                        <input type="text" class="form-control" id="InputAlamatRumah" name="alamatrumah" placeholder="Masukan Alamat Rumah" value="{{$errors->any() ? old('alamatrumah') : ''}}">
                        <small style="color: red">
                            @error('alamatrumah')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                </div>
            </div>
    </div>
    <br>
    <div class="card shadow">
            <div class="form-group card-header shadow">
                <div class="row">
                    <div class="col col-md-12">
                        <h3 class="font-weight-bold text-primary"><i class="fas fa-user-graduate"></i> Data Pendidikan Terakhir</h3>
                    </div>
                </div>
            </div>
            <div class="form-group card-body">
                <div class="row">
                    <div class="col">
                        <label for="JenjangPendidikan" class="font-weight-bold text-dark">Jenjang Pendidikan Terakhir</label>
                        <select class="form-control" id="JenjangPendidikan" name="jenjangPendidikan">
                            <option value="" selected>Pilih Jenjang Pendidikan</option>
                            <option value="S1" {{old('jenjangPendidikan')=='S1' ? 'selected' : ''}}>S1</option>
                            <option value="S2" {{old('jenjangPendidikan')=='S2' ? 'selected' : ''}}>S2</option>
                            <option value="S3" {{old('jenjangPendidikan')=='S3' ? 'selected' : ''}}>S3</option>
                        </select>
                        <small style="color: red">
                            @error('jenjangPendidikan')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                    <div class="col">
                        <label for="Institusi" class="font-weight-bold text-dark">Nama Institusi</label>
                        <input type="text" class="form-control" id="Institusi" name="institusi" placeholder="Masukan Nama Institusi" value="{{$errors->any() ? old('institusi') : ''}}">
                        <small style="color: red">
                            @error('institusi')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="BidangIlmu" class="font-weight-bold text-dark">Bidang Ilmu</label>
                        <input type="text" class="form-control" id="BidangIlmu" name="bidangIlmu" placeholder="Masukan Bidang Ilmu" value="{{$errors->any() ? old('bidangIlmu') : ''}}">
                        <small style="color: red">
                            @error('bidangIlmu')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                    <div class="col">
                        <label for="SelesaiStudi" class="font-weight-bold text-dark">Tanggal Selesai Studi</label>
                        <input type="date" class="form-control" id="SelesaiStudi" name="tanggalSelesaiStudi" value="{{$errors->any() ? old('tanggalSelesaiStudi') : ''}}">
                        <small style="color: red">
                            @error('tanggalSelesaiStudi')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                </div>
            </div>
    </div>
    <br>
    <div class="card shadow">
            <div class="form-group card-header shadow">
                <div class="row">
                    <div class="col col-md-12">
                        <h3 class="font-weight-bold text-primary"><i class="fas fa-level-up-alt"></i> Data Kepangkatan Fungsional</h3>
                    </div>
                </div>
            </div>
            <div class="form-group card-body">
                <div class="row">
                    <div class="col">
                        <label for="PangkatGolongan" class="font-weight-bold text-dark">Pangkat/Golongan Terakhir</label>
                        <select class="form-control" id="PangkatGolongan" name="pangkatGolongan">
                            <option value="" selected>Pilih Pangkat/Golongan</option>
                            @foreach($pangkatDosen as $p)
                                <option value="{{$p->id_pangkat_pns}}" {{old('pangkatGolongan')==$p->id_pangkat_pns ? 'selected' : ''}}>{{$p->pangkat}}</option>
                            @endforeach
                        </select>
                        <small style="color: red">
                            @error('pangkatGolongan')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                    <div class="col">
                        <label for="JabatanAkademik" class="font-weight-bold text-dark">Jabatan Akademik Terakhir</label>
                        <select class="form-control" id="JabatanAkademik" name="jabatanakademik">
                            <option value="" selected>Pilih Jabatan Akademik</option>
                            @foreach($jabatanDosen as $j)
                                <option value="{{$j->id_jabatan_fungsional}}" {{old('jabatanakademik')==$j->id_jabatan_fungsional ? 'selected' : ''}}>{{$j->jabatan_fungsional}}</option>
                            @endforeach
                        </select>
                        <small style="color: red">
                            @error('jabatanakademik')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="TmtPangkatGolongan" class="font-weight-bold text-dark">TMT Pangkat/Golongan Terakhir</label>
                        <input type="date" class="form-control" id="TmtPangkatGolongan" name="tmtpangkatgolongan" value="{{$errors->any() ? old('tmtpangkatgolongan') : ''}}">
                        <small style="color: red">
                            @error('tmtpangkatgolongan')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                    <div class="col">
                        <label for="TmtJabatan" class="font-weight-bold text-dark">TMT Jabatan Terakhir</label>
                        <input type="date" class="form-control" id="TmtJabatan" name="tmtjabatan" value="{{$errors->any() ? old('tmtjabatan') : ''}}">
                        <small style="color: red">
                            @error('tmtjabatan')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                </div>
                <div class="row">
                    <div class="col col-md-6">
                        <label for="Unit" class="font-weight-bold text-dark">Unit</label>
                        <select class="form-control" id="Unit" name="unit">
                            <option value="" selected>Pilih Unit</option>
                            @foreach($unit as $u)
                                <option value="{{$u->id_fakultas}}" {{old('unit')==$u->id_fakultas ? 'selected' : ''}}>{{$u->fakultas}}</option>
                            @endforeach
                        </select>
                        <small style="color: red">
                            @error('unit')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                    <div class="col col-md-6">
                        <label for="Subunit" class="font-weight-bold text-dark">Sub-Unit</label>
                        <select class="form-control" id="Subunit" name="subunit">
                            <option value="" selected>Pilih Sub-Unit</option>
                            @foreach($subunit as $u)
                                <option value="{{$u->id_prodi}}" {{old('subunit')==$u->id_prodi ? 'selected' : ''}}>{{$u->prodi}}</option>
                            @endforeach
                        </select>
                        <small style="color: red">
                            @error('subunit')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                </div>
            </div>
    </div>
    <br>
    <div class="card shadow">
            <div class="form-group card-header shadow">
                <div class="row">
                    <div class="col col-md-12">
                        <h3 class="font-weight-bold text-primary"><i class="fas fa-folder-open"></i> Berkas</h3>
                    </div>
                </div>
            </div>
            <div class="form-group card-body">
                <div class="row">
                    <div class="col">
                        <label for="NoKarpeg" class="font-weight-bold text-dark">No. Karpeg</label>
                        <input type="text" class="form-control" id="NoKarpeg" name="nokarpeg" placeholder="Masukan No. Karpeg" value="{{$errors->any() ? old('nokarpeg') : ''}}">
                        <small style="color: red">
                            @error('nokarpeg')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                    <div class="col">
                        <label for="FileKarpeg" class="font-weight-bold text-dark">File Karpeg</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="FileKarpeg" name="filekarpeg" onchange="this.nextElementSibling.innerText = this.files[0].name">
                            <label for="FileKarpeg" class="custom-file-label karpeg">.pdf</label>
                            <small style="color: red">
                                @error('filekarpeg')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col">
                        <label for="NoNpwp" class="font-weight-bold text-dark">No. NPWP</label>
                        <input type="text" class="form-control" id="NoNpwp" name="nonpwp" placeholder="Masukan No. NPWP" value="{{$errors->any() ? old('nonpwp') : ''}}">
                        <small style="color: red">
                            @error('nonpwp')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                    <div class="col">
                        <label for="FileNpwp" class="font-weight-bold text-dark">File NPWP</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="Filenpwp" name="filenpwp" onchange="this.nextElementSibling.innerText = this.files[0].name">
                            <label for="Filenpwp" class="custom-file-label npwp">.pdf</label>
                            <small style="color: red">
                                @error('filenpwp')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="NoKaris" class="font-weight-bold text-dark">No. Karis/Karsu</label>
                        <input type="text" class="form-control" id="Nokaris" name="nokaris" placeholder="Masukan No. Karis/Karsu" value="{{$errors->any() ? old('nokaris') : ''}}">
                        <small style="color: red">
                            @error('nokaris')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                    <div class="col">
                        <label for="FileKaris" class="font-weight-bold text-dark">File Karis/Karsu</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="FileKaris" name="filekaris" onchange="this.nextElementSibling.innerText = this.files[0].name">
                            <label for="FileKaris" class="custom-file-label karis">.pdf</label>
                            <small style="color: red">
                                @error('filekaris')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>
                    </div>
                    <div class="col">
                        <label for="NoKtp" class="font-weight-bold text-dark">No. KTP</label>
                        <input type="text" class="form-control" id="NoKtp" name="noktp" placeholder="Masukan No. KTP" value="{{$errors->any() ? old('noktp') : ''}}">
                        <small style="color: red">
                            @error('noktp')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                    <div class="col">
                        <label for="FileKtp" class="font-weight-bold text-dark">File KTP</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="FileKTP" name="filektp" onchange="this.nextElementSibling.innerText = this.files[0].name">
                            <label for="FileKTP" class="custom-file-label ktp">.pdf</label>
                            <small style="color: red">
                                @error('filektp')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="StatusAktif" class="font-weight-bold text-dark">Status Keaktifan</label>
                        <select id="StatusAktif" class="form-control" name="statusaktif">
                            <option value="" selected>Pilih Status Keaktifan</option>
                            @foreach($statusaktif as $s)
                                <option value="{{$s->id_status_keaktifan}}" {{old('statusaktif')==$s->id_status_keaktifan ? 'selected' : ''}}>{{$s->status_keaktifan}}</option>
                            @endforeach
                        </select>
                        <small style="color: red">
                            @error('statusaktif')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                    <div class="col">
                        <label for="TmtAktif" class="font-weight-bold text-dark">TMT Keaktifan</label>
                        <input type="date" class="form-control" id="TmtAktif" name="tmtaktif" value="{{$errors->any() ? old('tmtaktif') : ''}}">
                        <small style="color: red">
                            @error('tmtaktif')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection