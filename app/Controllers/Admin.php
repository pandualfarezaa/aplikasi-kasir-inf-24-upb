<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
            'page' => 'v_admin',
        ];
        return view('v_template', $data);
    }
}
