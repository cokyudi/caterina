@extends('layouts.user')

@section('style')
    <style media="screen">
        .banner {
            background-image: url("{{ asset('img/big_picture.jpg') }}");
        }
    </style>
@endsection

@section('content')
<div class="view hm-black-strong banner">
    <div class="full-bg-img flex-center">
        <ul class="white-text">
            <li>
                <h2 class="h2-responsive wow fadeInUp title"><strong>Cari Catering</strong></h2>
            <li>
            <form action="{{ url('/cari?=pencarian') }}" method="get">
                {{ csrf_field() }}
                <div class="row wow fadeIn" data-wow-delay="0.4s">
                    <div class="col-sm-9" style="padding: 0 4px">
                        <div class="md-form">
                            <input type="text" name="pencarian" placeholder="Cari nama catering">
                        </div>
                    </div>
                    <div class="col-sm-3" style="padding: 0 4px">
                        <div class="md-form">
                            <button type="submit" class="btn btn-lg btn-amber btn-block" style="margin-top:1px">Cari</button>
                        </div>
                    </div>
            </form>
                    <div class="col-md-12">
                        <div class="md-form">
                            <button class="btn btn-lg btn-theme">Catering dekat saya</button>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

<div class="container">

    <div class="divider-new">
        <h2 class="h2-responsive wow fadeIn">Catering</h2>
    </div>

    <div class="row wow">
        @foreach($card as $a)
        <div class="col-lg-4 col-md-6 wow fadeIn" data-wow-delay="0.2s">
            <div class="card">
                <div class="view overlay hm-white-slight" style="background-image: url('{{asset('storage/'.$a->foto_catering)}}')">
                    <a href="{{ URL::to('catering/'.$a->id) }}">
                        <div class="mask waves-effect waves-light"></div>
                    </a>
                </div>
                <div class="card-block">
                    <h4 class="card-title"><b>{{ $a->nama_catering }}</b></h4>
                    <p class="card-text-small">{{ $a->alamat_catering }}</p>
                    <p class="card-text-small">No Telp: {{ $a->no_telp_catering }}</p>
                    <p class="card-text">{{ $a->deskripsi }}</p>
                    <div class="read-more text-center">
                        <a href="{{ URL::to('catering/'.$a->id) }}" class="btn btn-theme">Lihat catering</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRI3ZQK76nXPfIjsbSExgClCuGProkGp8&callback=initMap" async defer></script>
@endsection
