@extends('adminlayout.layout')
@section('content')
<div class="container-fluid">
        <div class="card shadow">
            <form method="POST" enctype="multipart/form-data" action="">
                <div class="form-group card-header shadow">
                    <div class="row justify-content-center">
                        <div class="col col-md-10">
                            <h3 class="m-0 font-weight-bold text-primary">Data Dosen</h3>
                        </div>
                        <div class="col col-1">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        <div class="col col-1">
                            <a href="/" class="btn btn-danger">cancel</a>
                        </div>
                    </div>
                </div>
                <div class="form-group card-header">
                    <div class="row align-items-center">
                        <div class="col col-4">
                            <label for="nidn" class="font-weight-bold text-dark">NIDN/NIDK/NUP</label>
                            <input type="text" class="form-control" id="nidn" placeholder="">
                        </div>
                        <div class="col col-4">
                            <label for="nip" class="font-weight-bold text-dark">NIP</label>
                            <input type="text" class="form-control" id="nip" placeholder="Last name">
                        </div>
                        <div class="col col-sm-1">
                        
                        </div>
                        <div class="col">
                            <img src="" class="mb-3" style="border:solid #000 5px;height:120px;width:100px;" id="propic">
                            <input type="file" class="form-control-file" id="profile_image" name="profile_image">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="gelardepan" class="font-weight-bold text-dark">Gelar Depan</label>
                            <input type="text" class="form-control" id="gelardepan" placeholder="">
                        </div>
                        <div class="col">
                            <label for="InputName" class="font-weight-bold text-dark">Nama Lengkap</label>
                            <input type="text" class="form-control" id="InputName"  placeholder="">
                        </div>
                        <div class="col">
                            <label for="gelarbelakang" class="font-weight-bold text-dark">Gelar Belakang</label>
                            <input type="text" class="form-control" id="gelarbelakang" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-lg-2">
                            <label for="InputTempatLahir" class="font-weight-bold text-dark">Status Dosen</label>
                            <select class="form-control">
                                @foreach($statusaktif as $s)
                                    <option value="{{$s->id_keaktifan}}">{{$s->status_keaktifan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="InputTempatLahir" class="font-weight-bold text-dark">Tempat Lahir</label>
                            <input type="text" class="form-control" id="InputTempatLahir"  placeholder="">
                        </div>
                        <div class="col">
                            <label for="InputTanggalLahir" class="font-weight-bold text-dark">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="InputTanggalLahir"  placeholder="">
                        </div>
                        <div class="col col-lg-2">
                            <label for="JenisKelamin" class="font-weight-bold text-dark">Jenis Kelamin</label>
                            <select class="form-control" id="JenisKelamin">
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="InputAlamatDomisili" class="font-weight-bold text-dark">Alamat Domisili (Tinggal Sekarang)</label>
                            <input type="text" class="form-control" id="InputAlamatDomisili"  placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="InputAlamatRumah" class="font-weight-bold text-dark">Alamat Rumah (Sesuai KK/KTP)</label>
                            <input type="text" class="form-control" id="InputAlamatRumah"  placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <div class='col'>
                            <label for="InputTelpRumah" class="font-weight-bold text-dark">Telp Rumah</label>
                            <input type="text" class="form-control" id="InputTelpRumahRumah"  placeholder="">
                        </div>
                        <div class='col'>
                            <label for="InputNoHp" class="font-weight-bold text-dark">No HP</label>
                            <input type="text" class="form-control" id="InputNoHp"  placeholder="">
                        </div>
                        <div class='col'>
                            <label for="InputEmail" class="font-weight-bold text-dark">Email Aktif</label>
                            <input type="email" class="form-control" id="InputEmail"  placeholder="">
                        </div>
                    </div>
                </div>
                <div class="form-group card-header">
                    <div class="row">
                        <div class="col col-md-12">
                            <h3 class="font-weight-bold text-primary">Data Kepangkatan Fungsional</h3>
                        </div>
                    </div>
                </div>
                <div class="form-group card-header">
                    <div class="row">
                        <div class="col">
                            <label for="PangkatGolongan" class="font-weight-bold text-dark">Pangkat/Golongan Terakhir</label>
                            <select class="form-control" id="PngkatGolongan">
                                @foreach($pangkatDosen as $p)
                                    <option value="{{$p->id_pangkat_pns}}">{{$p->pangkat}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="JabatanAkademik" class="font-weight-bold text-dark">Jabatan Akademik Terakhir</label>
                            <select class="form-control" id="JabatanAkademik">
                                @foreach($jabatanDosen as $j)
                                    <option value="{{$j->id_jabatan_fungsional}}">{{$j->jabatan_fungsional}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="TmtPangkatGolongan" class="font-weight-bold text-dark">TMT Pangkat/Golongan Terakhir</label>
                            <input type="date" class="form-control" id="TmtPangkatGolongan"  placeholder="">
                        </div>
                        <div class="col">
                            <label for="TmtJabatan" class="font-weight-bold text-dark">TMT Jabatan Terakhir</label>
                            <input type="date" class="form-control" id="TmtJabatan" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-6">
                            <label for="Unit" class="font-weight-bold text-dark">Unit</label>
                            <select class="form-control" id="Unit">
                                @foreach($unit as $u)
                                    <option value="{{$u->id_fakultas}}">{{$u->fakultas}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group card-header">
                    <div class="row">
                        <div class="col col-md-12">
                            <h3 class="font-weight-bold text-primary">Berkas</h3>
                        </div>
                    </div>
                </div>
                <div class="form-group card-header">
                    <div class="row">
                        <div class="col">
                            <label for="NoKarpeg" class="font-weight-bold text-dark">No Karpeg</label>
                            <input type="text" class="form-control" id="NoKarpeg"></input>
                        </div>
                        <div class="col">
                            <label for="FileKarpeg" class="font-weight-bold text-dark">File Karpeg</label>
                            <input type="file" class="form-control-file" id="FileKarpeg"></input>
                        </div>
                        <div class="col">
                            <label for="NoNpwp" class="font-weight-bold text-dark">No NPWP</label>
                            <input type="text" class="form-control" id="NoNpwp"></input>
                        </div>
                        <div class="col">
                            <label for="FileNpwp" class="font-weight-bold text-dark">File NPWP</label>
                            <input type="file" class="form-control-file" id="FileNpwp"></input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="NoKaris" class="font-weight-bold text-dark">No Karis/Karsu</label>
                            <input type="text" class="form-control" id="Nokaris"></input>
                        </div>
                        <div class="col">
                            <label for="FileKaris" class="font-weight-bold text-dark">File Karis/Karsu</label>
                            <input type="file" class="form-control-file" id="FileKaris"></input>
                        </div>
                        <div class="col">
                            <label for="NoKtp" class="font-weight-bold text-dark">No KTP</label>
                            <input type="text" class="form-control" id="NoKtp"></input>
                        </div>
                        <div class="col">
                            <label for="FileKtp" class="font-weight-bold text-dark">File KTP</label>
                            <input type="file" class="form-control-file" id="FileKTP"></input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="StatusAktif" class="font-weight-bold text-dark">Status Keaktifan</label>
                            <select name="statusKeaktif" id="StatusAktif" class="form-control">
                                @foreach ($statusDosen as $status)
                                    <option value="{{$status->id_status_dosen}}">{{$status->status_dosen}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="TmtAktif" class="font-weight-bold text-dark">TMT Keaktifan</label>
                            <input type="date" class="form-control" id="TmtAktif"></input>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</div>
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