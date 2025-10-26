<?php

namespace App\Controllers;

class Kategori extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Data',
            'subjudul' => 'Kategori',
            'menu' => 'data',
            'submenu' => 'kategori',
            'page' => 'v_kategori',
        ];
        return view('v_template', $data);
    }
}