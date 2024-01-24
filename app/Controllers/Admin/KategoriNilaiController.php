<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriNilai;

class KategoriNilaiController extends BaseController
{
    protected $kategoriNilai;

    public function __construct()
    {
        $this->kategoriNilai = new KategoriNilai();
    }
    public function index()
    {
        $kirim['data'] = $this->kategoriNilai->findAll();
        return view('admin/kategori-nilai/index', $kirim);
    }
    public function tambah()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'nama' => 'required|string',
            ]);
            if ($validation) {
                $this->kategoriNilai->insert([
                    'nama' => $this->request->getPost('nama'),
                ]);
                return redirect()->to('admin/kategori-nilai')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            return view('admin/kategori-nilai/form');
        }
    }
    public function ubah($id)
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'nama' => 'required|string',
            ]);
            if ($validation) {
                $this->kategoriNilai->update($id, [
                    'nama' => $this->request->getPost('nama'),
                ]);
                return redirect()->to('admin/kategori-nilai')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            $kategoriNilai = $this->kategoriNilai->find($id);
            if ($kategoriNilai) {
                $kirim['data'] = $kategoriNilai;
                return view('admin/kategori-nilai/form', $kirim);
            } else {
                return redirect()->to('kategori-nilai')->with('error', 'Data tidak ditemukan');
            }
        }
    }
    public function hapus($id)
    {
        $kategoriNilai = $this->kategoriNilai->find($id);
        if ($kategoriNilai) {
            $this->kategoriNilai->delete($id);
            return redirect()->to('admin/kategori-nilai')->with('success', 'Selamat data berhasil dihapus');
        } else {
            return redirect()->to('admin/kategori-nilai')->with('error', 'Data tidak ditemukan');
        }
    }
}
