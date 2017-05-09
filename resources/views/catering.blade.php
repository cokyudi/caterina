@extends('layouts.user')

@section('style')
    <style media="screen">
        .banner {
            background-image: url("{{ asset('img/big_picture.jpg') }}");
        }
        .card .view {
            background-image: url("{{ asset('img/big_picture.jpg') }}");
        }
        .display-picture {
            height: 200px;
            width: 200px;
            background-color: white;
            margin-top: -130px;
            background-position: center center;
            background-repeat: no-repeat;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
        }
    </style>
@endsection

@section('content')

<div class="view hm-black-strong banner" style="margin-top:48px;height:300px">
    <div class="full-bg-img"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="display-picture" style="background-image: url('{{ asset('img/big_picture.jpg') }}')"></div>
        </div>
        <div class="col-sm-9" style="padding-top:24px">
            <h4><b>Nama Catering</b></h4>
            <p>nasi campur isi telor dadar</p>
            <p><b>Alamat:</b> Jalan Blambangan Gg 1</p>
            <p><b>No telp:</b> 081332211</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-sm-6 wow fadeIn" data-wow-delay="0.2s">
            <div class="card">
                <div class="view overlay hm-white-slight">
                    <a href="{{ URL::to('menu') }}">
                        <div class="mask waves-effect waves-light"></div>
                    </a>
                </div>
                <div class="card-block">
                    <h4 class="card-title"><b>Nasi Goreng</b></h4>
                    <p class="card-text green-text text-right"><b>Rp. 10.000</b></p>
                    <div class="read-more text-center" style="display:inherit;">
                        <a href="{{ URL::to('menu') }}" class="btn btn-theme">lihat menu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
