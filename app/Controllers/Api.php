<?php

namespace App\Controllers;

// use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\BeritaModel;

class Api extends ResourceController
{
    use ResponseTrait;
    public function index()
    {
        $model = new BeritaModel();
        $data = $model->orderBy('id', 'DESC')->findAll();
        return $this->respond(['message' => 'success', 'data' => $data]);
    }
    public function show($id = null)
    {
        $model = new BeritaModel();
        $data = $model->where('id', $id)->first();      
        if ($data) {    
            return $this->respond($data);
        } else {
            return $this->failNotFound('Berita tidak di temukan');
        }
    }
    public function create()
    {
        $model = new BeritaModel();
        $data = [
            'judul' => $this->request->getVar('judul'),
            'isi' => $this->request->getVar('isi'),
            'gambar' => $this->request->getVar('gambar'),
        ];
        $model->insert($data);
        $response = [
            'status' => 201,
            'error' => null,
            'message' => [
                'success' => 'berita berhasil ditambahkan'  
            ]
        ];  
        return $this->respondCreated($response);
    }
    public function update($id = null)
    {
        $model = new BeritaModel();
        $data = [
            'judul' => $this->request->getVar('judul'),
            'isi' => $this->request->getVar('isi'),
            'gambar' => $this->request->getVar('gambar'),
        ];
        if ($model->update($id, $data)) {
            return $this->respond(['status' => 'success', 'message' => 'Data updated successfully']);
        } else {
            return $this->fail('Failed to update data');
        }
    }
    public function delete($id = null)
    {
        $model = new BeritaModel();
        $data = $model->where('id', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status' => 200,
                'error' => null,
                'message' => [
                    'success' => 'berita berhasil dihapus'
                ]
            ];
            return $this->respond($response);
        } else {
            return $this->failNotFound('Berita tidak di temukan');
        }
    }
}
