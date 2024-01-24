<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-3">FORM PENGGUNA WALI KELAS</h1>
<div class="row">
     <div class="col-12">
          <div class="card">
               <div class="card-header">
                    <a href="<?= base_url('admin/pengguna/wali-kelas') ?>" class="btn btn-danger"><i class="align-middle me-1" data-feather="arrow-left"></i> KEMBALI KE DATA</a>
               </div>
               <div class="card-body">
                    <form action="<?= isset($data) ? base_url('admin/pengguna/wali-kelas/ubah/' . $data->id) : base_url('admin/pengguna/wali-kelas/tambah') ?>" method="post">
                         <div class="row mb-3">
                              <div class="col-6 mb-3">
                                   <label class="form-label">KELAS</label>
                                   <select name="kelas" id="kelas" required class="form-control">
                                        <option value="">-- Pilih salah satu --</option>
                                        <?php foreach ($kelas as $k) : ?>
                                             <option value="<?= $k->id ?>" <?= isset($data) && $data->kelas_id == $k->id ? ' selected' : '' ?>><?= $k->nama ?></option>
                                        <?php endforeach; ?>
                                   </select>
                              </div>
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