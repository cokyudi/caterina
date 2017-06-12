@foreach($detail as $a)
<ol>
    <span id="namaItem">{{$a->nama_item}}</span> -
    <span id="qtyItem">{{$a->qty_item}}</span>
    <span id="satuanItem">{{$a->satuan_item}}</span>
</ol>
@endforeach
<span id="satuanItem">Pesan: {{$transaksi->pesan}}</span>
