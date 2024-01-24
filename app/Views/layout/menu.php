<?php if (session('hak_akses') === '1') { ?>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/dashboard') ?>">
               <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">DASHBOARD</span>
          </a>
     </li>
     <li class="sidebar-header">
          Master Data
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/tahun-ajaran') ?>">
               <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">TAHUN AJARAN</span>
          </a>
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/kelas') ?>">
               <i class="align-middle" data-feather="grid"></i> <span class="align-middle">KELAS</span>
          </a>
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/mapel') ?>">
               <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">MATA PELAJARAN</span>
          </a>
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/guru') ?>">
               <i class="align-middle" data-feather="user-check"></i> <span class="align-middle">GURU</span>
          </a>
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/guru-kelas') ?>">
               <i class="align-middle" data-feather="users"></i> <span class="align-middle">GURU KELAS</span>
          </a>
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/siswa') ?>">
               <i class="align-middle" data-feather="users"></i> <span class="align-middle">SISWA</span>
          </a>
     </li>
     <li class="sidebar-header">
          PENGGUNA
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/pengguna/admin') ?>">
               <i class="align-middle" data-feather="users"></i> <span class="align-middle">ADMIN</span>
          </a>
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/pengguna/kepsek') ?>">
               <i class="align-middle" data-feather="users"></i> <span class="align-middle">KEPSEK/WAKET</span>
          </a>
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/pengguna/wali-kelas') ?>">
               <i class="align-middle" data-feather="users"></i> <span class="align-middle">WALI KELAS</span>
          </a>
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/pengguna/guru-bk') ?>">
               <i class="align-middle" data-feather="users"></i> <span class="align-middle">GURU BK</span>
          </a>
     </li>
     <li class="sidebar-header">
          PENILAIAN
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/kategori-nilai') ?>">
               <i class="align-middle" data-feather="grid"></i> <span class="align-middle">KATEGORI NILAI</span>
          </a>
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/kategori-sikap') ?>">
               <i class="align-middle" data-feather="grid"></i> <span class="align-middle">KATEGORI SIKAP</span>
          </a>
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('admin/tahun-ajaran-detail') ?>">
               <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">TAHUN AJARAN DETAIL</span>
          </a>
     </li>
<?php } else if (session('hak_akses') === '2') {
     $database = db_connect();
?>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('guru/dashboard') ?>">
               <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">DASHBOARD</span>
          </a>
     </li>
     <?php
     $dataGuru = $database->table('guru')->where(['nip' => session('username')])->get()->getRow();
     foreach ($database->table('guru_mapel gm')->select('gm.id as id, m.nama as nama_mapel')->join('mapel m', 'gm.mapel_id=m.id')->where(['gm.guru_id' => $dataGuru->id])->get()->getResult() as $n => $k) : ?>
          <li class="sidebar-item">
               <a class="sidebar-link" href="<?= base_url('guru/penilaian/' . $k->id) ?>">
                    <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle"><?= $k->nama_mapel ?></span>
               </a>
          </li>
     <?php endforeach; ?>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('guru/ganti-password') ?>">
               <i class="align-middle" data-feather="lock"></i> <span class="align-middle">GANTI PASSWORD</span>
          </a>
     </li>
<?php } else if (session('hak_akses') === '3') { ?>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('siswa/dashboard') ?>">
               <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">DASHBOARD</span>
          </a>
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('siswa/nilai') ?>">
               <i class="align-middle" data-feather="book"></i> <span class="align-middle">NILAI</span>
          </a>
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('siswa/ganti-password') ?>">
               <i class="align-middle" data-feather="lock"></i> <span class="align-middle">GANTI PASSWORD</span>
          </a>
     </li>
<?php } else if (session('hak_akses') === '4') { ?>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('kepsek/dashboard') ?>">
               <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">DASHBOARD</span>
          </a>
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('kepsek/penilaian') ?>">
               <i class="align-middle" data-feather="book"></i> <span class="align-middle">PENILAIAN</span>
          </a>
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('kepsek/penilaian-sikap') ?>">
               <i class="align-middle" data-feather="book"></i> <span class="align-middle">PENILAIAN SIKAP</span>
          </a>
     </li>
<?php } else if (session('hak_akses') === '5') { ?>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('guru-bk/dashboard') ?>">
               <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">DASHBOARD</span>
          </a>
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('guru-bk/penilaian-sikap') ?>">
               <i class="align-middle" data-feather="book"></i> <span class="align-middle">PENILAIAN SIKAP</span>
          </a>
     </li>
<?php } else if (session('hak_akses') === '6') { ?>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('wali-kelas/dashboard') ?>">
               <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">DASHBOARD</span>
          </a>
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('wali-kelas/penilaian') ?>">
               <i class="align-middle" data-feather="book"></i> <span class="align-middle">PENILAIAN</span>
          </a>
     </li>
     <li class="sidebar-item">
          <a class="sidebar-link" href="<?= base_url('wali-kelas/penilaian-sikap') ?>">
               <i class="align-middle" data-feather="book"></i> <span class="align-middle">PENILAIAN SIKAP</span>
          </a>
     </li>
<?php } ?>