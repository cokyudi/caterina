<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarMenu extends Model
{
    protected $table = 'gambar_menu';
    protected $fillable = [
        'id',
        'id_menu',
        'gambar_menu',
        'status_gambar',
    ];
    public $timestamps=false;
}
