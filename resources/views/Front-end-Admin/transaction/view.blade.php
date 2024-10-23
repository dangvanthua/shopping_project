
<section class="content-header">
    <h1>
      View Detai Transaction
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="">Transaction</a></li>
      <li class="active">Edit</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
        <form role="form" action="" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Thông Tin Khách Hàng</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tbody id="info_user">
                                    {{-- Hiện thị danh sách ở đây --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box box-danger">
                        <div class="box-header">
                            <h3 class="box-title">Thông Tin Thêm Về Đơn Hàng</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th style="width: 30%">Thuộc Tính</th>
                                        <th>Giá Trị</th>
                                    </tr>
                                    <tr>
                                        <td>Trạng Thái</td>
                                        <td><span class="badge bg-light-blue"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Tông Tiền Đơn Hàng</td>
                                        <td><span class="badge bg-red"> VND</span></td>
                                    </tr>
                                    <tr>
                                        <td>Ngày Mua Đơn Hàng</td>
                                        <td><span >Yes sir</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box box-danger">
                        <div class="box-header">
                            <h3 class="box-title">Chi Tiết Về Lịch Sử Mua Hàng</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-condensed">
                                <tbody>
                                    <tr>
                                        <th style="width: 75px;">STT -- ID</th>
                                        <th>Name</th>
                                        <th>Avatar</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <img style="height: 80px;" src="" alt="">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box-footer" style="text-align: center;">
                        <a href="" class="btn btn-danger"><i class="fa fa-undo"></i> Trở Lại</a>
                        {{-- <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button> --}}
                    </div>
                </div>
        </form>
    </div>
    </div>
  </section>
<script src="{{ asset("shopping/data_rest/dashboard.js") }}"></script>

