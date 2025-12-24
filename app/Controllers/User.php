<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
    protected $ModelUser;

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }
    public function index()
    {
        $data = [
            'judul' => 'Data',
            'subjudul' => 'User',
            'menu' => 'data',
            'submenu' => 'user',
            'page' => 'v_user',
            'user' => $this->ModelUser->AllData(),
        ];
        return view('v_template', $data);
    }
}