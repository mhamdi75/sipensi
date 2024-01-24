<?php

namespace App\Controllers\GuruBk;

use App\Controllers\BaseController;
use App\Models\KategoriSikap;
use App\Models\Kelas;
use App\Models\NilaiSikap;
use App\Models\TahunAjaran;

class PenilaianSikapController extends BaseController
{
    protected $db, $kategoriSikap, $tahunAjaran, $nilaiSikap, $kelas, $siswa;

    public function __construct()
    {
        $this->kategoriSikap = new KategoriSikap();
        $this->tahunAjaran = new TahunAjaran();
        $this->kelas = new Kelas();
        $this->nilaiSikap = new NilaiSikap();
        $this->db = db_connect();
    }
    public function index()
    {
        $kirim['db'] = $this->db;
        $kirim['tahunAjaran'] = $this->tahunAjaran->where(['status' => 1])->first();
        $kirim['kelas'] = $this->kelas->findAll();
        return view('guru-bk/penilaian-sikap/index', $kirim);
    }
    public function data()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'tahun_ajaran' => 'required|numeric',
                'kelas' => 'required|numeric',
            ]);
            if ($validation) {
                $kirim['db'] = $this->db;
                $kirim['tahun_ajaran'] = $this->request->getPost('tahun_ajaran');
                $kirim['kelas'] = $this->kelas->find($this->request->getPost('kelas'));
                $kirim['kategoriSikap'] = $this->kategoriSikap->findAll();
                $kirim['siswa'] = $this->db->table('tahun_ajaran_detail tad')->select('tad.id as tad_id,s.*')->join('siswa s', 'tad.siswa_id = s.id')->where([
                    'tad.tahun_ajaran_id' => $this->request->getPost('tahun_ajaran'),
                    'tad.kelas_id' => $this->request->getPost('kelas'),
                ])->orderBy('s.nis', 'asc')->get()->getResult();
                $view = view('guru-bk/penilaian-sikap/data', $kirim);
                return $this->response->setJSON([
                    'status' => true,
                    'data' => $view
                ]);
            }
        }
    }
    public function aksi()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'ks' => 'required|numeric',
                'tad' => 'required|numeric',
                'nilai' => 'required|numeric',
            ]);
            if ($validation) {
                $ks = $this->request->getPost('ks');
                $tad = $this->request->getPost('tad');
                $nilai = $this->request->getPost('nilai');
                $dataNilai = $this->db->table('nilai_sikap')->select(['id', 'nilai', 'status'])->where([
                    'kategori_sikap_id' => $ks,
                    'tahun_ajaran_detail_id' => $tad,
                ])->get()->getRow();
                if ($dataNilai) {
                    $this->nilaiSikap->update($dataNilai->id, [
                        'nilai' => $this->request->getPost('nilai'),
                    ]);
                    return $this->response->setJSON([
                        'status' => true,
                    ]);
                } else {
                    $this->nilaiSikap->insert([
                        'kategori_sikap_id' => $ks,
                        'tahun_ajaran_detail_id' => $tad,
                        'nilai' => $nilai,
                        'status' => 1,
                    ]);
                    return $this->response->setJSON([
                        'status' => true,
                    ]);
                }
                return $this->response->setJSON([
                    'status' => false,
                    'message' => "Data tidak bisa diubah / ditambah"
                ]);
            }
        }
    }
    public function selesai()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'tahun_ajaran' => 'required|numeric',
                'kelas' => 'required|numeric',
            ]);
            if ($validation) {
                $tad = $this->db->table('tahun_ajaran_detail tad')->select('tad.id')->where([
                    'tad.tahun_ajaran_id' => $this->request->getPost('tahun_ajaran'),
                    'tad.kelas_id' => $this->request->getPost('kelas'),
                ])->get()->getResult();
                foreach ($tad as $s) {
                    // update status nilai
                    $this->db->table('nilai_sikap')->select(['id'])->where(['tahun_ajaran_detail_id' => $s->id])->update([
                        'status' => 2,
                    ]);
                }
                return $this->response->setJSON([
                    'status' => true,
                ]);
            }
        }
    }
}
