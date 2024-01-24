<?php

namespace App\Controllers\GuruBk;

use App\Controllers\BaseController;
use App\Models\TahunAjaran;

class DashboardGuruBkController extends BaseController
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
        return view('guru-bk/dashboard/index', $kirim);
    }
}
