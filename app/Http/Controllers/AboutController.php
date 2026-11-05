<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $nama = 'Jauza Syalia G.';
        $hobi = ' Membaca Novel, Menonton Series/film';
        $akun = ' Instagram : @jauza.syalia';

        return view('admin.about',
            [
                'nama' => $nama,
                'hobi' => $hobi,
                'akun' => $akun,
            ]);
    }
}
