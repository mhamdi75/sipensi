<?php

namespace App\Controllers\WaliKelas;

use App\Controllers\BaseController;
use App\Models\TahunAjaran;

class DashboardWaliKelasController extends BaseController
{
    protected $db, $tahunAjaran;

    public function __construct()
    {
        $this->tahunAjaran = new TahunAjaran();
        $this->db = db_connect();
    }
    public function index()
    {
        $kirim['tahunAjaran'] = $this->tahunAjaran->where(['status' => 1])->first();
        return view('wali-kelas/dashboard/index', $kirim);
    }
}
