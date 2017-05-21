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
            <h3>Daftar Pesanan Catering Saya</h3>
            <div class="row wow">
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.2s">
                    @foreach($transaksi as $key => $a)
                        <div class="card">
                            <div class="card-block">
                                <?php
                                $status = '';
                                $color = '';
                                    switch ($a->status_transaksi) {
                                        case 1:
                                            $status = 'Belum dibayar';
                                            $color = 'red';
                                            break;
                                        case 2:
                                            $status = 'Sudah dibayar';
                                            $color = 'green';
                                            break;
                                        case 3:
                                            $status = 'Catering belum diterima pembeli';
                                            $color = 'orange';
                                            break;
                                    }
                                ?>
                                <h4 class="card-title"><b>{{ $a->nama_menu }} ({{ $a->qty_transaksi }}pcs) - <small><span class="{{$color}}-text">{{$status}}</span></small></b></h4>
                                <p class="card-text-small">{{ $a->nama_user }} - {{ $a->timestamp }}</p>
                                @foreach($item as $key => $ti)
                                    @if($ti->id_transaksi == $a->id_transaksi)
                                        <p class="card-text">{{ $ti->nama_item }} - {{ $ti->qty_item.' '.$ti->satuan_item }}</p>
                                    @endif
                                @endforeach
                                <p class="card-text">Pesan: {{ $a->pesan }}</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="card-text-small">{{ $a->alamat }}</p>
                                        <p class="card-text-small">Untuk: <b>{{ $a->tanggal_diambil }}</b></p>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <h4><b>Rp. {{ $a->total_harga*$a->qty_transaksi }}</b></h4>
                                    </div>
                                </div>
                                @if($a->status_transaksi == 2)
                                    <hr>
                                    <div class="read-more text-right" style="display:inherit;">
                                        <a href="{{ URL::to('dashboard/pesanan/dikirim/'.$a->id_transaksi )}}" class="btn btn-orange">catering sudah dikirim</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
