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
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ URL::to('dashboard/profil') }}">Profil</a></li>
                <li class="list-group-item"><a href="{{ URL::to('dashboard/pesanan') }}">Pesanan</a></li>
                <li class="list-group-item"><a href="{{ URL::to('dashboard/menu') }}">Menu</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row wow">
                <div class="col-md-8 wow fadeIn" data-wow-delay="0.2s">
                    <form class="form-addMenu" id="form-addMenu" action="" method="post" style="display:inherit">
                        <input type="hidden" id="in-userId" value="{{ $userId }}">
                        <input type="text" class="input-custom" id="in-nama-menu" name="nama_menu" value="" style="width:400px" placeholder="Tambah menu makanan...">
                        <button type="button" onclick="addMenu()" class="btn btn-warning" style="margin-top:1px"><i class="icon ion-plus"></i></button>
                    </form>
                    <div class="section"></div>
                </div>
                <div class="col-md-4 text-right wow fadeIn" data-wow-delay="0.2s">
                    <a href="{{ URL::to('dashboard/item') }}" class="btn btn-theme">tambah item</a>
                </div>
                @foreach($menu as $a)
                    <div class="col-lg-4 col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                        <div class="card" id="item_{{ $a->id }}">
                            <div class="view overlay hm-white-slight">
                                <a href="{{ URL::to('dashboard/menu',$a->id) }}">
                                    <div class="mask waves-effect waves-light"></div>
                                </a>
                            </div>
                            <div class="card-block">
                                <h4 class="card-title"><b><span class="nama_menu">{{ $a->nama_menu }}</span></b></h4>
                                <input type="file" class="gambar_menu" name="gambar_menu" style="display:none"/>
                                <h4 class="card-text"><b>Rp. {{ $a->harga }}</b></h4>
                                <div class="read-more text-center" style="display:inherit;">
                                    <a href="#!" class="btn btn-theme  change-value" onclick="changeValue({{$a->id}})"><i class="icon ion-edit"></i></a>
                                    <a href="#!" class="btn btn-theme edit" onclick="updateMenu({{$a->id}})" style="display:none"><i class="icon ion-android-send"></i></a>
                                    <a href="#!" class="btn btn-danger delete" onclick="deleteMenu({{$a->id}})"><i class="icon ion-android-delete"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function addMenu() {
        var nama_menu = $('#form-addMenu #in-nama-menu').val()
        var id_user = $('#form-addMenu #in-userId').val()
        var _token= "{{ csrf_token() }}"
        var data = {
            nama_menu:nama_menu,
            _token:_token,
            id_user:id_user
        }

        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')}
        });

        $.ajax({
            method:'POST',
            url:'{{ route("addMenu") }}',
            data:data,
            success: function(data){
                window.location.reload(true);
            },
            error: function(data){
                alert("error");
            }
        })
    }

    function changeValue(id) {
        var val = $('#item_' + id + ' .nama_menu').html()
        $('#item_' + id + ' .nama_menu').html('<input type="text" class="in-nama-menu" value="' + val + '">')
        $('#item_' + id + ' .gambar_menu').show()
        $('#item_' + id + ' .change-value').hide()
        $('#item_' + id + ' .delete').hide()
        $('#item_' + id + ' .edit').show()
    }

    function updateMenu(id) {
        var val = $('#item_' + id + ' .in-nama-menu').val()
        var _token="{{ csrf_token() }}"
        var data={
            nama_menu:val,
            _token:_token
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
            }
        });

        $.ajax({
            method:'POST',
            url:'/dashboard/menu/' + id + '/updateMenu',
            data:data,
            success: function(result){

                $('#item_' + id + ' .nama_menu').html(val)
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

    function deleteMenu(id){
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
            url:'/dashboard/menu/' + id + '/deleteMenu',
            data:data,
            success: function(data){
                $('#item_'+id).remove()
            },
            error: function(data){
                alert("error");
            }
        })
    }

</script>
@endsection
