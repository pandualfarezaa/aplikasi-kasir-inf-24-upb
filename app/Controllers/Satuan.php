<?php

namespace App\Controllers;


class Satuan extends BaseController
{
    public function index()
    {
        $data = [
            'page' => 'v_satuan',
        ];
        return view('v_template', $data);
    }
}