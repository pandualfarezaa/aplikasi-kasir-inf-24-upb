<?php

namespace App\Controllers;

class Satuan extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Data',
            'subjudul' => 'Satuan',
            'menu' => 'data',
            'submenu' => 'satuan',
            'page' => 'v_satuan',
        ];
        return view('v_template', $data);
    }
}