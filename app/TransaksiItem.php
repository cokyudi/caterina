<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiItem extends Model
{
    protected $table = 'transaksi_item';
    protected $fillable = [
        'id',
        'id_item',
        'id_transaksi',
        'qty_item',
        'satuan_item',
        'total_harga_item',
    ];
    public $timestamps=false;
}
