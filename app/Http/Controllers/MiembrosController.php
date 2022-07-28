<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiembrosController extends Controller
{
    public function partituras() {
        return view('partituras');
    }

    public function audios() {
        return view('audios');
    }

    public function fotos() {
        return view('fotos');
    }

    public function videos() {
        return view('videos');
    }
}
