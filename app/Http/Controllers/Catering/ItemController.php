<?php

namespace App\Http\Controllers\Catering;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    public function index()
    {
        $data['title'] = 'Item Catering';
        return view('catering.item', $data);
    }
}
