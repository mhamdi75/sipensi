<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-3">FORM GURU KELAS</h1>
<div class="row">
     <div class="col-12">
          <div class="card">
               <div class="card-header">
                    <a href="<?= base_url('admin/guru-kelas') ?>" class="btn btn-danger"><i class="align-middle me-1" data-feather="arrow-left"></i> KEMBALI KE DATA</a>
               </div>
               <div class="card-body">
                    <form action="<?= isset($data) ? base_url('admin/guru-kelas/ubah/' . $data->id) : base_url('admin/guru-kelas/tambah') ?>" method="post">
                         <div class="row mb-3">
                              <div class="col-12 col-lg-6 mb-3">
                                   <label class="form-label">KELAS</label>
                                   <select name="kelas" id="kelas" class="form-control">
                                        <option value="">-- Pilih salah satu --</option>
                                        <?php foreach ($kelas as $k) : ?>
                                             <option value="<?= $k->id ?>"><?= $k->nama ?></option>
                                        <?php endforeach; ?>
                                   </select>
                              </div>
                              <div class="col-12 col-lg-6 mb-3">
                                   <label class="form-label">GURU MATA PELAJARAN</label>
                                   <select name="guru_mapel" id="guru_mapel" class="form-control">
                                        <option value="">-- Pilih salah satu --</option>
                                        <?php foreach ($guru_mapel as $gm) : ?>
                                             <option value="<?= $gm->id ?>"><?= $gm->nama_guru ?> - <?= $gm->nama_mapel ?></option>
                                        <?php endforeach; ?>
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