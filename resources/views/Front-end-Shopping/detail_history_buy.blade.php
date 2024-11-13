@extends('LayOut.shopping.master_shopping')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset("shopping/css/view_detail_history.css") }}">
<div class="order-container">
    <div class="order-header">
        <h2>Chi tiết đơn hàng</h2>
    </div>
    <div id="view-history" class="view-history">
        {{-- Hiển thị dữ liệu ở chỗ này trong js --}}
    </div>
</div>
<script src="{{ asset('shopping/data_rest/history_buyitems.js') }}"></script>
@endsection