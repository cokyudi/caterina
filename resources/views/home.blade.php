@extends('layouts.user')

@section('content')
<div class="view hm-black-strong">
    <div class="full-bg-img flex-center">
        <ul>
            <li>
                <h1 class="h1-responsive wow fadeInUp title"><strong>Cari Catering</strong></h1></li>
            <li>
                <div class="row wow fadeIn" data-wow-delay="0.4s">
                    <div class="col-md-12">
                        <div class="md-form">
                            <input type="text" id="form1" class="form-control">
                            <label for="form1">Cari Nama Catering...</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form">
                            <button class="btn btn-lg btn-danger">Cari</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form">
                            <button class="btn btn-lg btn-danger">Cari didekat saya</button>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

<!--Main layout-->
<div class="container">

    <!--Page heading-->
    <div class="row">
        <div class="col-md-12">
            <h1 class="h1-responsive">Catering</h1>
        </div>
    </div>
    <!--/.Page heading-->
    <hr>

    <!--First row-->
    <div class="row wow">
        @foreach($card as $a)
        <!--First column-->
        <div class="col-lg-4 wow fadeIn" data-wow-delay="0.2s">
            <!--Card-->
            <div class="card">

                <!--Card image-->
                <div class="view overlay hm-white-slight">
                    <img src="http://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(43).jpg" class="img-fluid" alt="">
                    <a href="#!">
                        <div class="mask"></div>
                    </a>
                </div>
                <!--/.Card image-->

                <!--Card content-->
                <div class="card-block">
                    <!--Title-->
                    <h4 class="card-title"><b>{{ $a->nama_catering }}</b></h4>
                    <!--Text-->
                    <p class="card-text">{{ $a->deskripsi }}</p>
                    <p class="card-text">{{ $a->alamat_catering }}</p>
                    <div class="read-more">
                        <a href="#!" class="btn btn-primary">Read more</a>
                    </div>
                </div>
                <!--/.Card content-->

            </div>
            <!--/.Card-->
        </div>
    @endforeach
        <!--/.First column-->

    </div>
</div>
<!--/.Main layout-->
@endsection
