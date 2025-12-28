<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduk;

class Produk extends BaseController
{
    protected $ModelProduk;

    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
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
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = ['nama_satuan' => $this->request->getPost('nama_satuan')];
        $this->ModelSatuan->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        return redirect()->to(base_url('public/satuan'));
    }

    public function UpdateData($id_satuan)
    {
        $data = [
            'id_satuan' => $id_satuan,
            'nama_satuan' => $this->request->getPost('nama_satuan')
        ];
        $this->ModelSatuan->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diedit!!');
        return redirect()->to(base_url('public/satuan'));
    }

    public function DeleteData($id_satuan)
    {
        $data = [
            'id_satuan' => $id_satuan
        ];
        $this->ModelSatuan->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to(base_url('public/satuan'));
    }
}