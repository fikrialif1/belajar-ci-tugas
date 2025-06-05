<?php

namespace App\Controllers;


use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    protected $kategori;

    public function __construct()
    {
        $this->kategori = new KategoriModel();
    }
    public function index()
    {
        $kategori = $this->kategori->findAll();
        $data['kategori'] = $kategori;

        return view('v_kategori', $data);
    }
 
     public function create()
    {

    //function create data
    $dataForm = [
        'nama' => $this->request->getPost('nama'),
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s")
    ];

    $this->kategori->insert($dataForm);

    return redirect('kategori')->with('success', 'Data Berhasil Ditambah');
    } 

    // function edit data
    public function edit($id)
    {
        $dataForm = [
            'nama' => $this->request->getPost('nama'),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        $this->kategori->update($id, $dataForm);

        return redirect('kategori')->with('success', 'Data Berhasil Diubah');
    }

    // function delete data
    public function delete($id)
    {
        $this->kategori->delete($id);

        return redirect('kategori')->with('success', 'Data Berhasil Dihapus');
    }
}
