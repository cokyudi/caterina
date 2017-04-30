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
            menu
        </div>
        <div class="col-md-9">
            <h2 class="h2-responsive wow fadeIn">Nasi Goreng</h2><br>
            <h3>Nasi</h3>
            <div class="row">
                <div class="col-">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
