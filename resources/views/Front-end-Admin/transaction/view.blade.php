{{-- @extends('LayOut.admin-dashboard.master_admin')
@section('content')
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
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Thông Tin Khách Hàng</h3>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Tên KH</td>
                                <td>Cao Anh Vũ</td>
                            </tr>
                            <tr>
                                <td>Email KH</td>
                                <td>Demo@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Phone KH</td>
                                <td>09999999</td>
                            </tr>
                            <tr>
                                <td>Địa Chỉ KH</td>
                                <td>Hà Lội</td>
                            </tr>
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
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Trạng Thái</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Tổng Tiền Đơn Hàng</td>
                                <td>VND</td>
                            </tr>
                            <tr>
                                <td>Ngày Mua Đơn Hàng</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset("shopping/data_rest/dashboard.js") }}"></script>
@endsection --}}


@extends('LayOut.admin-dashboard.master_admin')
@section('content')
<section class="content-header">
    <h1>View Detail Transaction</h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="">Transaction</a></li>
      <li class="active">Edit</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <!-- Phần thông tin khách hàng -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Thông Tin Khách Hàng</h3>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Tên KH</td>
                                <td id="customer_name"></td>
                            </tr>
                            <tr>
                                <td>Email KH</td>
                                <td id="customer_email"></td>
                            </tr>
                            <tr>
                                <td>Phone KH</td>
                                <td id="customer_phone"></td>
                            </tr>
                            <tr>
                                <td>Địa Chỉ KH</td>
                                <td id="customer_address"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Phần thông tin đơn hàng -->
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Thông Tin Thêm Về Đơn Hàng</h3>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Trạng Thái</td>
                                <td id="order_status"></td>
                            </tr>
                            <tr>
                                <td>Tổng Tiền Đơn Hàng</td>
                                <td id="order_total"></td>
                            </tr>
                            <tr>
                                <td>Ngày Mua Đơn Hàng</td>
                                <td id="order_date"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{ asset("shopping/data_rest/dashboard.js") }}"></script>
@endsection
