@extends('layouts.user')

@section('content')

<div class="container" style="margin-top: 96px">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('img/big_picture.jpg') }}" onclick="openModal();currentSlide(1)" class="hover-shadow" width="100%">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('img/big_picture.jpg') }}" onclick="openModal();currentSlide(2)" class="hover-shadow" width="100%">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('img/big_picture.jpg') }}" onclick="openModal();currentSlide(3)" class="hover-shadow" width="100%">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('img/big_picture.jpg') }}" onclick="openModal();currentSlide(4)" class="hover-shadow" width="100%">
                </div>
            </div>

            <div id="myModal" class="modal mdl-gallery">
                <span class="close cursor" onclick="closeModal()">&times;</span>
                <div class="modal-content">

                    <div class="mySlides">
                        <div class="numbertext">1 / 4</div>
                        <img src="{{ asset('img/big_picture.jpg') }}" style="width:100%">
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">2 / 4</div>
                        <img src="{{ asset('img/big_picture.jpg') }}" style="width:100%">
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">3 / 4</div>
                        <img src="{{ asset('img/big_picture.jpg') }}" style="width:100%">
                    </div>

                    <div class="mySlides">
                        <div class="numbertext">4 / 4</div>
                        <img src="{{ asset('img/big_picture.jpg') }}" style="width:100%">
                    </div>

                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
            </div><br>
            <h3>Item</h3>
            <div class="table-responsive">
                <div class="card">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="50">#</th>
                                <th>Nama Item</th>
                                <th width="100">Qty</th>
                                <th width="150">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="item_1">
                                <th scope="row">1</th>
                                <td class="nama">Nasi</td>
                                <td class="qty">300 gr</td>
                                <td>Rp. <span class="harga">5.000</span></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right"><b>Harga per pcs</b></td>
                                <td><b>Rp. 5.000</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-theme" data-toggle="modal" data-target="#basicExample" onclick="item='add'">
                    custom menu
                </button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="stylish-color white-text" style="padding: 16px">
                    <h4><b>Rp. <span id="harga">20000</span></b> <small>per pcs</small></h4>
                </div>
                <div class="card-block">
                    <form class="" action="index.html" method="post" id="form-pesan">
                        <div class="md-form">
                            <input type="number" id="qty" name="qty" class="form-control" value="5" onchange="calcTotalPrice()">
                            <label for="qty" class="">Jumlah</label>
                        </div>
                        <div class="form-group">
                            <label>Tanggal diantar</label>
                            <input type="date" id="tgl_diambil" name="tgl_diambil" class="form-control">
                        </div>
                        <div class="md-form">
                            <input type="text" id="alamat" name="alamat" class="form-control">
                            <label for="alamat" class="">Alamat</label>
                        </div>
                        <div class="md-form">
                            <input type="text" id="lokasi" name="lokasi" class="form-control">
                            <label for="lokasi" class="">Lokasi</label>
                        </div>
                        <div class="md-form">
                            <textarea type="text" id="pesan" name="pesan" class="md-textarea"></textarea>
                            <label for="pesan">Pesan tambahan untuk catering</label>
                        </div>
                    </form>
                    <div class="text-right">
                        <h4>Total: <b>Rp <span id="total_harga">20000</span></b></h4>
                    </div><br>
                    <div class="read-more text-center">
                        <button type="submit" form="form-pesan" class="btn btn-theme">Lihat catering</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="basicExample" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Nasi</h4>
                <a class="btn btn-warning btn-sm" onclick="selectItem(31, 'Nasi Goreng', 5000, 300, 'gr', 1)">Nasi Goreng</a>
                <a class="btn btn-warning btn-sm" onclick="selectItem(32, 'Nasi Putih', 3000, 300, 'gr', 1)">Nasi Putih</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    function calcTotalPrice() {
        var qty = $('#qty').val()
        var harga = $('#harga').html()
        $('#total_harga').html(qty*harga)
    }
    function openModal() {
        document.getElementById('myModal').style.display = "block";
    }

    function closeModal() {
        document.getElementById('myModal').style.display = "none";
    }

    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        var captionText = document.getElementById("caption");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
    }
</script>
@endsection
