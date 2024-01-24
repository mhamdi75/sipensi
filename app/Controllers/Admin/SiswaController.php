<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Pengguna;
use App\Models\Siswa;

class SiswaController extends BaseController
{
    protected $siswa, $pengguna, $db;

    public function __construct()
    {
        $this->siswa = new Siswa();
        $this->pengguna = new Pengguna();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $kirim['db'] = $this->db;
        $kirim['data'] = $this->siswa->orderBy('status', 'asc')->get()->getResult();
        return view('admin/siswa/index', $kirim);
    }
    public function tambah()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'nis' => 'required|numeric|is_unique[siswa.nis]',
                'nama' => 'required|string',
                'jk' => 'required|string',
            ]);
            if ($validation) {
                $this->siswa->insert([
                    'nis' => $this->request->getPost('nis'),
                    'nama' => $this->request->getPost('nama'),
                    'jk' => $this->request->getPost('jk'),
                    'status' => 1
                ]);
                $this->pengguna->insert([
                    'username' => $this->request->getPost('nis'),
                    'password' => password_hash($this->request->getPost('nis'), PASSWORD_BCRYPT),
                    'nama' => $this->request->getPost('nama'),
                    'hak_akses' => 3,
                ]);
                return redirect()->to('admin/siswa')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            return view('admin/siswa/form');
        }
    }
    public function ubah($id)
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                // 'nis' => 'required|numeric|is_unique[siswa.nis]',
                'nama' => 'required|string',
                'jk' => 'required|string',
            ]);
            if ($validation) {
                $this->siswa->update($id, [
                    'nama' => $this->request->getPost('nama'),
                    'jk' => $this->request->getPost('jk'),
                ]);
                $pengguna = $this->pengguna->where([
                    'username' => $this->request->getPost('nis'),
                ])->first();
                $this->pengguna->update($pengguna->id, [
                    'nama' => $this->request->getPost('nama'),
                ]);
                return redirect()->to('admin/siswa')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            $siswa = $this->siswa->find($id);
            if ($siswa) {
                $kirim['data'] = $siswa;
                return view('admin/siswa/form', $kirim);
            } else {
                return redirect()->to('siswa')->with('error', 'Data tidak ditemukan');
            }
        }
    }
    public function hapus($id)
    {
        $siswa = $this->siswa->find($id);
        if ($siswa) {
            $this->db->query('DELETE FROM pengguna WHERE username=' . $siswa->nis . '');
            $this->siswa->delete($id);
            return redirect()->to('admin/siswa')->with('success', 'Selamat data berhasil dihapus');
        } else {
            return redirect()->to('admin/siswa')->with('error', 'Data tidak ditemukan');
        }
    }
}
