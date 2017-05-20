<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';
    protected $fillable = [
        'id',
        'nama_menu',
        'id_user',
        'harga',
        'status_menu'
    ];
    public $timestamps=false;

    public function items()
    {
        return $this->belongsToMany('App\Item','menu_item','id_menu','id_item')->withPivot('qty_default','id','id_item', 'required');
    }
}
