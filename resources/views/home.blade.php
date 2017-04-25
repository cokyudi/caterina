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
                            <label for="form1">Your city</label>
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
            <h1 class="h1-responsive">Culinary blog
                <small class="text-muted">recipes for launches and desserts </small>
            </h1>
        </div>
    </div>
    <!--/.Page heading-->
    <hr>

    <!--First row-->
    <div class="row wow">
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
                    <h4 class="card-title"><b>Warung Mad Dog</b></h4>
                    <!--Text-->
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <p class="card-text">Alamat</p>
                    <p class="card-text">No HP</p>
                    <div class="read-more">
                        <a href="#!" class="btn btn-brown">Read more</a>
                    </div>
                </div>
                <!--/.Card content-->

            </div>
            <!--/.Card-->
        </div>
        <!--/.First column-->

    </div>
</div>
<!--/.Main layout-->
@endsection
