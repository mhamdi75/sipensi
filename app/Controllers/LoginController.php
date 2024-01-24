<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengguna;

class LoginController extends BaseController
{
    protected $pengguna;

    public function __construct()
    {
        $this->pengguna = new Pengguna();
    }
    public function index()
    {
        return view('login');
    }
    public function validasi()
    {
        $validation = $this->validate([
            'username' => 'required|string',
            'password' => 'required|string',
            'hak_akses' => 'required|numeric',
        ]);
        if ($validation && $this->request->getPost()) {
            $pengguna = new Pengguna();
            $password = $this->request->getPost('password');
            $dataPengguna = $pengguna->where([
                'username' => $this->request->getPost('username'),
                'hak_akses' => $this->request->getPost('hak_akses'),
            ])->first();
            if ($dataPengguna && password_verify($password, $dataPengguna->password)) {
                session()->set([
                    'login' => TRUE,
                    'id' => $dataPengguna->id,
                    'kelas_id' => $dataPengguna->kelas_id,
                    'username' => $dataPengguna->username,
                    'nama' => $dataPengguna->nama,
                    'hak_akses' => $dataPengguna->hak_akses,
                ]);
                if ($dataPengguna->hak_akses === '1') {
                    return redirect()->to('admin/dashboard')->with('success', 'Selamat Datang ' . $dataPengguna->nama);
                } else if ($dataPengguna->hak_akses === '2') {
                    return redirect()->to('guru/dashboard')->with('success', 'Selamat Datang ' . $dataPengguna->nama);
                } else if ($dataPengguna->hak_akses === '3') {
                    return redirect()->to('siswa/dashboard')->with('success', 'Selamat Datang ' . $dataPengguna->nama);
                } else if ($dataPengguna->hak_akses === '4') {
                    return redirect()->to('kepsek/dashboard')->with('success', 'Selamat Datang ' . $dataPengguna->nama);
                } else if ($dataPengguna->hak_akses === '5') {
                    return redirect()->to('guru-bk/dashboard')->with('success', 'Selamat Datang ' . $dataPengguna->nama);
                } else if ($dataPengguna->hak_akses === '6') {
                    return redirect()->to('wali-kelas/dashboard')->with('success', 'Selamat Datang ' . $dataPengguna->nama);
                }
            } else {
                return redirect()->back()->withInput()->with('error', 'Data pengguna tidak ditemukan');
            }
        } else {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }
    }
    public function logout()
    {
        session()->remove(['login', 'nama', 'email',]);
        return redirect()->to('/')->with('success', 'Anda berhasil Logout');
    }
}
