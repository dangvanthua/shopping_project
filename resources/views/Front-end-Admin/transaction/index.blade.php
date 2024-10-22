@extends('LayOut.admin-dashboard.master_admin')
@section('content')
<section class="content-header">
    <h1>
        Quản lý đơn hàng
        <small>index</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="">transaction</a></li>
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
                    <div class="box-title">
                        <form action="" method="GET" class="form-inline">
                            <input type="text" class="form-control" name="id" placeholder="ID">
                            <input type="text" class="form-control" name="email" placeholder="Email ...">
                            <select name="status" class="form-control">
                                <option value="0">__Trạng Thái__</option>
                                <option value="1">Tiếp Nhận</option>
                                <option value="2">Đang Vận Chuyển</option>
                                <option value="3">Đã Bàn Giao</option>
                                <option value="-1">Hủy Bỏ</option>
                            </select>
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"> </i> Search</button>
                        </form>
                    </div>
                </div>
                <!-- .box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Info</th>
                                <th>Money</th>
                                <th>Status</th>
                                <th>Phương thức TT</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="dashboard_list">
                            <!-- Nội dung sẽ được thêm vào đây bằng JavaScript -->
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="modal-preview-transaction">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Chi Tiết Đơn hàng <b></b></h4>
            </div>
            <div class="modal-body">
                <div class="content"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset(" shopping/data_rest/dashboard.js") }}"></script>
@endsection