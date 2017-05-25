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
                <li class="list-group-item"><a href="{{ URL::to('profile') }}">Profil Saya</a></li>
                <li class="list-group-item"><a href="{{ URL::to('pesanan') }}">Pesanan Saya</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <h3>Profil saya</h3>
            <div class="row wow">
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.2s">
                    <div class="card">
                        <div class="card-block">
                            <form class="form-horizontal" action="{{ URL::to('profile/update') }}" method="post">
                                {{ csrf_field() }}
                                <fieldset>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="nama">Nama:</label>
                                        <div class="col-md-9">
                                            <input id="nama" value = "{{ $profile_user-> nama_user }}" name="nama" class="form-control input-md"  type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="email">Email:</label>
                                        <div class="col-md-9">
                                            <input id="email" value = "{{ $profile_user-> email }}" name="email" class="form-control input-md"  type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="telp">No. Telepon:</label>
                                        <div class="col-md-9">
                                            <input id="telp" value = "{{ $profile_user-> no_telp }}" name="telp" class="form-control input-md"  type="text">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="pass">Password Lama:</label>
                                        <div class="col-md-9">
                                            <input id="pass" value = "{{ $profile_user->password }}" name="pass" class="form-control input-md"  type="password">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="newpass">Password Baru:</label>
                                        <div class="col-md-9">
                                            <input id="newpass" value="" name="newpass" class="form-control input-md"  type="password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="confirmpass">Confirm Password:</label>
                                        <div class="col-md-9">
                                            <input id="confirmpass" value="" name="confirmpass" class="form-control input-md"  type="password">
                                        </div>
                                    </div>

                                    <div class="col-md-4">    
                                        <div class="md-form">
                                            <button type="submit" class="btn btn-lg btn-amber btn-block">Edit</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection