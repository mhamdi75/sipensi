<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriSikap;

class KategoriSikapController extends BaseController
{
    protected $kategoriSikap;

    public function __construct()
    {
        $this->kategoriSikap = new KategoriSikap();
    }
    public function index()
    {
        $kirim['data'] = $this->kategoriSikap->findAll();
        return view('admin/kategori-sikap/index', $kirim);
    }
    public function tambah()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'nama' => 'required|string',
            ]);
            if ($validation) {
                $this->kategoriSikap->insert([
                    'nama' => $this->request->getPost('nama'),
                ]);
                return redirect()->to('admin/kategori-sikap')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            return view('admin/kategori-sikap/form');
        }
    }
    public function ubah($id)
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'nama' => 'required|string',
            ]);
            if ($validation) {
                $this->kategoriSikap->update($id, [
                    'nama' => $this->request->getPost('nama'),
                ]);
                return redirect()->to('admin/kategori-sikap')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            $kategoriSikap = $this->kategoriSikap->find($id);
            if ($kategoriSikap) {
                $kirim['data'] = $kategoriSikap;
                return view('admin/kategori-sikap/form', $kirim);
            } else {
                return redirect()->to('kategori-sikap')->with('error', 'Data tidak ditemukan');
            }
        }
    }
    public function hapus($id)
    {
        $kategoriSikap = $this->kategoriSikap->find($id);
        if ($kategoriSikap) {
            $this->kategoriSikap->delete($id);
            return redirect()->to('admin/kategori-sikap')->with('success', 'Selamat data berhasil dihapus');
        } else {
            return redirect()->to('admin/kategori-sikap')->with('error', 'Data tidak ditemukan');
        }
    }
}
