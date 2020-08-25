<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Beranda'
        );
        return view('pages.beranda')->with($data);
    }
}
