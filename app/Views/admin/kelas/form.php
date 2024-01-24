<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-3">FORM KELAS</h1>
<div class="row">
     <div class="col-12">
          <div class="card">
               <div class="card-header">
                    <a href="<?= base_url('admin/kelas') ?>" class="btn btn-danger"><i class="align-middle me-1" data-feather="arrow-left"></i> KEMBALI KE DATA</a>
               </div>
               <div class="card-body">
                    <form action="<?= isset($data) ? base_url('admin/kelas/ubah/' . $data->id) : base_url('admin/kelas/tambah') ?>" method="post">
                         <div class="row mb-3">
                              <div class="col-12 mb-3">
                                   <label class="form-label">NAMA</label>
                                   <input type="text" required name="nama" <?= isset($data) ? 'value="' . $data->nama . '"' : old('nama') ?> id="nama" class="form-control" placeholder="Masukan nama">
                              </div>
                         </div>
                         <button type="submit" class="btn btn-primary"><i class="align-middle me-1" data-feather="save"></i> SIMPAN</button>
                    </form>
               </div>
          </div>
     </div>
</div>
<?= $this->endSection() ?>