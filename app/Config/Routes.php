<?php

use App\Controllers\Admin\DashboardController;
use App\Controllers\Admin\GuruController;
use App\Controllers\Admin\GuruKelasController;
use App\Controllers\Admin\KategoriNilaiController;
use App\Controllers\Admin\KategoriSikapController;
use App\Controllers\Admin\KelasController;
use App\Controllers\Admin\MapelController;
use App\Controllers\Admin\Pengguna\AdminController;
use App\Controllers\Admin\Pengguna\GuruBKController;
use App\Controllers\Admin\Pengguna\KepsekController;
use App\Controllers\Admin\Pengguna\WaliKelasController;
use App\Controllers\Admin\SiswaController;
use App\Controllers\Admin\TahunAjaranController;
use App\Controllers\Admin\TahunAjaranDetailController;
use App\Controllers\Guru\DashboardGuruController;
use App\Controllers\Guru\PenilaianController;
use App\Controllers\GuruBk\DashboardGuruBkController;
use App\Controllers\GuruBk\PenilaianSikapController;
use App\Controllers\Kepsek\DashboardController as KepsekDashboardController;
use App\Controllers\Kepsek\PenilaianController as KepsekPenilaianController;
use App\Controllers\Kepsek\PenilaianSikapController as KepsekPenilaianSikapController;
use App\Controllers\LoginController;
use App\Controllers\Siswa\DashboardSiswaController;
use App\Controllers\Siswa\NilaiController;
use App\Controllers\WaliKelas\DashboardWaliKelasController;
use App\Controllers\WaliKelas\PenilaianSikapController as WaliKelasPenilaianSikapController;
use App\Controllers\WaliKelas\PenilaianWalikelasController;
use CodeIgniter\Router\RouteCollection;

$routes->setAutoRoute(false);
/**
 * @var RouteCollection $routes
 */
