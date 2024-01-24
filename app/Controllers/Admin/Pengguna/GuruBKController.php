<?php

namespace App\Controllers\Admin\Pengguna;

use App\Controllers\BaseController;
use App\Models\Pengguna;

class GuruBKController extends BaseController
{
    protected $pengguna;

    public function __construct()
    {
        $this->pengguna = new Pengguna();
    }
    public function index()
    {
        $kirim['data'] = $this->pengguna->where('hak_akses', 5)->findAll();
        return view('admin/pengguna/guru-bk/index', $kirim);
    }
    public function tambah()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'username' => 'required|string|is_unique[pengguna.username]',
                'nama' => 'required|string',
                'password' => 'required|max_length[50]',
                'ulangi_password' => 'matches[password]',
            ]);
            if ($validation) {
                $this->pengguna->insert([
                    'username' => $this->request->getPost('username'),
                    'nama' => $this->request->getPost('nama'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                    'hak_akses' => 5,
                ]);
                return redirect()->to('admin/pengguna/guru-bk')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            return view('admin/pengguna/guru-bk/form');
        }
    }
    public function ubah($id)
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'nama' => 'required|string',
            ]);
            if ($validation) {
                $this->pengguna->update($id, [
                    'nama' => $this->request->getPost('nama'),
                ]);
                return redirect()->to('admin/pengguna/guru-bk')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            $pengguna = $this->pengguna->find($id);
            if ($pengguna) {
                $kirim['data'] = $pengguna;
                return view('admin/pengguna/guru-bk/form', $kirim);
            } else {
                return redirect()->to('kategori-sikap')->with('error', 'Data tidak ditemukan');
            }
        }
    }
    public function hapus($id)
    {
        $pengguna = $this->pengguna->find($id);
        if ($pengguna) {
            $this->pengguna->delete($id);
            return redirect()->to('admin/pengguna/guru-bk')->with('success', 'Selamat data berhasil dihapus');
        } else {
            return redirect()->to('admin/pengguna/guru-bk')->with('error', 'Data tidak ditemukan');
        }
    }
}
