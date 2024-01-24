<?php

namespace App\Controllers\WaliKelas;

use App\Controllers\BaseController;
use App\Models\GuruMapel;
use App\Models\KategoriNilai;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\TahunAjaran;
use App\Models\TahunAjaranDetail;

class PenilaianWalikelasController extends BaseController
{
    protected $db, $guruMapel, $tahunAjaran, $tahunAjaranDetail, $nilai, $kelas, $siswa, $kategoriNilai;

    public function __construct()
    {
        $this->nilai = new Nilai();
        $this->kelas = new Kelas();
        $this->tahunAjaran = new TahunAjaran();
        $this->tahunAjaranDetail = new TahunAjaranDetail();
        $this->guruMapel = new GuruMapel();
        $this->kategoriNilai = new KategoriNilai();
        $this->db = db_connect();
    }
    public function index()
    {
        $kirim['guru_mapel'] = $this->db->table('guru_mapel gm')->select('gm.id, m.nama as nama_mapel,g.nama as nama_guru')->join('mapel m', 'gm.mapel_id = m.id')->join('guru g', 'gm.guru_id = g.id')->get()->getResult();
        $kirim['tahunAjaran'] = $this->tahunAjaran->where(['status' => 1])->first();
        return view('wali-kelas/penilaian/index', $kirim);
    }
    public function loadView()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'tahun_ajaran' => 'required|numeric',
                'kelas' => 'required|numeric',
                'gm_id' => 'required|numeric',
            ]);
            if ($validation) {
                $gmd = $this->db->table('guru_mapel_detail')->select('id')->where(['guru_mapel_id' => $this->request->getPost('gm_id'), 'kelas_id' => $this->request->getPost('kelas')])->get()->getRow();
                if ($gmd) {
                    $kirim['db'] = $this->db;
                    $kirim['tahun_ajaran'] = $this->request->getPost('tahun_ajaran');
                    $kirim['gmd'] = $gmd->id;
                    $kirim['kelas'] = $this->kelas->find($this->request->getPost('kelas'));
                    $kirim['kategoriNilai'] = $this->kategoriNilai->findAll();
                    $kirim['siswa'] = $this->db->table('tahun_ajaran_detail tad')->select('tad.id as tad_id,s.*')->join('siswa s', 'tad.siswa_id = s.id')->where([
                        'tad.tahun_ajaran_id' => $this->request->getPost('tahun_ajaran'),
                        'tad.kelas_id' => $this->request->getPost('kelas'),
                    ])->orderBy('s.nis', 'asc')->get()->getResult();
                    $view = view('wali-kelas/penilaian/data', $kirim);
                    return $this->response->setJSON([
                        'status' => true,
                        'data' => $view
                    ]);
                } else {
                    return $this->response->setJSON([
                        'status' => false,
                    ]);
                }
            }
        }
    }
    public function aksi()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'kn' => 'required|numeric',
                'tad' => 'required|numeric',
                'gmd' => 'required|numeric',
                'nilai' => 'required|numeric',
            ]);
            if ($validation) {
                $kn = $this->request->getPost('kn');
                $tad = $this->request->getPost('tad');
                $gmd = $this->request->getPost('gmd');
                $nilai = $this->request->getPost('nilai');
                $dataNilai = $this->db->table('nilai')->select(['id', 'nilai', 'status'])->where([
                    'kategori_nilai_id' => $kn,
                    'tahun_ajaran_detail_id' => $tad,
                    'guru_mapel_detail_id' => $gmd
                ])->get()->getRow();
                if ($dataNilai) {
                    $this->nilai->update($dataNilai->id, [
                        'nilai' => $this->request->getPost('nilai'),
                    ]);
                    return $this->response->setJSON([
                        'status' => true,
                    ]);
                } else {
                    $this->nilai->insert([
                        'kategori_nilai_id' => $kn,
                        'tahun_ajaran_detail_id' => $tad,
                        'guru_mapel_detail_id' => $gmd,
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
                'gmd' => 'required|numeric',
            ]);
            if ($validation) {
                $tad = $this->db->table('tahun_ajaran_detail tad')->select('tad.id')->where([
                    'tad.tahun_ajaran_id' => $this->request->getPost('tahun_ajaran'),
                    'tad.kelas_id' => $this->request->getPost('kelas'),
                ])->get()->getResult();
                $gmd = $this->request->getPost('gmd');
                foreach ($tad as $s) {
                    // update status nilai
                    $this->db->table('nilai')->select(['id'])->where(['tahun_ajaran_detail_id' => $s->id, 'guru_mapel_detail_id' => $gmd])->update([
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
