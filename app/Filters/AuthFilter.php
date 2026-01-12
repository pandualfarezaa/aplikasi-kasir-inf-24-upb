<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek apakah session login ada
        $session = session();
        if (!$session->get('logged_in')) {
            // Jika belum login, redirect ke halaman login
            return redirect()->to('public/home')->with('pesan', 'Anda harus login terlebih dahulu!!');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu lakukan apa-apa setelah request
    }
}