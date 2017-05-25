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
                            @foreach($menu_item as $key => $a)
                                <tr id="item_{{ $a->id_item }}">
                                    <input type="hidden" name="id_item[{{ $key }}]" value="{{ $a->id_item }}" form="form-pesan">
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td class="nama">{{ $a->nama_item }}</td>
                                    <td class="qty">
                                        <input type="text" value="{{ $a->qty_default }}" id="in-qty" name="qty_item[{{$key}}]" form="form-pesan"
                                            data-harga="{{ $a->harga }}"
                                            data-qty-satuan="{{ $a->qty }}"
                                            onkeyup="calcPriceItem({{ $a->id_item }})">
                                    </td>
                                    <td class="sat">{{ $a->satuan }}</td>
                                    <td>Rp. <span class="harga">{{ $a->harga/$a->qty*$a->qty_default }}</span></td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right"><b>Harga per pcs</b></td>
                                <td><b>Rp. <span class="harga-menu">{{ $a->harga_menu }}</span></b></td>
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
                    <h4><b>Rp. <span class="harga-menu">{{ $a->harga_menu }}</span></b> <small>per pcs</small></h4>
                </div>
                <div class="card-block">
                    <form action="{{ URL::to('checkout') }}" method="post" id="form-pesan">
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
                            <textarea type="text" id="pesan" name="pesan" class="md-textarea"></textarea>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id_menu" value="{{ $menu->id }}">
                            <label for="pesan">Pesan tambahan untuk catering</label>
                        </div>
                    </form>
                    <div class="text-right">
                        <h4>Total: <b>Rp <span id="total_harga">20000</span></b></h4>
                    </div><br>
                    <div class="read-more text-center">
                        @if(Auth::guest())
                            <a class="btn btn-theme" href="{{ route('login') }}">login sebelum memesan</a>
                        @else
                            <button type="submit" form="form-pesan" class="btn btn-theme">Pesan Sekarang</button>
                        @endif
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
                @foreach($kategori as $kat)
                    <h4>{{ $kat->nama_kategori }}</h4>
                    <div class="row">
                        @foreach($item as $a)
                            @if($kat->id == $a->kategori)
                                <?php
                                    $checked = '';
                                    $disabled = '';
                                    foreach ($menu_item as $key => $mi) {
                                        if ($mi->id_item == $a->id) {
                                            $checked = 'checked';
                                            $disabled = ($mi->required == 1) ? 'disabled':'';
                                            break;
                                        }
                                    }
                                ?>
                                @if($kat->id == 1)
                                    <?php
                                        $disabled = '';
                                        foreach ($menu_item as $key => $mi) {
                                            if ($mi->required == 1 and $mi->kategori == 1) {
                                                $disabled = 'disabled';
                                                break;
                                            }
                                        }
                                        $type = 'radio';
                                    ?>
                                @else
                                    <?php $type = 'checkbox' ?>
                                @endif
                                <fieldset class="form-group col-md-4">
                                    <input type="{{$type}}" name="item" class="filled-in with-gap check-item" id="{{ $type.$a->id }}" {{ $checked }} {{$disabled}}
                                        value="{{ $a->nama_item }}"
                                        data-id="{{ $a->id }}"
                                        data-harga="{{ $a->harga }}"
                                        data-qty="{{ $a->qty }}"
                                        data-satuan="{{ $a->satuan }}">
                                    <label for="{{ $type.$a->id }}">{{ $a->nama_item }}</label>
                                </fieldset>
                            @endif
                        @endforeach
                    </div>
                @endforeach
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

    calcPriceMenu()

    function calcPriceItem(id) {
        var qty = $('#item_' + id + ' #in-qty').val()
        var qty_satuan = $('#item_' + id + ' .qty input').data('qty-satuan')
        var harga = $('#item_' + id + ' .qty input').data('harga')
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

        var nomor = 1
        $('.item').html('')
        $('.check-item:checked').each(function () {
            if (this.checked) {
                var idItem = $(this).data('id')
                var namaItem = $(this).val()
                var qty = $(this).data('qty')
                var harga = $(this).data('harga')
                var satuan = $(this).data('satuan')
                var index = nomor-1

                var dataItem = '<tr id="item_' + idItem + '">' +
                            '<input type="hidden" name="id_item[' + index + ']" value="' + idItem + '" form="form-pesan">' +
                            '<th scope="row">' + nomor + '</th>' +
                            '<td class="nama">' + namaItem + '</td>' +
                            '<td class="qty">' +
                                '<input type="text" value="' + qty + '" id="in-qty" data-harga="' + harga + '" data-qty-satuan="' + qty + '" onkeyup="calcPriceItem(' + idItem + ')">' +
                            '<td class="sat">' + satuan + '</td>' +
                            '<td>Rp. <span class="harga">' + harga + '</span></td>' +
                        '</tr>'
                $('.item').append(dataItem)
                nomor++
            }
        })
        calcPriceMenu()

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
