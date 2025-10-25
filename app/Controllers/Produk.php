<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Produk extends BaseController
{
    public function Produk()
    {
        $data = [
            'page' => 'v_produk',
        ];
        return view('v_template', $data); 
    }
}
