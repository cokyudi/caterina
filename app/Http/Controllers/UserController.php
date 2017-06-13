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

    public function profile()
    {
        $data['title'] = 'Profile';
        $id_user = Auth::user()->id;
        $data['id_user']= $id_user;
        $data['profile_user'] = User::find($id_user);
        return view('profile', $data);
    }

    public function update(Request $request)
    {
        $id_user = Auth::user()->id;
        $user = User::find($id_user);
        $user->nama_user = $request->get('nama');
        $user->email = $request->get('email');
        $user->no_telp = $request->get('telp');
        $user->save();

        return redirect('/profile');
    }

    public function profileCatering()
    {
        $id_user = Auth::user()->id;
        $data['profile_user'] = User::find($id_user);
        $data['title'] = "Profil ".$data['profile_user']->nama_catering;
        return view('catering.profile', $data);
    }

    public function updateCatering(Request $request)
    {
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

        if ($request->file('foto_catering')) {
            $path = $request->file('foto_catering')->store('public/catering');
            $user->foto_catering = str_replace('public/', '', $path);
        }
        $user->save();

        return redirect('/dashboard/profile');
    }
}
