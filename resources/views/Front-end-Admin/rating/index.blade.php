@extends('LayOut.admin-dashboard.master_admin')
@section('css')
<style>
    .ratings span i {
        color: #eff0f5;
    }

    .ratings span.active i {
        color: #faca51;
    }
</style>
@endsection
@section('content')
<section class="content-header">
    <h1>
        Ratings
        <small>Danh sách đánh giá sản phẩm</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="">Rating</a></li>
        <li class="active">list</li>

    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><a href="" class="btn btn-primary">Thêm mới </a></h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" id="search-key" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default" id="btn-search"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding" id="js-data">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID -- STT</th>
                                <th>Name SP</th>
                                <th>User Name</th>
                                <th>Time</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="get-items-rating">
                            {{-- dữ liệu sẽ được hiển thị ở đây --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
<div class="modal fade" id="modal-preview-rating">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Rating</h4>
            </div>
            <div class="modal-body">
                <div class="content">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset("shopping/data_rest/rating.js") }}"></script>
@endsection