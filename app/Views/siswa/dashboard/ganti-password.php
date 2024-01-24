<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-3">FORM GANTI PASSWORD</h1>
<div class="col-12">
     <div class="card">
          <div class="card-body">
               <form action="<?= base_url('siswa/ganti-password') ?>" method="post">
                    <div class="row mb-3">
                         <div class="col-6 mb-3">
                              <label class="form-label">PASSWORD SAAT INI</label>
                              <input type="password" required name="password_saat_ini" id="password_saat_ini" class="form-control" placeholder="Masukan password saat ini">
                         </div>
                         <div class="col-6 mb-3">
                              <label class="form-label">PASSWORD BARU</label>
                              <input type="password" required name="password_baru" id="password_baru" class="form-control" placeholder="Masukan password baru">
                         </div>
                         <div class="col-6 mb-3">
                              <label class="form-label">ULANGI PASSWORD BARU</label>
                              <input type="password" required name="ulangi_password_baru" id="ulangi_password_baru" class="form-control" placeholder="Masukan ulangi password baru">
                         </div>
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="align-middle me-1" data-feather="save"></i> SIMPAN</button>
               </form>
          </div>
     </div>
</div>
<?= $this->endSection() ?>