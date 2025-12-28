<?php

namespace App\Controllers;

use App\Models\FeedbackModel;

class Feedback extends BaseController
{
    public function index()
    {
        return view('feedback/index');
    }

    public function simpan()
    {
        $model = new FeedbackModel();

        // Ambil checkbox keluhan
        $keluhan = $this->request->getPost('keluhan');
        $keluhanText = implode(', ', $keluhan);

        // Upload foto
        $foto = $this->request->getFile('foto');
        $namaFoto = null;

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/feedback', $namaFoto);
        }

        $model->save([
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'cabang' => $this->request->getPost('cabang'),
            'keluhan' => $keluhanText,
            'keterangan' => $this->request->getPost('keterangan'),
            'foto' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Feedback Berhasil Dikirim!!');
        return redirect()->to(base_url('public/admin'));
    }

    

}
