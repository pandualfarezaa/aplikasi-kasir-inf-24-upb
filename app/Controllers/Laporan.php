<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelSatuan;
use App\Models\ModelAdmin;


class Laporan extends BaseController
{
    protected $ModelProduk;
    protected $ModelAdmin;
    protected $ModelKategori;
    protected $ModelSatuan;
    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
        $this->ModelSatuan = new ModelSatuan();
        $this->ModelAdmin = new ModelAdmin();

        
    }

    public function PrintDataProduk()
    {
        $data = [
            'judul' => 'Laporan Data Produk',
            'produk' => $this->ModelProduk->AllData(),
            'web' => $this->ModelAdmin->DetailData(),
            'page'   => 'Laporan/v_cetak_lap_produk',
            
        ];
        return view('Laporan/v_template_print_laporan', $data);
    }

    Public function LaporanHarian()
    {
         $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Harian',
            'menu' => 'laporan',
            'submenu' => 'laporan-harian',
            'page' => 'Laporan/v_laporan_harian',
            
        ];
        return view('v_template', $data);
    }

        public function viewLaporanHarian()
        {
            $response = [
                'data' => view('Laporan/v_tabel_laporan_harian')
            ];

            return $this->response->setJSON($response);

        }

}
