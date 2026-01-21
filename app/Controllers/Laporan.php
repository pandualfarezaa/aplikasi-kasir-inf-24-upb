<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelSatuan;


class Laporan extends BaseController
{
    protected $ModelProduk;
    protected $ModelAdmin;
    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
        $this->ModelSatuan = new ModelSatuan();
        
    }

    public function PrintDataProduk()
    {
        $data = [
            'judul' => 'Laporan Data Produk',
            'produk' => $this->ModelProduk->AllData(),
            'page'   => 'Laporan/v_cetak_lap_produk',
            
        ];
        return view('Laporan/v_template_print_laporan', $data);
    }
}
