<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\GuruMapelDetail;
use App\Models\Kelas;

class GuruKelasController extends BaseController
{
    protected $guruKelas, $db, $kelas;

    public function __construct()
    {
        $this->guruKelas = new GuruMapelDetail();
        $this->kelas = new Kelas();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $kirim['data'] = $this->db->query('SELECT gmd.id AS id, k.nama AS nama_kelas, g.nama AS nama_guru, m.nama AS nama_mapel FROM guru_mapel_detail gmd JOIN kelas k ON gmd.kelas_id=k.id JOIN guru_mapel gm ON gmd.guru_mapel_id=gm.id JOIN guru g ON gm.guru_id=g.id JOIN mapel m ON gm.mapel_id=m.id')->getResult();
        return view('admin/guru-kelas/index', $kirim);
    }
    public function tambah()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'guru_mapel' => 'required|numeric',
                'kelas' => 'required|numeric',
            ]);
            if ($validation) {
                $this->guruKelas->insert([
                    'guru_mapel_id' => $this->request->getPost('guru_mapel'),
                    'kelas_id' => $this->request->getPost('kelas'),
                ]);
                return redirect()->to('admin/guru-kelas')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            $kirim['kelas'] = $this->kelas->findAll();
            $kirim['guru_mapel'] = $this->db->query('SELECT gm.id, g.nama AS nama_guru, m.nama AS nama_mapel FROM guru_mapel gm JOIN guru g ON gm.guru_id=g.id JOIN mapel m ON gm.mapel_id=m.id')->getResult();
            return view('admin/guru-kelas/form', $kirim);
        }
    }
    public function hapus($id)
    {
        $kelas = $this->guruKelas->find($id);
        if ($kelas) {
            $this->guruKelas->delete($id);
            return redirect()->to('admin/guru-kelas')->with('success', 'Selamat data berhasil dihapus');
        } else {
            return redirect()->to('admin/guru-kelas')->with('error', 'Data tidak ditemukan');
        }
    }
}
