<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Pengguna;
use App\Models\Siswa;
use App\Models\TahunAjaran;

class DashboardController extends BaseController
{
    protected $db, $tahunAjaran, $kelas, $mapel, $guru, $siswa, $pengguna;

    public function __construct()
    {
        $this->tahunAjaran = new TahunAjaran();
        $this->kelas = new Kelas();
        $this->mapel = new Mapel();
        $this->guru = new Guru();
        $this->siswa = new Siswa();
        $this->pengguna = new Pengguna();
        $this->db = db_connect();
    }
    public function index()
    {
        $kirim['tahunAjaran'] = $this->tahunAjaran->where(['status' => 1])->first();
        $kirim['kelas'] = $this->kelas->findAll();
        $kirim['mapel'] = $this->mapel->findAll();
        $kirim['guru'] = $this->guru->findAll();
        $kirim['siswaAktif'] = $this->siswa->where(['status' => 1])->orWhere(['status' => 2])->get()->getResult();
        $kirim['siswaTidakAktif'] = $this->siswa->where(['status' => 3])->orWhere(['status' => 4])->get()->getResult();
        $kirim['pengguna'] = $this->pengguna->where(['hak_akses' => 1])->get()->getResult();
        return view('admin/dashboard/index', $kirim);
    }
}
