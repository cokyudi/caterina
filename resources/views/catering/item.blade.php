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
                                    <button type="button" class="btn btn-theme" onclick="addItem()"><i class="icon ion-plus"></i></button>
                                    <input type="hidden" id="in-userId" value="{{ $userId }}">
                                </td>
                            </tr>
                        <?php $i=1; ?>
                        @foreach($item as $a)
                            <tr id="item_{{$a->id}}">
                                <th scope="row">{{ $i, $i++ }}</th>
                                <td class="nama">{{ $a->nama_item }}</td>
                                <td class="qty">{{ $a->qty }}</td>
                                <td class="satuan">{{ $a->satuan }}</td>
                                <td>Rp. <span class="harga">{{ $a->harga }}</span></td>
                                <td class="kategori">{{ $a->kategori }}</td>
                                <td>
                                    <a class="blue-text change-value" onclick="changeValue({{$a->id}})"><i class="icon ion-edit"></i></a>
                                    <a class="red-text delete" onclick="deleteItem({{$a->id}})"><i class="icon ion-close"></i></a>
                                    <a class="blue-text edit" onclick="editItem({{$a->id}})" style="display:none"><i class="icon ion-android-send"></i></a>
                                    <input type="hidden" id="in-userId2" value="{{ $userId }}">
                                </td>
                            </tr>
                        @endforeach
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
        var nama_item = $('#item_' + id + ' .nama')
        var qty = $('#item_' + id + ' .qty')
        var satuan = $('#item_' + id + ' .satuan')
        var harga = $('#item_' + id + ' .harga')
        var kategori = $('#item_' + id + ' .kategori')

        var nama_val = $('#item_' + id + ' #in-nama').val()
        var qty_val = $('#item_' + id + ' #in-qty').val()
        var satuan_val = $('#item_' + id + ' #in-satuan').val()
        var harga_val = $('#item_' + id + ' #in-harga').val()
        var kategori_val = $('#item_' + id + ' #in-kategori').val()
        var id_user = $('#item_' + id + ' #in-userId2').val()
        var _token= "{{ csrf_token() }}";
        console.log(id);
        var data = {
            nama_item:nama_val,
            harga:harga_val,
            qty:qty_val,
            satuan:satuan_val,
            kategori:kategori_val,
            _token:_token,
            id_user:id_user,
        };
        console.log(data);
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
            }
        });

        $.ajax({
            method:'POST',
            url:'/dashboard/item/' + id + '/updateItem',
            data:data,
            success: function(result){
                nama_item.html(nama_val)
                qty.html(qty_val)
                satuan.html(satuan_val)
                harga.html(harga_val)
                kategori.html(kategori_val)
                $('#item_' + id + ' .change-value').show()
                $('#item_' + id + ' .delete').show()
                $('#item_' + id + ' .edit').hide()
                //window.location.reload(true);
            },
            error: function(result){
                console.log(result);
            }
        })
    }

    function addItem() {
        var nama_item = $('#add_item #in-nama').val()
        var qty = $('#add_item #in-qty').val()
        var satuan = $('#add_item #in-satuan').val()
        var harga = $('#add_item #in-harga').val()
        var kategori = $('#add_item #in-kategori').val()
        var id_user = $('#add_item #in-userId').val()
        var _token= "{{ csrf_token() }}"
        var data = {
            nama_item:nama_item,
            harga:harga,
            qty:qty,
            satuan:satuan,
            kategori:kategori,
            _token:_token,
            id_user:id_user
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
            }
        });

        $.ajax({
            method:'POST',
            url:'{{ route("addItem") }}',
            data:data,
            success: function(data){
                window.location.reload(true);
            },
            error: function(data){
                alert("error");
            }
        })
    }

    function deleteItem(id){
        var _token="{{ csrf_token() }}"
        var data = {
            _token:_token
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
            }
        });

        $.ajax({
            method:'POST',
            url:'/dashboard/item/' + id + '/deleteItem',
            data:data,
            success: function(data){
                window.location.reload(true);
            },
            error: function(data){
                alert("error");
            }
        })
    }
</script>
@endsection
