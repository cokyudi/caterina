@extends('layouts.user')

@section('content')
<div class="view hm-black-strong banner" style="margin-top:48px;height:300px">
    <div class="full-bg-img flex-center">
        <ul class="white-text">
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
                            <button class="btn btn-lg btn-amber btn-block" style="margin-top:1px">Cari</button>
                        </div>
                    </div>
            </form>
                    <div class="col-md-12">
                        <div class="md-form">
                            <button type="button" onclick="find()" class="btn btn-lg btn-theme" data-toggle="modal" data-target="#mdl-map">Catering dekat saya</button>
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
                    <p class="card-text latTujuan" style="display:none">{{ $a->lat_catering }}</p>
                    <p class="card-text lngTujuan" style="display:none">{{ $a->long_catering }}</p>
                    <p class="card-text jarak">km</p>

                    <div class="read-more text-center">
                        <a href="{{ URL::to('catering/'.$a->id) }}" class="btn btn-theme">Lihat catering</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <p class="card-text latAsal" style="display:none">{{ $lat }}</p>
    <p class="card-text lngAsal" style="display:none">{{ $lng }}</p>
</div>

<div class="modal fade" id="mdl-map" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100" id="myModalLabel">Tentukan Lokasi Anda Saat ini</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ url('/cariTerdekat') }}">
                    {{ csrf_field() }}
                    <input type="hidden" id="latMap" name="lat">
                    <input type="hidden" id="lngMap" name="lng">
                    <button type="submit" class="btn btn-orange">pilih lokasi</button>
                </form>
                <div id="map" style="width:100%;height:500px;"></div>
            </div>
        </div>
    </div>
</div>

<script>
    var marker;
    var lat;
    var lng;

    function find(){
        var mapCanvas = document.getElementById("map");
        var myCenter=new google.maps.LatLng(-6.8555315754820265, 113.1646728515625);
        var mapOptions = {center: myCenter, zoom: 8};
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
        lat = marker.position.lat();
        lng = marker.position.lng();
        $('.modal-body #latMap').val(lat);
        $('.modal-body #lngMap').val(lng);

        var infowindow = new google.maps.InfoWindow({
            content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
        });
        infowindow.open(map,marker);
    }

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRI3ZQK76nXPfIjsbSExgClCuGProkGp8&libraries=geometry&callback=jarak" async defer></script>
<script>
    function jarak(){
        var posUser = new google.maps.LatLng(parseFloat($('.latAsal').html()), parseFloat($('.lngAsal').html()));
        console.log(posUser);
        var cardBlock = $('.card-block');
        var posSites = [];
        cardBlock.each(function (x){
            if(x!=undefined) {
                var posSite = new google.maps.LatLng(parseFloat(cardBlock.eq(x).find('.latTujuan').html()),parseFloat(cardBlock.eq(x).find('.lngTujuan').html()));
                posSites.push(posSite);
            }
        });

        var service = new google.maps.DistanceMatrixService();
        service.getDistanceMatrix(
          {
            origins: [posUser],
            destinations: posSites,
            travelMode: 'DRIVING',
          }, callback);

        function callback(response, status) {
            console.log(response);
            if (status == 'OK') {
                var origins = response.originAddresses;
                var destinations = response.destinationAddresses;

                for (var i = 0; i < origins.length; i++) {
                    var results = response.rows[i].elements;
                    for (var j = 0; j < results.length; j++) {
                      var element = results[j];
                      var distance = element.distance.text;
                      cardBlock.eq(j).find('.jarak').html(distance);
                    }
                }
            }
        }
    };
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#mdl-map').on('shown.bs.modal', function(){
            google.maps.event.trigger(map, "resize");
        });
    });
</script>
@endsection
