<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kelas;

class KelasController extends BaseController
{
    protected $kelas;

    public function __construct()
    {
        $this->kelas = new Kelas();
    }
    public function index()
    {
        $kirim['data'] = $this->kelas->findAll();
        return view('admin/kelas/index', $kirim);
    }
    public function tambah()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'nama' => 'required|string|is_unique[kelas.nama]',
            ]);
            if ($validation) {
                $this->kelas->insert([
                    'nama' => $this->request->getPost('nama'),
                ]);
                return redirect()->to('admin/kelas')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            return view('admin/kelas/form');
        }
    }
    public function ubah($id)
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'nama' => 'required|string|is_unique[kelas.nama]',
            ]);
            if ($validation) {
                $this->kelas->update($id, [
                    'nama' => $this->request->getPost('nama'),
                ]);
                return redirect()->to('admin/kelas')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            $kelas = $this->kelas->find($id);
            if ($kelas) {
                $kirim['data'] = $kelas;
                return view('admin/kelas/form', $kirim);
            } else {
                return redirect()->to('kelas')->with('error', 'Data tidak ditemukan');
            }
        }
    }
    public function hapus($id)
    {
        $kelas = $this->kelas->find($id);
        if ($kelas) {
            $this->kelas->delete($id);
            return redirect()->to('admin/kelas')->with('success', 'Selamat data berhasil dihapus');
        } else {
            return redirect()->to('admin/kelas')->with('error', 'Data tidak ditemukan');
        }
    }
}
