@extends('LayOut.admin-dashboard.master_admin')
@section('content')
<section class="content-header">
    <h1>
      Slide
      <small>Carete</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="">Slide</a></li>
      <li class="active">Create</li>

    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">

    <div class="box box-primary">
        <form role="form" action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="col-sm-7">
                    <div class="col-sm-12">
                        <div class="form-group {{ $errors->first('sd_title') ? 'has-error' : '' }}">
                            <label for="name">Title <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" name="sd_title" placeholder="Name ......">
                                <span class="text-danger">{{ $errors->first('sd_title') }}</span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group {{ $errors->first('sd_link') ? 'has-error' : '' }}">
                            <label for="link">Links <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" name="sd_link" placeholder="link ......">
                                <span class="text-danger">{{ $errors->first('sd_link') }}</span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->first('sd_target') ? 'has-error' : '' }}">
                                    <label for="name">Target </label>
                                    <select name="sd_target" class="form-control">
                                        <option value="1">_blank</option>
                                        <option value="2">_self</option>
                                        <option value="3">_parent</option>
                                        <option value="4">_top</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group {{ $errors->first('sd_sort') ? 'has-error' : '' }}">
                                    <label for="name">Sort </label>
                                    <input type="text" class="form-control" name="sd_sort" placeholder="0">
                                        <span class="text-danger">{{ $errors->first('sd_sort') }}</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Ảnh Mới</label>
                            <div style="margin-bottom:10px" >
                                <img id="image_preview_container" src="" class="img-thumbnail" style="width: 100%;height:300px" alt=""></div>
                                <input type="file" name="sd_image" id="image"  class="js-upload">
                        </div>
                    </div>
                </div>



            </div>
            <div class="box-footer">
                <a href="" class="btn btn-danger"><i class="fa fa-undo"></i> Trở Lại</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
            </div>
            </div>
        </form>
    </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
@endsection
@section('script')
    <script>
        $(function(){
            $('#image').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                  $('#image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
            //run js-select2-keyword
            if($('.js-select2-keyword').length >0){
                $('.js-select2-keyword').select2({
                    placeholder :'Chọn Keyword',
                    maximumSelectionLength : 3
                });

            }
        });

    </script>
@endsection
