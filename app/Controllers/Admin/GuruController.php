<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Guru;
use App\Models\GuruMapel;
use App\Models\Mapel;
use App\Models\Pengguna;

class GuruController extends BaseController
{
    protected $guru, $pengguna, $mapel, $guruMapel, $db;

    public function __construct()
    {
        $this->guru = new Guru();
        $this->pengguna = new Pengguna();
        $this->mapel = new Mapel();
        $this->guruMapel = new GuruMapel();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $kirim['db'] = $this->db;
        $kirim['data'] = $this->guru->findAll();
        return view('admin/guru/index', $kirim);
    }
    public function tambah()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'nip' => 'required|numeric|is_unique[guru.nip]',
                'nama' => 'required|string',
                'mapel.*' => 'required',
            ]);
            if ($validation) {
                $this->guru->insert([
                    'nip' => $this->request->getPost('nip'),
                    'nama' => $this->request->getPost('nama'),
                ]);
                $this->pengguna->insert([
                    'username' => $this->request->getPost('nip'),
                    'password' => password_hash($this->request->getPost('nip'), PASSWORD_BCRYPT),
                    'nama' => $this->request->getPost('nama'),
                    'hak_akses' => 2,
                ]);
                $guru = $this->guru->where([
                    'nip' => $this->request->getPost('nip'),
                ])->first();
                foreach ($this->request->getPost('mapel') as $value) {
                    $this->guruMapel->insert([
                        'guru_id' => $guru->id,
                        'mapel_id' => $value,
                    ]);
                }
                return redirect()->to('admin/guru')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            $kirim['mapel'] = $this->mapel->findAll();
            return view('admin/guru/form', $kirim);
        }
    }
    public function ubah($id)
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                // 'nip' => 'required|numeric|is_unique[guru.nip]',
                'nama' => 'required|string',
            ]);
            if ($validation) {

                $this->guru->update($id, [
                    'nip' => $this->request->getPost('nip'),
                    'nama' => $this->request->getPost('nama'),
                ]);
                $pengguna = $this->pengguna->where([
                    'username' => $this->request->getPost('nip'),
                ])->first();
                $this->pengguna->update($pengguna->id, [
                    'nama' => $this->request->getPost('nama'),
                ]);
                return redirect()->to('admin/guru')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            $guru = $this->guru->find($id);
            if ($guru) {
                $kirim['mapel'] = $this->mapel->findAll();
                $kirim['db'] = $this->db;
                $kirim['data'] = $guru;
                return view('admin/guru/form', $kirim);
            } else {
                return redirect()->to('guru')->with('error', 'Data tidak ditemukan');
            }
        }
    }
    public function hapus($id)
    {
        $guru = $this->guru->find($id);
        if ($guru) {
            $this->guru->delete($id);
            $this->db->query('DELETE FROM pengguna WHERE username=' . $guru->nip . '');
            $this->db->query('DELETE FROM guru_mapel WHERE guru_id=' . $guru->id . '');
            return redirect()->to('admin/guru')->with('success', 'Selamat data berhasil dihapus');
        } else {
            return redirect()->to('admin/guru')->with('error', 'Data tidak ditemukan');
        }
    }
}
