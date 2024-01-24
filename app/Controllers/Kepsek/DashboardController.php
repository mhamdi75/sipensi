<?php

namespace App\Controllers\Kepsek;

use App\Controllers\BaseController;
use App\Models\TahunAjaran;

class DashboardController extends BaseController
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
        return view('kepsek/dashboard/index', $kirim);
    }
}
