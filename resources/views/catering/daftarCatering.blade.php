@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3" style="margin-top:120px">
            <!--Form with header-->
            <div class="card">
                <div class="card-block">

                    <!--Header-->
                    <div class="form-header orange">
                        <h3>Daftar Catering:</h3>
                    </div>

                    <!--Body-->
                    <div class="md-form">
                        <input type="text" id="nama_catering" name="nama_catering" class="form-control" required>
                        <label for="nama_catering">Nama Catering</label>
                    </div>

                    <div class="md-form">
                        <textarea type="text" id="deskripsi" name="deskripsi" class="md-textarea" required></textarea>
                        <label for="deskripsi">Deskripsi Catering Saya</label>
                    </div>

                    <div class="md-form">
                        <input type="text" id="no_telp_catering" name="no_telp_catering" class="form-control" required>
                        <label for="no_telp_catering">Nomor Telepon</label>
                    </div>

                    <div class="md-form">
                        <input type="text" id="alamat_catering" name="alamat_catering" class="form-control" required>
                        <label for="alamat_catering">Alamat</label>
                    </div>

                    <div class="md-form row">
                        <div class="col-sm-8">
                            <input type="text" id="lokasi" name="lokasi" class="form-control" required placeholder="Lokasi">
                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="button" name="button" class="btn btn-theme" data-toggle="modal" data-target="#mdl-map">
                                <i class="icon ion-ios-location"></i>
                            </button>
                        </div>
                    </div>

                    <div class="file-field">
                        <div class="btn btn-primary btn-sm">
                            <span>Choose file</span>
                            <input type="file" name="foto_catering" required>
                        </div>
                        <div class="file-path-wrapper">
                           <input class="file-path validate" type="text" placeholder="Upload Foto Catering">
                        </div>
                    </div><br><br>

                    <div class="text-center">
                        <button class="btn btn-deep-purple">Login</button>
                    </div>

                </div>

                <!--Footer-->
                <div class="modal-footer">
                    <div class="options">
                        <p>Not a member? <a href="#">Sign Up</a></p>
                        <p>Forgot <a href="#">Password?</a></p>
                    </div>
                </div>

            </div>
            <!--/Form with header-->
        </div>
    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="mdl-map" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100" id="myModalLabel">Tentukan Lokasi Catering</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="map" style="width:100%;height:500px;"></div>
                <button type="button" class="btn btn-orange" onclick="verify()">oke</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')

<script type="text/javascript">
var marker

function myMap() {
    var mapCanvas = document.getElementById("map");
    var myCenter=new google.maps.LatLng(-8.4550569,114.5110624);
    var mapOptions = {center: myCenter, zoom: 5};
    var map = new google.maps.Map(mapCanvas, mapOptions);
    google.maps.event.addListener(map, 'click', function(event) {
        placeMarker(map, event.latLng);
    });
}

function placeMarker(map, location) {
    if (marker) {
        marker.setPosition(location);
    } else {
        marker = new google.maps.Marker({
            position: location,
            map: map
        });
    }

    var infowindow = new google.maps.InfoWindow({
        content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
    });
    infowindow.open(map,marker);
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDF73sPtnq3SSTngsgp0erLt4YD2Ur0vtY&callback=myMap"></script>
@endsection
