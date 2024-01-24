<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-3">DASHBOARD</h1>
<div class="row">
     <div class="col-lg-3">
          <div class="card">
               <div class="card-body">
                    <div class="row">
                         <div class="col mt-0">
                              <h5 class="card-title">TAHUN AJARAN AKTIF</h5>
                         </div>
                         <div class="col-auto">
                              <div class="stat text-primary">
                                   <i class="align-middle" data-feather="calendar"></i>
                              </div>
                         </div>
                    </div>
                    <h1 class="mt-1 mb-3"><?= $tahunAjaran->nama ?></h1>
               </div>
          </div>
     </div>
     <div class="col-lg-3">
          <div class="card">
               <div class="card-body">
                    <div class="row">
                         <div class="col mt-0">
                              <h5 class="card-title">JUMLAH KELAS</h5>
                         </div>
                         <div class="col-auto">
                              <div class="stat text-primary">
                                   <i class="align-middle" data-feather="grid"></i>
                              </div>
                         </div>
                    </div>
                    <h1 class="mt-1 mb-3"><?= count($kelas) ?></h1>
               </div>
          </div>
     </div>
     <div class="col-lg-3">
          <div class="card">
               <div class="card-body">
                    <div class="row">
                         <div class="col mt-0">
                              <h5 class="card-title">JUMLAH MATA PELAJARAN</h5>
                         </div>
                         <div class="col-auto">
                              <div class="stat text-primary">
                                   <i class="align-middle" data-feather="book-open"></i>
                              </div>
                         </div>
                    </div>
                    <h1 class="mt-1 mb-3"><?= count($mapel) ?></h1>
               </div>
          </div>
     </div>
     <div class="col-lg-3">
          <div class="card">
               <div class="card-body">
                    <div class="row">
                         <div class="col mt-0">
                              <h5 class="card-title">JUMLAH GURU</h5>
                         </div>
                         <div class="col-auto">
                              <div class="stat text-primary">
                                   <i class="align-middle" data-feather="user-check"></i>
                              </div>
                         </div>
                    </div>
                    <h1 class="mt-1 mb-3"><?= count($guru) ?></h1>
               </div>
          </div>
     </div>
     <div class="col-lg-3">
          <div class="card">
               <div class="card-body">
                    <div class="row">
                         <div class="col mt-0">
                              <h5 class="card-title">JUMLAH SISWA AKTIF</h5>
                         </div>
                         <div class="col-auto">
                              <div class="stat text-primary">
                                   <i class="align-middle" data-feather="users"></i>
                              </div>
                         </div>
                    </div>
                    <h1 class="mt-1 mb-3"><?= count($siswaAktif) ?></h1>
               </div>
          </div>
     </div>
     <div class="col-lg-3">
          <div class="card">
               <div class="card-body">
                    <div class="row">
                         <div class="col mt-0">
                              <h5 class="card-title">JUMLAH SISWA LULUS</h5>
                         </div>
                         <div class="col-auto">
                              <div class="stat text-primary">
                                   <i class="align-middle" data-feather="users"></i>
                              </div>
                         </div>
                    </div>
                    <h1 class="mt-1 mb-3"><?= count($siswaTidakAktif) ?></h1>
               </div>
          </div>
     </div>
     <div class="col-lg-3">
          <div class="card">
               <div class="card-body">
                    <div class="row">
                         <div class="col mt-0">
                              <h5 class="card-title">JUMLAH PENGGUNA ADMIN</h5>
                         </div>
                         <div class="col-auto">
                              <div class="stat text-primary">
                                   <i class="align-middle" data-feather="users"></i>
                              </div>
                         </div>
                    </div>
                    <h1 class="mt-1 mb-3"><?= count($pengguna) ?></h1>
               </div>
          </div>
     </div>
</div>
<?= $this->endSection() ?>