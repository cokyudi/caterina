@extends('layouts.user')

@section('style')
    <style media="screen">
        .card .view {
            background-image: url("{{ asset('img/big_picture.jpg') }}");
            height: 200px;
        }
    </style>
@endsection

@section('content')
<div class="container" style="margin-top:96px; min-height: 600px !important">
    <div class="row">
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ URL::to('dashboard/profil') }}">Profil</a></li>
                <li class="list-group-item"><a href="{{ URL::to('dashboard/pesanan') }}">Pesanan</a></li>
                <li class="list-group-item"><a href="{{ URL::to('dashboard/menu') }}">Menu</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row wow">
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.2s">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title"><b>Nasi Goreng (30pcs)</b></h4>
                            <p class="card-text-small">Gung De - 21 Jan 2017</p>
                            <p class="card-text">Nasi Goreng, Sayur, Ayam sisit</p>
                            <p class="card-text">Pesan: gak isi sambel</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="card-text-small">Jalan Blambangan</p>
                                    <p class="card-text-small">0.121212, 0.12121212</p>
                                    <p class="card-text-small">Untuk: <b>22 Jan 2017</b></p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <h4><b>Rp. 300.000</b></h4>
                                </div>
                            </div>
                            <hr>
                            <div class="read-more text-right" style="display:inherit;">
                                <a href="#!" class="btn btn-theme">Detail</a>
                                <a href="#!" class="btn btn-orange">Terima</a>
                                <a href="#!" class="btn btn-outline-danger waves-effect">Tolak</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
