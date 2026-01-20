<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPenjualan;

class Penjualan extends BaseController
{
    protected $ModelPenjualan;
    protected $db;

    public function __construct()
    {
        $this->ModelPenjualan = new ModelPenjualan();

    }

    public function index()
    {
        $data = [
            'judul' => "Penjualan",
            'no_faktur' => $this->ModelPenjualan->NoFaktur(),
            'cart' => session()->get('cart') ?? []
        ];
        return view('v_penjualan', $data);
    }


    public function CekProduk()
    {
        $kode_produk = $this->request->getPost('kode_produk');
        $produk = $this->ModelPenjualan->CekProduk($kode_produk);

        if ($produk == null) {
            $data = [
                'nama_produk' => '',
            ];
        } else {
            $data = [
                'nama_produk' => $produk['nama_produk'],
                'nama_kategori' => $produk['nama_kategori'],
                'nama_satuan' => $produk['nama_satuan'],
                'harga_jual' => $produk['harga_jual'],
            ];
        }
        return $this->response->setJSON($data);
    }

    public function AddCart()
    {
        $kode_produk = $this->request->getPost('kode_produk');
        $qty = $this->request->getPost('qty');

        $produk = $this->ModelPenjualan->CekProduk($kode_produk);

        if (!$produk) {
            return $this->response->setJSON(['error' => 'Produk tidak ditemukan']);
        }

        $cart = session()->get('cart') ?? [];

        // Jika produk sudah ada di cart → tambah qty
        if (isset($cart[$kode_produk])) {
            $cart[$kode_produk]['qty'] += $qty;
            $cart[$kode_produk]['total'] =
                $cart[$kode_produk]['qty'] * $cart[$kode_produk]['harga_jual'];
        } else {
            $cart[$kode_produk] = [
                'kode_produk' => $kode_produk,
                'nama_produk' => $produk['nama_produk'],
                'kategori' => $produk['nama_kategori'],
                'harga_jual' => $produk['harga_jual'],
                'qty' => $qty,
                'total' => $produk['harga_jual'] * $qty,
            ];
        }

        session()->set('cart', $cart);

        return $this->response->setJSON([
            'success' => true,
            'cart' => array_values($cart)
        ]);
    }

    public function DeleteCart()
    {
        $kode_produk = $this->request->getPost('kode_produk');

        $cart = session()->get('cart') ?? [];

        if (isset($cart[$kode_produk])) {
            unset($cart[$kode_produk]);
            session()->set('cart', $cart);
        }

        return $this->response->setJSON([
            'cart' => array_values($cart)
        ]);
    }

    public function Bayar()
    {
        if (!$this->request->isAJAX()) {
            return;
        }

        try {
            $cart = session()->get('cart');
            $dibayar = (int) $this->request->getPost('dibayar');

            if (!$cart || count($cart) == 0) {
                return $this->response->setJSON([
                    'success' => false,
                    'error' => 'Keranjang kosong'
                ]);
            }

            $grandTotal = array_sum(array_column($cart, 'total'));

            if ($dibayar < $grandTotal) {
                return $this->response->setJSON([
                    'success' => false,
                    'error' => 'Uang tidak cukup'
                ]);
            }

            $kembalian = $dibayar - $grandTotal;
            $noFaktur = $this->ModelPenjualan->NoFaktur();

            $db = \Config\Database::connect();
            $db->transStart();

            // HEADER JUAL
            $db->table('tbl_jual')->insert([
                'no_faktur' => $noFaktur,
                'tgl_jual' => date('Y-m-d'),
                'grand_total' => $grandTotal,
                'dibayar' => $dibayar,
                'kembalian' => $kembalian,
                'id_user' => session()->get('id_user')
            ]);

            // RINCI JUAL
            foreach ($cart as $item) {
                $db->table('tbl_rinci_jual')->insert([
                    'no_faktur' => $noFaktur,
                    'kode_produk' => $item['kode_produk'],
                    'harga_jual' => $item['harga_jual'],
                    'qty' => $item['qty'],
                    'total_harga' => $item['total']
                ]);

                $this->ModelPenjualan->updateStok(
                    $item['kode_produk'],
                    $item['qty']
                );
            }

            $db->transComplete();
            session()->remove('cart');

            return $this->response->setJSON([
                'success' => true,
                'no_faktur' => $noFaktur,
                'total' => $grandTotal,
                'dibayar' => $dibayar,
                'kembalian' => $kembalian,
                'cart' => $cart
            ]);

        } catch (\Throwable $e) {
            return $this->response->setJSON([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }


}