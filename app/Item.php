<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $fillable = [
        'id',
        'id_user',
        'nama_item',
        'harga',
        'qty',
        'satuan',
        'kategori',
    ];
    public $timestamps=false;
}
