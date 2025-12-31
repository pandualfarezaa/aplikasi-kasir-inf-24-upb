<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelSatuan;

class Produk extends BaseController
{
        protected $ModelProduk;
        protected $ModelKategori;
        protected $ModelSatuan;

    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
        $this->ModelKategori = new ModelKategori();
        $this->ModelSatuan = new ModelSatuan();
    }
    public function index()
    {
        $data = [
            'judul' => 'Data',
            'subjudul' => 'Produk',
            'menu' => 'data',
            'submenu' => 'produk',
            'page' => 'v_produk',
            'produk' => $this->ModelProduk->AllData(),
            'kategori' => $this->ModelKategori->AllData(),
            'satuan' => $this->ModelSatuan->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = ['nama_produk' => $this->request->getPost('nama_produk')];
        $this->ModelProduk->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        return redirect()->to(base_url('public/produk'));
    }

    public function UpdateData($id_produk)
    {
        $data = [
            'id_produk' => $id_produk,
            'nama_produk' => $this->request->getPost('nama_produk')
        ];
        $this->ModelProduk->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diedit!!');
        return redirect()->to(base_url('public/produk'));
    }

    public function DeleteData($id_produk)
    {
        $data = [
            'id_produk' => $id_produk
        ];
        $this->ModelProduk->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to(base_url('public/produk'));
    }
}