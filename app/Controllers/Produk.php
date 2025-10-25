<?php

namespace App\Controllers;

class Produk extends BaseController
{
    public function index()
    {
        $data = [
            'page' => 'v_produk',
        ];
        return view('v_template', $data); 
    }
}
