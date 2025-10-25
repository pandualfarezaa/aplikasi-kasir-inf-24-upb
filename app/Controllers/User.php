<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'page' => 'v_user',
        ];
        return view('v_template', $data);
    }
}