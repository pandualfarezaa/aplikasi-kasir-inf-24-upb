<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function dashboard()
    {
        $data = [
        'judul' => 'Dashboard',
        'subjudul' => '',
        'menu' => 'dashboard',
        'submenu' => '',
        'page' => 'v_admin',
        ]
        return view('v_template', $data);
    }
}
