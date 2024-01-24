<?php

namespace App\Controllers\Kepsek;

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
        return view('kepsek/penilaian-sikap/index', $kirim);
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
                $view = view('kepsek/penilaian-sikap/data', $kirim);
                return $this->response->setJSON([
                    'status' => true,
                    'data' => $view
                ]);
            }
        }
    }
}
