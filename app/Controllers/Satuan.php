<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSatuan;

class Satuan extends BaseController
{
    protected $ModelSatuan;

    public function __construct()
    {
        $this->ModelSatuan = new ModelSatuan();
    }
    public function index()
    {
        $data = [
            'judul' => 'Data',
            'subjudul' => 'Satuan',
            'menu' => 'data',
            'submenu' => 'satuan',
            'page' => 'v_satuan',
            'satuan' => $this->ModelSatuan->AllData(),
        ];
        return view('v_template', $data);
    }
}