<?php

namespace App\Controllers\Admin\Pengguna;

use App\Controllers\BaseController;
use App\Models\Kelas;
use App\Models\Pengguna;

class WaliKelasController extends BaseController
{
    protected $db, $pengguna, $kelas;

    public function __construct()
    {
        $this->kelas = new Kelas();
        $this->pengguna = new Pengguna();
        $this->db = db_connect();
    }
    public function index()
    {
        $kirim['data'] = $this->db->table('pengguna p')
            ->select('p.*, k.nama as nama_kelas')
            ->join('kelas k', 'p.kelas_id=k.id')
            ->where([
                'p.hak_akses' => 6,
            ])
            ->get()->getResult();
        return view('admin/pengguna/wali-kelas/index', $kirim);
    }
    public function tambah()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'kelas' => 'required|numeric',
                'username' => 'required|string|is_unique[pengguna.username]',
                'nama' => 'required|string',
                'password' => 'required|max_length[50]',
                'ulangi_password' => 'matches[password]',
            ]);
            if ($validation) {
                $this->pengguna->insert([
                    'kelas_id' => $this->request->getPost('kelas'),
                    'username' => $this->request->getPost('username'),
                    'nama' => $this->request->getPost('nama'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                    'hak_akses' => 6,
                ]);
                return redirect()->to('admin/pengguna/wali-kelas')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            $kirim['kelas'] = $this->kelas->findAll();
            return view('admin/pengguna/wali-kelas/form', $kirim);
        }
    }
    public function ubah($id)
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'kelas' => 'required|numeric',
                'nama' => 'required|string',
            ]);
            if ($validation) {
                $this->pengguna->update($id, [
                    'kelas_id' => $this->request->getPost('kelas'),
                    'nama' => $this->request->getPost('nama'),
                ]);
                return redirect()->to('admin/pengguna/wali-kelas')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            $pengguna = $this->pengguna->find($id);
            if ($pengguna) {
                $kirim['data'] = $pengguna;
                $kirim['kelas'] = $this->kelas->findAll();
                return view('admin/pengguna/wali-kelas/form', $kirim);
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
            return redirect()->to('admin/pengguna/wali-kelas')->with('success', 'Selamat data berhasil dihapus');
        } else {
            return redirect()->to('admin/pengguna/wali-kelas')->with('error', 'Data tidak ditemukan');
        }
    }
}
