<?php

namespace App\Controllers\Guru;

use App\Controllers\BaseController;
use App\Models\Pengguna;
use App\Models\TahunAjaran;

class DashboardGuruController extends BaseController
{
    protected $db, $tahunAjaran, $pengguna;

    public function __construct()
    {
        $this->pengguna = new Pengguna();
        $this->tahunAjaran = new TahunAjaran();
        $this->db = db_connect();
    }
    public function index()
    {
        $kirim['tahunAjaran'] = $this->tahunAjaran->where(['status' => 1])->first();
        return view('guru/dashboard/index', $kirim);
    }
    public function gantiPassword()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'password_saat_ini' => 'required|max_length[50]',
                'password_baru' => 'required|max_length[50]',
                'ulangi_password_baru' => 'matches[password_baru]',
            ]);
            if ($validation) {
                $dataPengguna = $this->pengguna->where([
                    'id' => session('id')
                ])->first();
                if ($dataPengguna && password_verify($this->request->getPost('password_saat_ini'), $dataPengguna->password)) {
                    $this->pengguna->update(session('id'), [
                        'password' => password_hash($this->request->getPost('password_baru'), PASSWORD_BCRYPT),
                    ]);
                    return redirect()->to('guru/ganti-password')->with('success', 'Selamat data berhasil disimpan');
                } else {
                    return redirect()->back()->with('error', 'Password saat ini tidak cocok');
                }
            } else {
                return redirect()->back()->with('error', $this->validator->listErrors());
            }
        } else {
            return view('guru/dashboard/ganti-password');
        }
    }
}
