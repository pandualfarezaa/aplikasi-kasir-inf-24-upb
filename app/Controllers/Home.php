<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class Home extends BaseController
{
    protected $ModelUser;
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }
    public function index()
    {
        $data = [
            'judul' => 'Login',
        ];
        return view('v_login', $data);
    }

    public function CekLogin()
    {
        if ($this->validate([
            'email' => [
                'label' => 'E-mail',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong !!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong !!',
                ]
            ],
        ])) {
            $email = $this->request->getPost('email');
            $password = sha1($this->request->getPost('password'));
            $cek_login = $this->ModelUser->LoginUser($email, $password);
            if ($cek_login) {
                session()->set('id_user', $cek_login['id_user']);
                session()->set('nama_user', $cek_login['nama_user']);
                session()->set('foto', $cek_login['foto']);
                session()->set('level', $cek_login['level']);
                if ($cek_login['level'] == 1) {
                    return redirect()->to(base_url('public/admin'));
                } else {
                    return redirect()->to(base_url('public/penjualan'));
                }
            }else {
                //gagal login
                session()->setFlashdata('gagal', 'E-mail Atau Password Salah !!');
                return redirect()->to(base_url('public/home'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('public/home'))->withInput()->with('validation', $this->validator);
        }
    }

    public function LogOut()
    {
        session()->remove('id_user');
        session()->remove('nama_user');
        session()->remove('foto');
        session()->remove('level');
        session()->setFlashdata('pesan', 'Anda Berhasil Logout !!');
        return redirect()->to(base_url('public/home'));
    }
}