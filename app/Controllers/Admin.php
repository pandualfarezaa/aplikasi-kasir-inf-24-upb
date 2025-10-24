<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function dashboard()
    {
        'judul' => 'Dashboard',
        return view('v_template');
    }
}
