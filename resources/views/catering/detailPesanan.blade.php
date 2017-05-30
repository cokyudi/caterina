@foreach($detail as $a)
<p>
    <span id="namaItem">{{$a->nama_item}}</span>-
    <span id="qtyItem">{{$a->qty_item}}</span>
    <span id="satuanItem">{{$a->satuan_item}}</span>
</p>
@endforeach
