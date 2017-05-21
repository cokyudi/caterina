@extends('layouts.user')

@section('style')
    <style media="screen">
        .card .view {
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
                @foreach($menu as $key => $a)
                    <div class="col-lg-4 col-sm-6 wow fadeIn" data-wow-delay="0.2s">
                        <div class="card" id="item_{{ $a->id }}">
                    <?php if(isset($a->gambarMenu->gambar_menu)){ ?>
                            <div class="view overlay hm-white-slight" style="background-image: url('{{asset('storage/gambar_menu/'.$a->gambarMenu->gambar_menu)}}');">
                                <a href="#" data-toggle="modal" data-target="#modalUpdate" class="openModalUpdate" data-id="{{$a->gambarMenu->id}}">
                                    <div class="mask waves-effect waves-light"></div>
                                </a>
                    <?php }else{ ?>
                            <div class="view overlay hm-white-slight" style="background-image: url('{{asset('storage/gambar_menu/carbonara.jpg')}}');">
                                <a href="#" data-toggle="modal" data-target="#basicExample" class="openModalTambah" data-id="{{$a->id}}">
                                    <div class="mask waves-effect waves-light"></div>
                                </a>
                    <?php   } ?>
                            </div>
                            <div class="card-block">
                                <div class="switch text-right">
                                    <label>
                                        Tampilkan menu
                                        <?php $checked = ($a->status_menu) ? 'checked' : '' ?>
                                        <input type="checkbox" id="in-status-menu" onchange="updateMenu({{$a->id}}, 'status_menu', this)" <?= $checked ?>>
                                        <span class="lever"></span>
                                    </label>
                                </div><br>
                                <h4 class="card-title">
                                    <b><span class="nama_menu">{{ $a->nama_menu }}</span></b>
                                    <a href="#!" class="change-value" onclick="changeValue({{$a->id}})"><i class="icon ion-edit"></i></a>
                                    <a href="#!" class="edit" onclick="updateMenu({{$a->id}}, 'nama_menu', this)" style="display:none"><i class="icon ion-android-send"></i></a>
                                </h4>
                                <h4 class="card-text text-right orange-text"><b>Rp. {{ $harga[$key] }}</b></h4>
                                <div class="read-more text-center" style="display:inherit;">
                                    <a href="{{ URL::to('dashboard/menu',$a->id) }}" class="btn btn-theme"><i class="icon ion-eye"></i></a>
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

<div class="modal fade" id="basicExample" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">Tambah Gambar Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalBodyTambah" class="modal-body">
                <form id="form-gambar" action="{{ url('/dashboard/menu/tambahGambar') }}" method="post" enctype="multipart/form-data">
                    <div class="file-field">
                        <div class="btn btn-primary btn-sm">
                            <span>Choose file</span>
                            <input type="file" name="gambar_menu" required>
                        </div></br>
                        <div class="file-path-wrapper">
                           <input class="file-path validate" type="text" placeholder="Upload Gambar Menu">
                        </div>
                    </div>
                    <input type="hidden" id="id" name="id_menu">
                    {{ csrf_field() }}
            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">Update Gambar Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalBodyUpdate" class="modal-body">
                <form id="form-gambar" action="{{ url('/dashboard/menu/updateGambar') }}" method="post" enctype="multipart/form-data">
                    <div class="file-field">
                        <div class="btn btn-primary btn-sm">
                            <span>Choose file</span>
                            <input type="file" name="gambar_menu" required>
                        </div></br>
                        <div class="file-path-wrapper">
                           <input class="file-path validate" type="text" placeholder="Upload Gambar Menu">
                        </div>
                    </div>
                    <input type="hidden" id="idGambar" name="id">
                    {{ csrf_field() }}
            </div>
            <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


    $(document).on("click", ".openModalTambah", function () {
         var id = $(this).data('id');
         $("#modalBodyTambah #id").val( id );
    });

    $(document).on("click", ".openModalUpdate", function () {
         var id = $(this).data('id');
         $("#modalBodyUpdate #idGambar").val( id );
    });


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
        //$('#item_' + id + ' .nama_menu').html('<input type="text" class="in-nama-menu" value="' + val + '">')
        $('#item_' + id + ' .gambar_menu').show()
        $('#item_' + id + ' .nama_menu').html('<input type="text" id="in-nama-menu" value="' + val + '" style="width:80%">')
        $('#item_' + id + ' .change-value').hide()
        $('#item_' + id + ' .delete').hide()
        $('#item_' + id + ' .edit').show()
    }

    function updateMenu(id, attr, element) {
        var _token="{{ csrf_token() }}"
        var data={
            _token:_token
        }

        if (attr == 'nama_menu') {
            var val = $('#item_' + id + ' #in-nama-menu').val()
            data.nama_menu = val
        } else if (attr == 'status_menu') {
            var val = (element.checked) ? 1 : 0
            data.status_menu = val
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

                if (attr == 'nama_menu') {
                    $('#item_' + id + ' .nama_menu').html(val)
                    $('#item_' + id + ' .change-value').show()
                    $('#item_' + id + ' .delete').show()
                    $('#item_' + id + ' .edit').hide()
                }
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

    function uploadGambar(id){
        $('#item_' + id + ' .sendFoto').show()
        $('#item_' + id + ' .tambahFoto').show()
        $('#item_' + id + ' .closeFoto').show()
        $('#item_' + id + ' .file-path').show()

        $('#item_' + id + ' #in-gambar-menu').click();
    }

    function closeGambar(id){
        $('#item_' + id + ' .sendFoto').hide()
        $('#item_' + id + ' .closeFoto').hide()
        $('#item_' + id + ' .tambahFoto').hide()
    }

    function tambahGambar(id){
        $("#form-gambar").submit();
    }

</script>
@endsection
