<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DiskonModel;

class DiskonController extends BaseController
{
    protected $diskon;

    public function __construct()
    {
        $this->diskon = new DiskonModel();
    }

    public function index()
    {
        $data['diskon'] = $this->diskon->findAll();

        return view('v_diskon', $data);
    }

    public function create()
    {
    $tanggal = $this->request->getPost('tanggal');
    $nominal = $this->request->getPost('nominal');

    // Cek apakah tanggal diskon sudah ada
    $existing = $this->diskon->where('tanggal', $tanggal)->first();

    if ($existing) {
        return redirect()->to('/diskon')->with('failed', 'Diskon pada tanggal tersebut sudah ada!');
    }

    // Jika belum ada, simpan data baru
    $this->diskon->save([
        'tanggal' => $tanggal,
        'nominal' => $nominal,
        'created_at' => date('Y-m-d H:i:s')
    ]);

    return redirect()->to('/diskon')->with('success', 'Diskon berhasil ditambahkan!');
}

    public function edit($id)
    {
        $this->diskon->update($id, [
            'tanggal' => $this->request->getPost('tanggal'),
            'nominal' => $this->request->getPost('nominal'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/diskon')->with('success', 'Diskon berhasil diubah!');
    }

    public function delete($id)
    {
        $this->diskon->delete($id);

        return redirect()->to('/diskon')->with('success', 'Diskon berhasil dihapus!');
    }
}
