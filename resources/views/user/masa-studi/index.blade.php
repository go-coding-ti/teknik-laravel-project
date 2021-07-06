@extends('userlayout.layout')
@section('add_js')
<script>
    $('.file-upload').file_upload();
</script>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-xs-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Data Progress Masa Studi</h2>
                    </div>
                    <div class="card-body">
                        @if($attachment == '[]')
                        <div class="form-row">
                            <div class="form-group col">
                                <a style="margin-bottom: 10px;" data-toggle="modal" data-target="#modal-global" class= "btn btn-primary text-white" id="toggle" ><i class="fas fa-download"></i> Import Attachment</a>  
                                <h4>Tidak ada Attachment</h4>
                            </div>
                        </div>
                        @elseif($attachment != null)
                        <div class="form-row">
                        <a style="margin-bottom: 10px;" data-toggle="modal" data-target="#modal-global" class= "btn btn-primary text-white" id="toggle" ><i class="fas fa-download"></i> Import Attachment</a>  
                        <table id="example1" class="table table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>
                                        No.
                                    </th>
                                    <th>
                                        Preview
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1?>
                                    @foreach($attachment as $att)
                                        <tr>
                                            <td>
                                                {{$i}}
                                            </td>
                                            <td>
                                                {{$att->file_name}}
                                            </td>
                                            <td width="20%" align="center">
                                                <div class="d-flex align-items-center">
                                                    <a href="{{route('masa-studi-delete',encrypt($att->id))}}" class="btn btn-danger" onclick="return confirm('Delete entry?')"><i class="fa fa-trash"></i> Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $i++ ?>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modal-global">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-body">
            <form enctype="multipart/form-data" action="{{Route('masa-studi-create')}}" method="POST">
            @csrf
              <div class="text-center">
                  <i class="fa fa-3x fa-refresh fa-spin"></i>
                  <div>
                    <h4>Masukan File</h4>
                    <br>
                    <div class="file-upload-wrapper">
                        <input type="file" id="input-file-now" class="file-upload" name="attachments[]" multiple>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
              </div>
            </form>
          </div>
      </div>
  </div>
</div>

@endsection