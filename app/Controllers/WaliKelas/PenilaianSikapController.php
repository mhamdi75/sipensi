<?php

namespace App\Controllers\WaliKelas;

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
        $tahunAjaran = $this->tahunAjaran->where(['status' => 1])->first();
        $kirim['db'] = $this->db;
        $kirim['tahunAjaran'] = $tahunAjaran;
        $kirim['kelas'] = $this->kelas->find(session('kelas_id'));
        $kirim['kategoriSikap'] = $this->kategoriSikap->findAll();
        $kirim['siswa'] = $this->db->table('tahun_ajaran_detail tad')->select('tad.id as tad_id,s.*')->join('siswa s', 'tad.siswa_id = s.id')->where([
            'tad.tahun_ajaran_id' => $tahunAjaran->id,
            'tad.kelas_id' => session('kelas_id'),
        ])->orderBy('s.nis', 'asc')->get()->getResult();
        return view('wali-kelas/penilaian-sikap/index', $kirim);
    }
}
