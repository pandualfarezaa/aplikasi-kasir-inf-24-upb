<?php

namespace App\Controllers;

class Produk extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Data',
            'subjudul' => 'Produk',
            'menu' => 'data',
            'submenu' => 'produk',
            'page' => 'v_produk',
        ];
        return view('v_template', $data); 
    }
}
