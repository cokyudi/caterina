<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = [
        'id',
        'nama_menu',
        'id_user'
    ];
    public $timestamps=false;
}
