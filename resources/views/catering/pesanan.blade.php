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

                <div class="card">
                    <div class="table-responsive">
                        <?php if (sizeof($transaksi) > 0): ?>
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="50">#</th>
                                        <th width="150">Nama Menu</th>
                                        <th width="70">Qty</th>
                                        <th width="150">Harga</th>
                                        <th width="100">Tanggal</th>
                                        <th width="180">Nama pemesan</th>
                                        <th width="80">Status</th>
                                        <th width="120">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    @foreach($transaksi as $key => $a)
                                    <!--    <div class="card-block">!-->
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
                                        <tr>
                                            <td width="50">{{$i,$i++}}</td>
                                            <td width="150"><small>{{ $a->nama_menu }}</small></td>
                                            <td width="70">{{ $a->qty_transaksi }}pcs</td>
                                            <td width="80">Rp. {{ $a->total_harga*$a->qty_transaksi }}</th>
                                            <td width="150">{{ $a->tanggal_diambil }}</td>
                                            <td width="100">{{ $a->nama_user }}</td>
                                            <td width="80">
                                                <small><span class="{{$color}}-text">{{$status}}</span></small>
                                                @if($a->status_transaksi == 2)
                                                    <div class="read-more text-right" style="display:inherit;">
                                                        <a href="{{ URL::to('dashboard/pesanan/dikirim/'.$a->id_transaksi )}}" class="btn btn-orange btn-sm">dikirim</a>
                                                    </div>
                                                @endif

                                            </td>
                                            <td width="120">
                                                <a href="" onclick="detailPesanan({{$a->id_transaksi}})" data-toggle="modal" data-target="#detailPesanan" class="btn btn-theme"><i class="icon ion-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- MODAL -->
                <div class="modal fade" id="detailPesanan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title w-100" id="myModalLabel">Detail Pesanan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    <div class="detail"></div>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

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


    function detailPesanan(id){

        var data={
            id:id
        };

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
            }
        });

        $.ajax({
            method:'GET',
            url:'/dashboard/pesanan/detailPesanan/',
            data:data,
            success: function(result){
                //window.location.reload(true)
                $('.detail').html(result)
            },
            error: function(result){
                console.log(result);
            }
        })
    }

</script>
@endsection
