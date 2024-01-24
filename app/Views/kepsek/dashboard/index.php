<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-3">DASHBOARD</h1>
<div class="col-12">
     <div class="card">
          <div class="card-header text-center">
               <h1>SELAMAT DATA DI <b>SIPENSI</b></h1>
               <h3>SISTEM INFORMASI PENILAIAN SISWA SMA NEGERI 1 KANDANG SERANG</h3>
          </div>
          <div class="card-body text-center">
               <h3>TAHUN AJARAN</h3>
               <h3><b><?= $tahunAjaran->nama ?></b></h3>
          </div>
     </div>
</div>
<?= $this->endSection() ?>