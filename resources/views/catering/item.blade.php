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
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="50">#</th>
                                <th>Nama Item</th>
                                <th width="70">Qty</th>
                                <th width="80">Satuan</th>
                                <th width="150">Harga</th>
                                <th width="100">Kategori</th>
                                <th width="120">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="add_item">
                                <th scope="row"></th>
                                <td><input type="text" id="in-nama"></td>
                                <td><input type="text" id="in-qty"></td>
                                <td><input type="text" id="in-satuan"></td>
                                <td><input type="text" id="in-harga"></td>
                                <td><input type="text" id="in-kategori"></td>
                                <td>
                                    <a class="btn btn-theme" onclick="addItem()"><i class="icon ion-plus"></i></a>
                                </td>
                            </tr>
                            <tr id="item_48">
                                <th scope="row">1</th>
                                <td class="nama">Nasi putih</td>
                                <td class="qty">100</td>
                                <td class="satuan">gr</td>
                                <td>Rp. <span class="harga">1000</span></td>
                                <td class="kategori">Nasi</td>
                                <td>
                                    <a class="blue-text change-value" onclick="changeValue(48)"><i class="icon ion-edit"></i></a>
                                    <a class="red-text delete" onclick="deleteItem(48)"><i class="icon ion-close"></i></a>
                                    <a class="blue-text edit" onclick="editItem(48)" style="display:none"><i class="icon ion-android-send"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    function changeValue(id) {
        var nama = $('#item_' + id + ' .nama')
        var qty = $('#item_' + id + ' .qty')
        var satuan = $('#item_' + id + ' .satuan')
        var harga = $('#item_' + id + ' .harga')
        var kategori = $('#item_' + id + ' .kategori')

        var nama_val = nama.html()
        var qty_val = qty.html()
        var satuan_val = satuan.html()
        var harga_val = harga.html()
        var kategori_val = kategori.html()

        nama.html('<input type="text" value="' + nama_val + '" id="in-nama">')
        qty.html('<input type="text" value="' + qty_val + '" id="in-qty">')
        satuan.html('<input type="text" value="' + satuan_val + '" id="in-satuan">')
        harga.html('<input type="text" value="' + harga_val + '" id="in-harga">')
        kategori.html('<input type="text" value="' + kategori_val + '" id="in-kategori">')
        $('#item_' + id + ' .change-value').hide()
        $('#item_' + id + ' .delete').hide()
        $('#item_' + id + ' .edit').show()
    }

    function editItem(id) {
        var nama = $('#item_' + id + ' .nama')
        var qty = $('#item_' + id + ' .qty')
        var satuan = $('#item_' + id + ' .satuan')
        var harga = $('#item_' + id + ' .harga')
        var kategori = $('#item_' + id + ' .kategori')

        var nama_val = $('#item_' + id + ' #in-nama').val()
        var qty_val = $('#item_' + id + ' #in-qty').val()
        var satuan_val = $('#item_' + id + ' #in-satuan').val()
        var harga_val = $('#item_' + id + ' #in-harga').val()
        var kategori_val = $('#item_' + id + ' #in-kategori').val()

        nama.html(nama_val)
        qty.html(qty_val)
        satuan.html(satuan_val)
        harga.html(harga_val)
        kategori.html(kategori_val)
        $('#item_' + id + ' .change-value').show()
        $('#item_' + id + ' .delete').show()
        $('#item_' + id + ' .edit').hide()
    }

    function addItem(id) {
        var nama = $('#add_item #in-nama').val()
        var qty = $('#add_item #in-qty').val()
        var satuan = $('#add_item #in-satuan').val()
        var harga = $('#add_item #in-harga').val()
        var kategori = $('#add_item #in-kategori').val()
    }
</script>
@endsection
