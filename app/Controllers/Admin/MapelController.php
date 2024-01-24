<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Mapel;

class MapelController extends BaseController
{
    protected $mapel;

    public function __construct()
    {
        $this->mapel = new Mapel();
    }
    public function index()
    {
        $kirim['data'] = $this->mapel->findAll();
        return view('admin/mapel/index', $kirim);
    }
    public function tambah()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'nama' => 'required|string',
            ]);
            if ($validation) {
                $this->mapel->insert([
                    'nama' => $this->request->getPost('nama'),
                ]);
                return redirect()->to('admin/mapel')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            return view('admin/mapel/form');
        }
    }
    public function ubah($id)
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'nama' => 'required|string',
            ]);
            if ($validation) {
                $this->mapel->update($id, [
                    'nama' => $this->request->getPost('nama'),
                ]);
                return redirect()->to('admin/mapel')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            $mapel = $this->mapel->find($id);
            if ($mapel) {
                $kirim['data'] = $mapel;
                return view('admin/mapel/form', $kirim);
            } else {
                return redirect()->to('mapel')->with('error', 'Data tidak ditemukan');
            }
        }
    }
    public function hapus($id)
    {
        $mapel = $this->mapel->find($id);
        if ($mapel) {
            $this->mapel->delete($id);
            return redirect()->to('admin/mapel')->with('success', 'Selamat data berhasil dihapus');
        } else {
            return redirect()->to('admin/mapel')->with('error', 'Data tidak ditemukan');
        }
    }
}
