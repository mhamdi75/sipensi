<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\TahunAjaranDetail;

class TahunAjaranDetailController extends BaseController
{
    protected $db, $tahunAjaranDetail, $tahunAjaran, $kelas, $siswa;

    public function __construct()
    {
        $this->tahunAjaranDetail = new TahunAjaranDetail();
        $this->tahunAjaran = new TahunAjaran();
        $this->kelas = new Kelas();
        $this->siswa = new Siswa();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $kirim['db'] = $this->db;
        $kirim['kelas'] = $this->kelas->findAll();
        $kirim['tahunAjaranDetail'] = $this->tahunAjaranDetail->findAll();
        $kirim['dataTahunAjaran'] = $this->tahunAjaran->findAll();
        $kirim['tahunAjaran'] = $this->tahunAjaran->where(['status' => 1])->first();
        return view('admin/tahun-ajaran-detail/index', $kirim);
    }
    public function tambah()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'tahun_ajaran' => 'required|numeric',
                'kelas' => 'required|numeric',
                'siswa' => 'required|numeric',
            ]);
            if ($validation) {
                $this->tahunAjaranDetail->insert([
                    'tahun_ajaran_id' => $this->request->getPost('tahun_ajaran'),
                    'kelas_id' => $this->request->getPost('kelas'),
                    'siswa_id' => $this->request->getPost('siswa'),
                    'status' => 1,
                ]);
                $this->siswa->update($this->request->getPost('siswa'), [
                    'status' => 2,
                ]);
                return redirect()->to('admin/tahun-ajaran-detail')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            $kirim['tahunAjaran'] = $this->tahunAjaran->where(['status' => 1])->first();
            $kirim['kelas'] = $this->kelas->findAll();
            $kirim['siswa'] = $this->siswa->where(['status' => 1])->get()->getResult();
            return view('admin/tahun-ajaran-detail/form', $kirim);
        }
    }
    public function dataTahunAjaranDetail()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'tahun_ajaran' => 'required|numeric',
                'kelas' => 'required|numeric',
            ]);
            if ($validation) {
                $data = [];
                $siswa = $this->db->table('tahun_ajaran_detail tad')
                    ->select('tad.id as tad_id, s.*')
                    ->join('siswa s', 'tad.siswa_id=s.id')
                    ->where([
                        'tad.tahun_ajaran_id' => $this->request->getPost('tahun_ajaran'),
                        'tad.kelas_id' => $this->request->getPost('kelas'),
                        'tad.status' => 1,
                    ])
                    ->get();
                if ($siswa->getNumRows() > 0) {
                    foreach ($siswa->getResult() as $n => $k) {
                        $data[] = [
                            ++$n,
                            $k->nis,
                            $k->nama,
                            '<a href="javascript:void(0)" onclick="keluarkanSiswa(' . $k->tad_id . ',' . $k->id . ')" class="btn btn-sm btn-danger">X</a>',
                        ];
                    }
                    return json_encode(['status' => true, 'data' => $data]);
                } else {
                    return json_encode(['status' => false, 'data' => $data]);
                }
            }
        }
    }
    public function keluarkanSiswa()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'tad' => 'required|numeric',
                'siswa' => 'required|numeric',
            ]);
            if ($validation) {
                $this->tahunAjaranDetail->update($this->request->getPost('tad'), [
                    'status' => 2,
                ]);
                $this->siswa->update($this->request->getPost('siswa'), [
                    'status' => 4,
                ]);
                return redirect()->to('admin/tahun-ajaran-detail')->with('success', 'Selamat data berhasil disimpan');
            }
        }
    }
    public function luluskan()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'tahun_ajaran' => 'required|numeric',
                'kelas' => 'required|numeric',
            ]);
            if ($validation) {
                $tad = $this->db->table('tahun_ajaran_detail')->where([
                    'tahun_ajaran_id' => $this->request->getPost('tahun_ajaran'),
                    'kelas_id' => $this->request->getPost('kelas')
                ])->get()->getResult();
                foreach ($tad as $k) {
                    $this->siswa->update($k->siswa_id, [
                        'status' => 4,
                    ]);
                }
                $this->db->table('tahun_ajaran_detail')->where([
                    'tahun_ajaran_id' => $this->request->getPost('tahun_ajaran'),
                    'kelas_id' => $this->request->getPost('kelas')
                ])->update([
                    'status' => 2,
                ]);
                return redirect()->to('admin/tahun-ajaran-detail')->with('success', 'Selamat data berhasil disimpan');
            }
        }
    }
    public function pindahKelas()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'tahun_ajaran' => 'required|numeric',
                'kelas' => 'required|numeric',
                'kelasSelanjutnya' => 'required|numeric',
                'tahun_ajaran_selanjutnya' => 'required|numeric',
            ]);
            if ($validation) {
                $tad = $this->db->table('tahun_ajaran_detail')->where([
                    'tahun_ajaran_id' => $this->request->getPost('tahun_ajaran'),
                    'kelas_id' => $this->request->getPost('kelas')
                ])->get()->getResult();
                foreach ($tad as $k) {
                    $this->tahunAjaranDetail->insert([
                        'tahun_ajaran_id' => $this->request->getPost('tahun_ajaran_selanjutnya'),
                        'kelas_id' => $this->request->getPost('kelasSelanjutnya'),
                        'siswa_id' => $k->siswa_id,
                        'status' => 1,
                    ]);
                    $this->tahunAjaranDetail->update($k->id, [
                        'status' => 2,
                    ]);
                }
                return redirect()->to('admin/tahun-ajaran-detail')->with('success', 'Selamat data berhasil disimpan');
            }
        }
    }
}
