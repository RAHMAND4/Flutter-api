<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BeritaModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Berita extends BaseController
{
    public function index()
    {
        $Berita = new BeritaModel();
        $getdata= $Berita->findAll();
        $data['list'] = $getdata;
        
        return view('home', $data);
    }

    public function preview($id)
    {
        $Berita = new BeritaModel();
        // mengambil data dahulu
        $data['news'] = $Berita->where(['id' => $id])->first();
        
        //cek apakah kosong?
        if(!$data['news'])
        {
            throw PageNotFoundException::forPageNotFound('Judul berita tidak ditemukan');
        }

        return view('detail_berita', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid)
        {
            $berita = new BeritaModel();
            $data = [
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'gambar' => $this->request->getPost('gambar')
            ];
            log_message('debug', 'Data yang akan disimpan: ' . json_encode($data));
            $berita->insert($data);
            return redirect('/');
        }
        return view('create_berita', ['validation' => $this->validator]);
    }

    public function edit($id)
    {
        $berita = new BeritaModel();
        $data['news'] = $berita->where('id', $id)->first();
        log_message('debug', 'Data yang ditemukan: ' . json_encode($data['news']));
        if(!$data['news'])
        {
            throw PageNotFoundException::forPageNotFound('Berita tidak ditemukan');
        }
        return view('edit_berita', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if($isDataValid)
        {
            $berita = new BeritaModel();
            $data = [
                'judul' => $this->request->getPost('judul'),
                'isi' => $this->request->getPost('isi'),
                'gambar' => $this->request->getPost('gambar')
            ];
            log_message('debug', 'Data yang akan diperbarui: ' . json_encode($data));
            $berita->update($id, $data);
            return redirect('/');
        }
        return redirect()->back()->withInput()->with('validation', $this->validator);
    }
    public function delete($id)
    {
        $berita = new BeritaModel();
        $berita->delete($id);
        return redirect('/');
    }
}
