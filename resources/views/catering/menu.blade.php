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
<div class="container" style="margin-top:96px">
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
                <div class="col-md-8 wow fadeIn" data-wow-delay="0.2s">
                    <form class="" action="" method="post" style="display:inherit">
                        <input type="text" class="input-custom" name="" value="" style="width:400px" placeholder="Tambah menu makanan...">
                        <button type="button" class="btn btn-warning" style="margin-top:1px"><i class="icon ion-plus"></i></button>
                    </form>
                    <div class="section"></div>
                </div>
                <div class="col-md-4 text-right wow fadeIn" data-wow-delay="0.2s">
                    <a href="{{ URL::to('dashboard/item') }}" class="btn btn-theme">tambah item</a>
                </div>
                <div class="col-lg-4 col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                    <div class="card">
                        <div class="view overlay hm-white-slight">
                            <a href="{{ URL::to('dashboard/menu',1) }}">
                                <div class="mask waves-effect waves-light"></div>
                            </a>
                        </div>
                        <div class="card-block">
                            <h4 class="card-title"><b>Nasi Goreng</b></h4>
                            <div class="read-more text-center" style="display:inherit;">
                                <a href="#!" class="btn btn-theme"><i class="icon ion-edit"></i></a>
                                <a href="#!" class="btn btn-danger"><i class="icon ion-android-delete"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
