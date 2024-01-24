<?php

namespace App\Controllers\Siswa;

use App\Controllers\BaseController;
use App\Models\KategoriNilai;
use App\Models\KategoriSikap;
use App\Models\Siswa;

class NilaiController extends BaseController
{
    protected $db, $siswa, $kategoriNilai, $kategoriSikap;
    public function __construct()
    {
        $this->db = db_connect();
        $this->siswa = new Siswa();
        $this->kategoriNilai = new KategoriNilai();
        $this->kategoriSikap = new KategoriSikap();
    }
    public function index()
    {
        $username = session('username');
        $tahunAjaranAktif = $this->db->table('tahun_ajaran')->where('status', '1')->get()->getRow();
        $dataSiswa = $this->siswa->where(['nis' => $username])->get()->getRow();
        $dataTAD = $this->db->query('SELECT tad.id AS tad_id,s.nis,s.nama AS nama_siswa,s.jk AS jk_siswa, k.nama AS nama_kelas,k.id AS kelas_id FROM tahun_ajaran_detail AS tad JOIN siswa AS s ON tad.siswa_id=s.id JOIN kelas AS k ON tad.kelas_id=k.id WHERE tad.tahun_ajaran_id = ' . $tahunAjaranAktif->id . ' AND tad.siswa_id=' . $dataSiswa->id . ' AND tad.status=1')->getRow();
        $kirim['tahunAjaranAktif'] = $tahunAjaranAktif;
        if ($dataTAD) {
            $kirim['status'] = true;
            $kirim['db'] = $this->db;
            $kirim['kategoriNilai'] = $this->kategoriNilai->findAll();
            $kirim['kategoriSikap'] = $this->kategoriSikap->findAll();
            $kirim['dataTAD'] = $dataTAD;
            $kirim['mapel'] = $this->db->query('SELECT gmd.id AS gmd_id, g.nip, g.nama AS nama_guru, m.nama AS nama_mapel FROM guru_mapel_detail AS gmd JOIN guru_mapel AS gm ON gmd.guru_mapel_id=gm.id JOIN guru AS g ON gm.guru_id=g.id JOIN mapel AS m ON gm.mapel_id=m.id WHERE gmd.kelas_id = ' . $dataTAD->kelas_id . '')->getResult();
            return view('siswa/nilai/index', $kirim);
        } else {
            $kirim['status'] = false;
            return view('siswa/nilai/index', $kirim);
        }
    }
    public function cetak()
    {
        $username = session('username');
        $tahunAjaranAktif = $this->db->table('tahun_ajaran')->where('status', '1')->get()->getRow();
        $dataSiswa = $this->siswa->where(['nis' => $username])->get()->getRow();
        $dataTAD = $this->db->query('SELECT tad.id AS tad_id,s.nis,s.nama AS nama_siswa,s.jk AS jk_siswa, k.nama AS nama_kelas,k.id AS kelas_id FROM tahun_ajaran_detail AS tad JOIN siswa AS s ON tad.siswa_id=s.id JOIN kelas AS k ON tad.kelas_id=k.id WHERE tad.tahun_ajaran_id = ' . $tahunAjaranAktif->id . ' AND tad.siswa_id=' . $dataSiswa->id . ' AND tad.status=1')->getRow();
        $kirim['tahunAjaranAktif'] = $tahunAjaranAktif;
        if ($dataTAD) {
            $kirim['status'] = true;
            $kirim['db'] = $this->db;
            $kirim['kategoriNilai'] = $this->kategoriNilai->findAll();
            $kirim['kategoriSikap'] = $this->kategoriSikap->findAll();
            $kirim['dataTAD'] = $dataTAD;
            $kirim['mapel'] = $this->db->query('SELECT gmd.id AS gmd_id, g.nip, g.nama AS nama_guru, m.nama AS nama_mapel FROM guru_mapel_detail AS gmd JOIN guru_mapel AS gm ON gmd.guru_mapel_id=gm.id JOIN guru AS g ON gm.guru_id=g.id JOIN mapel AS m ON gm.mapel_id=m.id WHERE gmd.kelas_id = ' . $dataTAD->kelas_id . '')->getResult();
            return view('siswa/nilai/cetak', $kirim);
        } else {
            return redirect()->back()->with('error', "Nilai tidak ditemukan");
        }
    }
}