// auth
$routes->post('logout', [LoginController::class, 'logout']);
$routes->group('', ['filter' => 'guest'], function ($routes) {
     $routes->get('/', [LoginController::class, 'index']);
     $routes->post('validasi', [LoginController::class, 'validasi']);
});
// admin
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
     $routes->get('dashboard', [DashboardController::class, 'index']);

     // tahun-ajaran
     $routes->get('tahun-ajaran', [TahunAjaranController::class, 'index']);
     $routes->get('tahun-ajaran/tambah', [TahunAjaranController::class, 'tambah']);
     $routes->post('tahun-ajaran/tambah', [TahunAjaranController::class, 'tambah']);
     $routes->get('tahun-ajaran/ubah/(:num)', [TahunAjaranController::class, 'ubah/$1']);
     $routes->post('tahun-ajaran/ubah/(:num)', [TahunAjaranController::class, 'ubah/$1']);
     $routes->get('tahun-ajaran/ubah-status/(:num)/(:num)', [TahunAjaranController::class, 'ubahStatus/$1/$2']);

     // kelas
     $routes->get('kelas', [KelasController::class, 'index']);
     $routes->get('kelas/tambah', [KelasController::class, 'tambah']);
     $routes->post('kelas/tambah', [KelasController::class, 'tambah']);
     $routes->get('kelas/ubah/(:num)', [KelasController::class, 'ubah/$1']);
     $routes->post('kelas/ubah/(:num)', [KelasController::class, 'ubah/$1']);
     $routes->get('kelas/hapus/(:num)', [KelasController::class, 'hapus/$1']);
     // mapel
     $routes->get('mapel', [MapelController::class, 'index']);
     $routes->get('mapel/tambah', [MapelController::class, 'tambah']);
     $routes->post('mapel/tambah', [MapelController::class, 'tambah']);
     $routes->get('mapel/ubah/(:num)', [MapelController::class, 'ubah/$1']);
     $routes->post('mapel/ubah/(:num)', [MapelController::class, 'ubah/$1']);
     $routes->get('mapel/hapus/(:num)', [MapelController::class, 'hapus/$1']);
     // guru
     $routes->get('guru', [GuruController::class, 'index']);
     $routes->get('guru/tambah', [GuruController::class, 'tambah']);
     $routes->post('guru/tambah', [GuruController::class, 'tambah']);
     $routes->get('guru/ubah/(:num)', [GuruController::class, 'ubah/$1']);
     $routes->post('guru/ubah/(:num)', [GuruController::class, 'ubah/$1']);
     $routes->get('guru/hapus/(:num)', [GuruController::class, 'hapus/$1']);
     // guru-kelas
     $routes->get('guru-kelas', [GuruKelasController::class, 'index']);
     $routes->get('guru-kelas/tambah', [GuruKelasController::class, 'tambah']);
     $routes->post('guru-kelas/tambah', [GuruKelasController::class, 'tambah']);
     $routes->get('guru-kelas/hapus/(:num)', [GuruKelasController::class, 'hapus/$1']);
     // siswa
     $routes->get('siswa', [SiswaController::class, 'index']);
     $routes->get('siswa/tambah', [SiswaController::class, 'tambah']);
     $routes->post('siswa/tambah', [SiswaController::class, 'tambah']);
     $routes->get('siswa/ubah/(:num)', [SiswaController::class, 'ubah/$1']);
     $routes->post('siswa/ubah/(:num)', [SiswaController::class, 'ubah/$1']);
     $routes->get('siswa/hapus/(:num)', [SiswaController::class, 'hapus/$1']);

     // pengguna
     $routes->group('pengguna', function ($routes) {
          // admin
          $routes->get('admin', [AdminController::class, 'index']);
          $routes->get('admin/tambah', [AdminController::class, 'tambah']);
          $routes->post('admin/tambah', [AdminController::class, 'tambah']);
          $routes->get('admin/ubah/(:num)', [AdminController::class, 'ubah/$1']);
          $routes->post('admin/ubah/(:num)', [AdminController::class, 'ubah/$1']);
          $routes->get('admin/hapus/(:num)', [AdminController::class, 'hapus/$1']);
          // kepsek
          $routes->get('kepsek', [KepsekController::class, 'index']);
          $routes->get('kepsek/tambah', [KepsekController::class, 'tambah']);
          $routes->post('kepsek/tambah', [KepsekController::class, 'tambah']);
          $routes->get('kepsek/ubah/(:num)', [KepsekController::class, 'ubah/$1']);
          $routes->post('kepsek/ubah/(:num)', [KepsekController::class, 'ubah/$1']);
          $routes->get('kepsek/hapus/(:num)', [KepsekController::class, 'hapus/$1']);
          // wali-kelas
          $routes->get('wali-kelas', [WaliKelasController::class, 'index']);
          $routes->get('wali-kelas/tambah', [WaliKelasController::class, 'tambah']);
          $routes->post('wali-kelas/tambah', [WaliKelasController::class, 'tambah']);
          $routes->get('wali-kelas/ubah/(:num)', [WaliKelasController::class, 'ubah/$1']);
          $routes->post('wali-kelas/ubah/(:num)', [WaliKelasController::class, 'ubah/$1']);
          $routes->get('wali-kelas/hapus/(:num)', [WaliKelasController::class, 'hapus/$1']);
          // guru-bk
          $routes->get('guru-bk', [GuruBKController::class, 'index']);
          $routes->get('guru-bk/tambah', [GuruBKController::class, 'tambah']);
          $routes->post('guru-bk/tambah', [GuruBKController::class, 'tambah']);
          $routes->get('guru-bk/ubah/(:num)', [GuruBKController::class, 'ubah/$1']);
          $routes->post('guru-bk/ubah/(:num)', [GuruBKController::class, 'ubah/$1']);
          $routes->get('guru-bk/hapus/(:num)', [GuruBKController::class, 'hapus/$1']);
     });
     // kategori-nilai
     $routes->get('kategori-nilai', [KategoriNilaiController::class, 'index']);
     $routes->get('kategori-nilai/tambah', [KategoriNilaiController::class, 'tambah']);
     $routes->post('kategori-nilai/tambah', [KategoriNilaiController::class, 'tambah']);
     $routes->get('kategori-nilai/ubah/(:num)', [KategoriNilaiController::class, 'ubah/$1']);
     $routes->post('kategori-nilai/ubah/(:num)', [KategoriNilaiController::class, 'ubah/$1']);
     $routes->get('kategori-nilai/hapus/(:num)', [KategoriNilaiController::class, 'hapus/$1']);
     // kategori-sikap
     $routes->get('kategori-sikap', [KategoriSikapController::class, 'index']);
     $routes->get('kategori-sikap/tambah', [KategoriSikapController::class, 'tambah']);
     $routes->post('kategori-sikap/tambah', [KategoriSikapController::class, 'tambah']);
     $routes->get('kategori-sikap/ubah/(:num)', [KategoriSikapController::class, 'ubah/$1']);
     $routes->post('kategori-sikap/ubah/(:num)', [KategoriSikapController::class, 'ubah/$1']);
     $routes->get('kategori-sikap/hapus/(:num)', [KategoriSikapController::class, 'hapus/$1']);
     // tahun-ajaran-detail
     $routes->get('tahun-ajaran-detail', [TahunAjaranDetailController::class, 'index']);
     $routes->get('tahun-ajaran-detail/tambah', [TahunAjaranDetailController::class, 'tambah']);
     $routes->post('tahun-ajaran-detail/tambah', [TahunAjaranDetailController::class, 'tambah']);
     $routes->post('tahun-ajaran-detail/data', [TahunAjaranDetailController::class, 'dataTahunAjaranDetail']);
     $routes->post('tahun-ajaran-detail/keluarkan-siswa', [TahunAjaranDetailController::class, 'keluarkanSiswa']);
     $routes->post('tahun-ajaran-detail/luluskan', [TahunAjaranDetailController::class, 'luluskan']);
     $routes->post('tahun-ajaran-detail/pindah-kelas', [TahunAjaranDetailController::class, 'pindahKelas']);
});
// guru
$routes->group('guru', ['filter' => 'auth'], function ($routes) {
     $routes->get('dashboard', [DashboardGuruController::class, 'index']);
     $routes->get('ganti-password', [DashboardGuruController::class, 'gantiPassword']);
     $routes->post('ganti-password', [DashboardGuruController::class, 'gantiPassword']);
     $routes->get('penilaian/(:num)', [PenilaianController::class, 'index']);
     $routes->post('penilaian', [PenilaianController::class, 'loadView']);
     $routes->post('penilaian/aksi', [PenilaianController::class, 'aksi']);
     $routes->post('penilaian/selesai', [PenilaianController::class, 'selesai']);
     $routes->get('penilaian/cetak/(:num)/(:num)/(:num)', [PenilaianController::class, 'cetak/$1/$2/$3']);
});
// siswa
$routes->group('siswa', ['filter' => 'auth'], function ($routes) {
     $routes->get('dashboard', [DashboardSiswaController::class, 'index']);
     $routes->get('ganti-password', [DashboardSiswaController::class, 'gantiPassword']);
     $routes->post('ganti-password', [DashboardSiswaController::class, 'gantiPassword']);
     $routes->get('nilai', [NilaiController::class, 'index']);
     $routes->get('cetak', [NilaiController::class, 'cetak']);
});
// kepsek
$routes->group('kepsek', ['filter' => 'auth'], function ($routes) {
     $routes->get('dashboard', [KepsekDashboardController::class, 'index']);
     $routes->get('penilaian', [KepsekPenilaianController::class, 'index']);
     $routes->post('penilaian', [KepsekPenilaianController::class, 'loadView']);
     $routes->get('penilaian-sikap', [KepsekPenilaianSikapController::class, 'index']);
     $routes->post('penilaian-sikap', [KepsekPenilaianSikapController::class, 'data']);
});
// guru-bk
$routes->group('guru-bk', ['filter' => 'auth'], function ($routes) {
     $routes->get('dashboard', [DashboardGuruBkController::class, 'index']);
     $routes->get('penilaian-sikap', [PenilaianSikapController::class, 'index']);
     $routes->post('penilaian-sikap/data', [PenilaianSikapController::class, 'data']);
     $routes->post('penilaian-sikap/aksi', [PenilaianSikapController::class, 'aksi']);
     $routes->post('penilaian-sikap/selesai', [PenilaianSikapController::class, 'selesai']);
});
// wali-kelas
$routes->group('wali-kelas', ['filter' => 'auth'], function ($routes) {
     $routes->get('dashboard', [DashboardWaliKelasController::class, 'index']);
     $routes->get('penilaian', [PenilaianWalikelasController::class, 'index']);
     $routes->post('penilaian', [PenilaianWalikelasController::class, 'loadView']);
     $routes->post('penilaian/aksi', [PenilaianWalikelasController::class, 'aksi']);
     $routes->post('penilaian/selesai', [PenilaianWalikelasController::class, 'selesai']);
     $routes->get('penilaian-sikap', [WaliKelasPenilaianSikapController::class, 'index']);
});
