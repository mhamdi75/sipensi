<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-3">FORM PENGGUNA KEPALA SEKOLAH / WAKET KURIKULUM</h1>
<div class="row">
     <div class="col-12">
          <div class="card">
               <div class="card-header">
                    <a href="<?= base_url('admin/pengguna/kepsek') ?>" class="btn btn-danger"><i class="align-middle me-1" data-feather="arrow-left"></i> KEMBALI KE DATA</a>
               </div>
               <div class="card-body">
                    <form action="<?= isset($data) ? base_url('admin/pengguna/kepsek/ubah/' . $data->id) : base_url('admin/pengguna/kepsek/tambah') ?>" method="post">
                         <div class="row mb-3">
                              <div class="col-6 mb-3">
                                   <label class="form-label">USERNAME</label>
                                   <input type="text" required name="username" <?= isset($data) ? 'value="' . $data->username . '" disabled' : old('username') ?> id="username" class="form-control" placeholder="Masukan username">
                              </div>
                              <div class="col-6 mb-3">
                                   <label class="form-label">NAMA</label>
                                   <input type="text" required name="nama" <?= isset($data) ? 'value="' . $data->nama . '"' : old('nama') ?> id="nama" class="form-control" placeholder="Masukan nama">
                              </div>
                              <?php if (!isset($data)) { ?>
                                   <div class="col-6 mb-3">
                                        <label class="form-label">PASSWORD</label>
                                        <input type="password" required name="password" id="password" class="form-control" placeholder="Masukan password">
                                   </div>
                                   <div class="col-6 mb-3">
                                        <label class="form-label">ULANGI PASSWORD</label>
                                        <input type="password" required name="ulangi_password" id="ulangi_password" class="form-control" placeholder="Masukan ulangi password">
                                   </div>
                              <?php } ?>
                         </div>
                         <button type="submit" class="btn btn-primary"><i class="align-middle me-1" data-feather="save"></i> SIMPAN</button>
                    </form>
               </div>
          </div>
     </div>
</div>
<?= $this->endSection() ?>