@extends('layouts.user')

@section('style')
    <style media="screen">
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

<div class="view hm-black-strong banner" style="margin-top:48px;height:300px;background-image: url('{{asset('storage/'.$catering->foto_catering)}}')">
    <div class="full-bg-img"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="display-picture" style="background-image: url('{{asset('storage/'.$catering->foto_catering)}}')"></div>
        </div>
        <div class="col-sm-9" style="padding-top:24px">
            <h4><b>{{ $catering->nama_catering }}</b></h4>
            <p>{{ $catering->deskripsi }}</p>
            <p><b>Alamat:</b> {{ $catering->alamat_catering }}</p>
            <p><b>No telp:</b> {{ $catering->no_telp_catering }}</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach($menu as $key => $a)
            <div class="col-lg-3 col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                <div class="card">
        <?php if(isset($a->gambarMenu->gambar_menu)){ ?>
                    <div class="view overlay hm-white-slight" style="background-image: url('{{asset('storage/gambar_menu/'.$a->gambarMenu->gambar_menu) }}');">
        <?php }else{ ?>
                    <div class="view overlay hm-white-slight" style="background-image: url('{{asset('img/big_picture.jpg')}}');">
        <?php   } ?>
                        <a href="{{ URL::to('menu/'.$a->id) }}">
                            <div class="mask waves-effect waves-light"></div>
                        </a>
                    </div>
                    <div class="card-block">
                        <h4 class="card-title"><b>{{ $a->nama_menu }}</b></h4>
                        <p class="card-text green-text text-right"><b>Rp. {{ $harga[$key] }}</b></p>
                        <div class="read-more text-center" style="display:inherit;">
                            <a href="{{ URL::to('menu/'.$a->id) }}" class="btn btn-theme">lihat menu</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
