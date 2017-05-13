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
    <h2 class="h2-responsive wow fadeIn">{{ $MenuTitle->nama_menu }}</h2><br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tb-item">
                        <thead>
                            <tr>
                                <th width="50">#</th>
                                <th>Nama Item</th>
                                <th width="70">Wajib</th>
                                <th width="80">Qty</th>
                                <th width="170">Harga/sat</th>
                                <th width="130">Jumlah Harga</th>
                                <th width="110">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ADD NEW ITEM -->
                            <tr id="item_add">
                                <th scope="row"></th>
                                <td>
                                    <span class="nama"></span>
                                    <input type="hidden" id="in-id-menu">
                                    <button type="button" class="btn btn-theme btn-sm" data-toggle="modal" data-target="#basicExample" onclick="item='add'">
                                        pilih item
                                    </button>
                                </td>
                                <td>
                                    <fieldset class="form-group">
                                        <input type="checkbox" class="filled-in" id="in-require">
                                    </fieldset>
                                </td>
                                <td><input type="text" id="in-qty" value="0" onchange="calcPrize('add')"></td>
                                <td>Rp. <span class="harga"></span>/<span class="qty_satuan"></span><span class="satuan"></span></td>
                                <td>Rp. <span class="jumlah_harga"></span></td>
                                <td>
                                    <a class="btn btn-theme" onclick="addItem()"><i class="icon ion-plus"></i></a>
                                </td>
                            </tr>
                            <!-- END ADD NEW ITEM -->
                            <!-- ALL ITEM -->
                        <?php $i=1; ?>
                        <?php $j=1; ?>
                        @foreach($detailItem as $a)
                            <tr id="item_{{$a->id_item}}">
                                <th scope="row">{{ $i, $i++ }}</th>
                                <td>
                                    <span class="nama">{{$a->nama_item}}</span>
                                    <a class="select-item" data-toggle="modal" data-target="#basicExample" style="display:none" onclick="item={{$a->id_item}}"><i class="icon ion-edit"></i></a>
                                </td>
                                <td class="wajib">
                                    <fieldset class="form-group">
                                        <input type="checkbox" id="in-require" disabled checked>
                                    </fieldset>
                                </td>
                                <td><span class="qty">{{$a->qty_default}}</span> gr</td>
                                <td>Rp. <span class="harga">{{$a->harga}}</span>/<span class="qty_satuan">{{$a->qty}}</span><span class="satuan">gr</span></td>
                                <td>Rp. <span class="jumlah_harga">{{$a->harga*$a->qty_default}}</span></td>
                                <td>
                                    <a class="blue-text change-value" onclick="changeValue({{$a->id_item}})"><i class="icon ion-edit"></i></a>
                                    <a class="red-text delete" onclick="deleteItem({{$a->id_item}})"><i class="icon ion-close"></i></a>
                                    <a class="blue-text edit" onclick="editItem({{$a->id_item}})" style="display:none"><i class="icon ion-android-send"></i></a>
                                </td>
                            </tr>
                        <?php
                            $hitung[$j] = $a->harga*$a->qty_default;
                            $j++;
                        ?>
                        @endforeach
                            <!-- END ALL ITEM -->
                        <?php
                            $total = 0;
                            for ($n=1; $n < $j ; $n++) {
                                $total = $total+$hitung[$n];
                            }
                         ?>
                            <tr>
                                <td colspan="5">Harga Menu</td>
                                <td><span class="harga_menu">Rp. {{$total}} </span></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
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
                <h4 class="modal-title w-100" id="myModalLabel">Pilih item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>{{ $MenuTitle->nama_menu }}</h4>
            @foreach($item as $a)
                <a class="btn btn-warning btn-sm" onclick="selectItem({{$a->id}}, '{{$a->nama_item}}', {{$a->harga}}, {{$a->qty}}, ' {{$a->satuan}}', {{$a->kategori}})">{{$a->nama_item}}</a>
            @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
    item = ''
    function calcPrize(id) {
        var qty = $('#item_' + id + ' #in-qty').val()
        var qty_satuan = $('#item_' + id + ' .qty_satuan').html()
        var harga = $('#item_' + id + ' .harga').html()
        var jumlah_harga = harga*(qty/qty_satuan)

        $('#item_' + id + ' .jumlah_harga').html(Math.round(jumlah_harga))
    }

    function addItem() {
        var id_item = $('#item_add #in-id-menu').val()
        var qty = $('#item_add #in-qty').val()
    }

    function selectItem(id, nama, harga, qty, satuan, kategori) {
        $('#basicExample').modal('hide')

        $('#item_' + item + ' .nama').html(nama)
        $('#item_' + item + ' .harga').html(harga)
        $('#item_' + item + ' .qty_satuan').html(qty)
        $('#item_' + item + ' .satuan').html(satuan)
        $('#item_' + item + ' .jumlah_harga').html('')
        $('#item_' + item + ' #in-qty').val(0)
        $('#item_' + item + ' #in-id-menu').val(id)
    }

    function changeValue(id) {
        $('#item_' + id + ' .select-item').show()
        $('#item_' + id + ' #in-require').removeAttr("disabled")

        var qty = $('#item_' + id + ' .qty')
        var qty_val = qty.html()
        qty.html('<input type="text" value="' + qty_val + '" id="in-qty" onchange="calcPrize('+id+')">')

        $('#item_' + id + ' .change-value').hide()
        $('#item_' + id + ' .delete').hide()
        $('#item_' + id + ' .edit').show()
    }

    function editItem(id) {
        $('#item_' + id + ' .select-item').hide()
        $('#item_' + id + ' #in-require').attr("disabled", true)

        var qty = $('#item_' + id + ' .qty')
        var qty_val = $('#item_' + id + ' #in-qty').val()
        qty.html(qty_val)

        $('#item_' + id + ' .change-value').show()
        $('#item_' + id + ' .delete').show()
        $('#item_' + id + ' .edit').hide()

        var harga_menu = 0
        var tr = $('#tb-item').find('tr')
        tr.each(function () {
            if(tr.next()[0]!=undefined) {
                tr=tr.next();
                if (tr.find('.jumlah_harga').html()!=undefined) {
                    harga_menu += Number(tr.find('.jumlah_harga').html())
                }
            }
        });
        $('.harga_menu').html(harga_menu)
    }
</script>
@endsection
