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
                <li class="list-group-item"><a href="{{ URL::to('profil') }}">Profil Saya</a></li>
                <li class="list-group-item"><a href="{{ URL::to('pesanan') }}">Pesanan Saya</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <h3>Pesanan saya</h3>
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
                                @if($a->status_transaksi == 1)
                                    <hr>
                                    <div class="read-more text-right" style="display:inherit;">
                                        <a href="#!" class="btn btn-orange" data-toggle="modal" data-target="#mdl-pembayaran" onclick="id_transaksi = {{$a->id_transaksi}}">konfirmasi pembayaran</a>
                                    </div>
                                @elseif($a->status_transaksi == 3)
                                <hr>
                                <div class="read-more text-right" style="display:inherit;">
                                    <a href="{{ URL::to('pesanan/diterima/'.$a->id_transaksi )}}" class="btn btn-orange">catering sudah diterima</a>
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

<!-- MODAL -->
<div class="modal fade" id="mdl-pembayaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100" id="myModalLabel">Masukkan kode pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="red-text" id="message">&nbsp;</span>
                <input type="text" id="in-kode" placeholder="Kode pembayaran"><br><br>
                <button type="button" class="btn btn-orange btn-block" onclick="verify()">oke</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">

    id_transaksi = 0

    function verify() {
        var kode = $('#in-kode').val()
        var _token= "{{ csrf_token() }}"
        var data = {
            id_transaksi:id_transaksi,
            kode_transaksi:kode,
            _token:_token
        }

        $.ajaxSetup({ headers: {'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')} });
        $.ajax({
            method:'POST',
            url:'{{ URL::to("/pesanan/bayar") }}',
            data:data,
            success: function(data){
                var data = JSON.parse(data)
                if (data.status == 'success') {
                    window.location.reload(true);
                } else {
                    $('#message').html(data.message)
                }
            },
            error: function(data){
                alert(data)
                alert("error");
            }
        })
    }
</script>
@endsection
