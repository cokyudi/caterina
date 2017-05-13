<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $table = 'menu_item';
    protected $fillable = [
        'id',
        'id_menu',
        'id_item',
        'required',
        'qty_default'
    ];
    public $timestamps=false;

}
