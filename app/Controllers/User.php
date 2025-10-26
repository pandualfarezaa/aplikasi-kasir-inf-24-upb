<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Data',
            'subjudul' => 'User',
            'menu' => 'data',
            'submenu' => 'user',
            'page' => 'v_user',
        ];
        return view('v_template', $data);
    }
}