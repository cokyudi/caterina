<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
Use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function activateCatering(Request $request)
    {
        if ($request->_token) {
            $id_user = Auth::user()->id;
            $location = explode(', ', $request->lokasi);

            $user = User::find($id_user);
            $user->status_catering = 1;
            $user->nama_catering = $request->nama_catering;
            $user->deskripsi = $request->deskripsi;
            $user->no_telp_catering = $request->no_telp_catering;
            $user->alamat_catering = $request->alamat_catering;
            $user->lat_catering = $location[0];
            $user->long_catering = $location[1];

            $path = $request->file('foto_catering')->store('public/catering');
            $user->foto_catering = str_replace('public/', '', $path);
            $user->save();

            return redirect('/dashboard/menu');

        }
        $data['title'] = 'Daftarkan Catering Saya';
        return view('catering.daftarCatering', $data);
    }
}
