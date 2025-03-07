@extends('LayOut.shopping.master_shopping')
@section('content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset("shopping/images/bg-01.jpg") }}');">
    <h2 class="ltext-105 cl0 txt-center">About</h2>
</section>

<!-- Content page -->
<section class="bg0 p-t-75 p-b-120">
    <div class="container">
        <!-- Our Story Section -->
        <div class="row p-b-148">
            <div class="col-md-7 col-lg-8">
                <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">Our Story</h3>
                    <p class="stext-113 cl6 p-b-26">{{ $ourStory->content ?? 'Nội dung không có sẵn' }}</p>
                </div>
            </div>
            <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
                <div class="how-bor1 ">
                    <div class="hov-img0">
                        <img src="{{ asset('shopping/images/about-01.jpg') }}" alt="IMG">
                    </div>
                </div>
            </div>
        </div>

        <!-- Our Mission Section -->
        <div class="row">
            <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
                <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
                    <h3 class="mtext-111 cl2 p-b-16">Our Mission</h3>
                    <p class="stext-113 cl6 p-b-26">{{ $ourMission->content ?? 'Nội dung không có sẵn' }}</p>
                </div>
            </div>
            <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
                <div class="how-bor2">
                    <div class="hov-img0">
                        <img src="{{ asset('shopping/images/about-02.jpg') }}" alt="IMG">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
