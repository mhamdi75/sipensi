<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-3">FORM GURU</h1>
<div class="row">
     <div class="col-12">
          <div class="card">
               <div class="card-header">
                    <a href="<?= base_url('admin/guru') ?>" class="btn btn-danger"><i class="align-middle me-1" data-feather="arrow-left"></i> KEMBALI KE DATA</a>
               </div>
               <div class="card-body">
                    <form action="<?= isset($data) ? base_url('admin/guru/ubah/' . $data->id) : base_url('admin/guru/tambah') ?>" method="post">
                         <div class="row mb-3">
                              <div class="col-12 col-lg-6 mb-3">
                                   <label class="form-label">NIP</label>
                                   <input type="text" required name="nip" <?= isset($data) ? 'readonly value="' . $data->nip . '"' : old('nip') ?> id="nip" class="form-control" placeholder="Masukan nip">
                              </div>
                              <div class="col-12 col-lg-6 mb-3">
                                   <label class="form-label">NAMA</label>
                                   <input type="text" required name="nama" <?= isset($data) ? 'value="' . $data->nama . '"' : old('nama') ?> id="nama" class="form-control" placeholder="Masukan nama">
                              </div>
                              <div class="col-12 mb-3">
                                   <label class="form-label">MATA PELAJARAN</label>
                                   <br>
                                   <?php foreach ($mapel as $n => $k) : ?>
                                        <label class="form-check form-check-inline">
                                             <input class="form-check-input" <?php
                                                                                if (isset($data)) {
                                                                                     $cek = $db->query('SELECT gm.id FROM guru_mapel gm WHERE gm.guru_id=' . $data->id . ' AND gm.mapel_id = ' . $k->id . '')->getResult();
                                                                                     if ($cek) {
                                                                                          echo 'checked disabled';
                                                                                     }
                                                                                }
                                                                                ?> type="checkbox" name="mapel[]" value="<?= $k->id ?>">
                                             <span class="form-check-label"><?= $k->nama ?></span>
                                        </label>
                                   <?php endforeach; ?>
                              </div>
                         </div>
                         <button type="submit" class="btn btn-primary"><i class="align-middle me-1" data-feather="save"></i> SIMPAN</button>
                    </form>
               </div>
          </div>
     </div>
</div>
<?= $this->endSection() ?>