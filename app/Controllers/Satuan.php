<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Satuan extends BaseController
{
    public function index()
    {
        $data = [
            'page' => 'Satuan',
        ];
        return view('v_template', $data);
    }
}