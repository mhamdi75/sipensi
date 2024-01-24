<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-3">FORM SISWA</h1>
<div class="row">
     <div class="col-12">
          <div class="card">
               <div class="card-header">
                    <a href="<?= base_url('admin/siswa') ?>" class="btn btn-danger"><i class="align-middle me-1" data-feather="arrow-left"></i> KEMBALI KE DATA</a>
               </div>
               <div class="card-body">
                    <form action="<?= isset($data) ? base_url('admin/siswa/ubah/' . $data->id) : base_url('admin/siswa/tambah') ?>" method="post">
                         <div class="row mb-3">
                              <div class="col-12 col-lg-6 mb-3">
                                   <label class="form-label">NIS</label>
                                   <input type="text" required name="nis" <?= isset($data) ? 'readonly value="' . $data->nis . '"' : old('nis') ?> id="nis" class="form-control" placeholder="Masukan nis">
                              </div>
                              <div class="col-12 col-lg-6 mb-3">
                                   <label class="form-label">NAMA</label>
                                   <input type="text" required name="nama" <?= isset($data) ? 'value="' . $data->nama . '"' : old('nama') ?> id="nama" class="form-control" placeholder="Masukan nama">
                              </div>
                              <div class="col-12 col-lg-6 mb-3">
                                   <label class="form-label">JENIS KELAMIN</label>
                                   <select name="jk" id="jk" class="form-control" required>
                                        <option value="">pilih salah satu</option>
                                        <option <?= isset($data) && $data->jk == 'l' ? 'selected ' :  '' ?><?= old('jk') == 'l' ? 'selected ' :  '' ?>value="l">Laki - Laki</option>
                                        <option <?= isset($data) && $data->jk == 'p' ? 'selected ' :  '' ?><?= old('jk') == 'p' ? 'selected ' :  '' ?>value="p">Perempuan</option>
                                   </select>
                              </div>
                         </div>
                         <button type="submit" class="btn btn-primary"><i class="align-middle me-1" data-feather="save"></i> SIMPAN</button>
                    </form>
               </div>
          </div>
     </div>
</div>
<?= $this->endSection() ?>