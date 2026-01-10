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

    public function InsertData()
    {
        $fileFoto = $this->request->getFile('foto');

        // default
        $namaFoto = 'default.jpeg';

        if ($fileFoto !== null && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $ext = $fileFoto->getExtension();

            // validasi tipe file
            if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                $namaFoto = $fileFoto->getRandomName();
                $fileFoto->move('uploads/user', $namaFoto);
            }
        }

        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' => sha1($this->request->getPost('password')),
            'level' => $this->request->getPost('level'),
            'foto' => $namaFoto
        ];
        $this->ModelUser->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        return redirect()->to(base_url('public/admin/user'));
    }

    public function UpdateData($id_user)
    {
        $data = [
            'id_user' => $id_user,
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'level' => $this->request->getPost('level'),
        ];
        $this->ModelUser->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diedit!!');
        return redirect()->to(base_url('public/admin/user'));
    }

    public function DeleteData($id_user)
    {
        $data = [
            'id_user' => $id_user
        ];
        $this->ModelUser->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to(base_url('public/admin/user'));
    }
}