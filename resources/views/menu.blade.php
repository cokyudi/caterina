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
                                <th width="70">Qty</th>
                                <th width="50">Sat</th>
                                <th width="150">Harga</th>
                            </tr>
                        </thead>
                        <tbody class="item">
                            <tr id="item_1">
                                <th scope="row">1</th>
                                <td class="nama">Nasi</td>
                                <td class="qty">
                                    <input type="text" value="300" id="in-qty" data-harga="5000" data-qty-satuan="300" onkeyup="calcPriceItem(1)">
                                </td>
                                <td class="sat">gr</td>
                                <td>Rp. <span class="harga">5.000</span></td>
                            </tr>
                            <tr id="item_2">
                                <th scope="row">1</th>
                                <td class="nama">Nasi Kuning</td>
                                <td class="qty">
                                    <input type="text" value="300" id="in-qty" data-harga="7000" data-qty-satuan="300" onkeyup="calcPriceItem(2)">
                                </td>
                                <td class="sat">gr</td>
                                <td>Rp. <span class="harga">5.000</span></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right"><b>Harga per pcs</b></td>
                                <td><b>Rp. <span class="harga-menu">5.000</span></b></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <button type="button" class="btn btn-theme" data-toggle="modal" data-target="#customItem">
                    pilih item
                </button>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="stylish-color white-text" style="padding: 16px">
                    <h4><b>Rp. <span class="harga-menu">20000</span></b> <small>per pcs</small></h4>
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
<div class="modal fade" id="customItem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <div class="row">
                    <fieldset class="form-group col-md-4">
                        <input type="checkbox" class="filled-in" id="checkbox1"
                            value="Nasi" data-id="1" data-harga="5000" data-qty="300" data-satuan="gr" checked>
                        <label for="checkbox1">Nasi</label>
                    </fieldset>
                    <fieldset class="form-group col-md-4">
                        <input type="checkbox" class="filled-in" id="checkbox2"
                            value="Nasi Kuning" data-id="2" data-harga="7000" data-qty="300" data-satuan="gr">
                        <label for="checkbox2">Nasi Kuning</label>
                    </fieldset>
                    <fieldset class="form-group col-md-4">
                        <input type="checkbox" class="filled-in" id="checkbox3"
                            value="Nasi Uduk" data-id="3" data-harga="8000" data-qty="300" data-satuan="gr">
                        <label for="checkbox3">nasi Uduk</label>
                    </fieldset>
                </div>
                <div class="text-right">
                    <a class="btn btn-theme" onclick="addItem()">pilih item</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">

    function calcPriceItem(id) {
        var qty = $('#item_' + id + ' #in-qty').val()
        var qty_satuan = $('#item_' + id + ' input').data('qty-satuan')
        var harga = $('#item_' + id + ' input').data('harga')
        var jumlah_harga = harga*(qty/qty_satuan)

        $('#item_' + id + ' .harga').html(Math.round(jumlah_harga))
        calcPriceMenu()
    }
    function calcPriceMenu() {
        var hargaMenu = 0
        var tr = $('table > .item > tr')
        tr.each(function (x) {
            if(x!=undefined) {
                hargaMenu += Math.round(tr.eq(x).find('.harga').html())
            }
        });
        $('.harga-menu').html(hargaMenu)
        calcTotalPrice()
    }
    function calcTotalPrice() {
        var qty = $('#qty').val()
        var harga = $('.harga-menu').html()
        $('#total_harga').html(qty*harga)
    }

    function customItem() {
        var tr = $('table > .item > tr')
        tr.each(function (x) {
            if(x!=undefined) {
                var qty = tr.eq(x).find('.qty')
                var qty_val = qty.html()
                qty.html('<input type="text" value="' + qty_val + '" id="in-qty">')
            }
        });
    }

    function addItem() {
        $('#customItem').modal('hide')

        $('.item').html('')
        $('.filled-in:checkbox:checked').each(function () {
            if (this.checked) {
                var idItem = $(this).data('id')
                var namaItem = $(this).val()
                var qty = $(this).data('qty')
                var harga = $(this).data('harga')
                var satuan = $(this).data('satuan')

                var dataItem = '<tr id="item_' + idItem + '">' +
                            '<th scope="row">1</th>' +
                            '<td class="nama">' + namaItem + '</td>' +
                            '<td class="qty">' +
                                '<input type="text" value="' + qty + '" id="in-qty" data-harga="' + harga + '" data-qty-satuan="' + qty + '" onkeyup="calcPriceItem(' + idItem + ')">' +
                            '<td class="sat">gr</td>' +
                            '<td>Rp. <span class="harga">' + harga + '</span></td>' +
                        '</tr>'
                $('.item').append(dataItem)
            }
        })

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
