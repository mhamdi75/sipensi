<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TahunAjaran;

class TahunAjaranController extends BaseController
{
    protected $tahunAjaran;

    public function __construct()
    {
        $this->tahunAjaran = new TahunAjaran();
    }
    public function index()
    {
        $data['tahunAjaran'] = $this->tahunAjaran->findAll();
        return view('admin/tahun-ajaran/index', $data);
    }
    public function tambah()
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'nama' => 'required|string|is_unique[tahun_ajaran.nama]',
            ]);
            if ($validation) {
                $this->tahunAjaran->insert([
                    'nama' => $this->request->getPost('nama'),
                    'status' => 2,
                ]);
                return redirect()->to('admin/tahun-ajaran')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            return view('admin/tahun-ajaran/form');
        }
    }
    public function ubah($id)
    {
        if ($this->request->getPost()) {
            $validation = $this->validate([
                'nama' => 'required|string|is_unique[tahun_ajaran.nama]',
            ]);
            if ($validation) {
                $this->tahunAjaran->update($id, [
                    'nama' => $this->request->getPost('nama'),
                ]);
                return redirect()->to('admin/tahun-ajaran')->with('success', 'Selamat data berhasil disimpan');
            } else {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
            }
        } else {
            $data = $this->tahunAjaran->find($id);
            if ($data) {
                $kirim['data'] = $data;
                return view('admin/tahun-ajaran/form', $kirim);
            } else {
                return redirect()->to('admin/tahun-ajaran')->with('error', 'Data tidak ditemukan');
            }
        }
    }
    public function ubahStatus($id, $status)
    {
        $data = $this->tahunAjaran->find($id);
        if ($data) {
            if ($status === '1') {
                $dataLama = $this->tahunAjaran->where('status', '1')->first();
                if ($dataLama) {
                    $this->tahunAjaran->update($dataLama->id, [
                        'status' => 2,
                    ]);
                }
            }
            $this->tahunAjaran->update($id, [
                'status' => $status,
            ]);
            return redirect()->to('admin/tahun-ajaran')->with('success', 'Selamat status data berhasil diubah');
        } else {
            return redirect()->to('admin/tahun-ajaran')->with('error', 'Data tidak ditemukan');
        }
    }
}
