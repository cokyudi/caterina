<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'nama_user',
        'email',
        'password',
        'no_telp',
        'status_catering',
        'nama_catering',
        'deskripsi',
        'no_telp_catering',
        'alamat_catering',
        'long_catering',
        'lat_catering',
        'foto_catering'
    ];
}
