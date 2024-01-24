<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-3">FORM PENILAIAN</h1>
<div class="row">
     <div class="col-12">
          <div class="card">
               <div class="card-body">
                    <h2 class="text-center m-0">TAHUN AJARAN <?= $tahunAjaran->nama ?></h2>
                    <form action="javascript:void(0)" id="formKelas" class="m-0 row" method="post">
                         <input type="hidden" name="tahun_ajaran" id="tahun_ajaran" value="<?= $tahunAjaran->id ?>">
                         <div class="col-lg-4">
                              <label class="form-label">PILIH KELAS</label>
                              <select name="kelas" required id="kelas" class="form-control">
                                   <option value="">-- Pilih salah satu --</option>
                                   <?php foreach ($kelas as $k) : ?>
                                        <option value="<?= $k->id ?>"><?= $k->nama ?></option>
                                   <?php endforeach; ?>
                              </select>
                         </div>
                         <div class="col-lg-4">
                              <label class="form-label">PILIH GURU - MATA PELAJARAN</label>
                              <select name="guru_mapel" required id="guru_mapel" class="form-control">
                                   <option value="">-- Pilih salah satu --</option>
                                   <?php foreach ($guru_mapel as $k) : ?>
                                        <option value="<?= $k->id ?>"><?= $k->nama_guru ?> - <?= $k->nama_mapel ?></option>
                                   <?php endforeach; ?>
                              </select>
                         </div>
                         <div class="col-lg-4">
                              <label class="form-label">&nbsp;</label>
                              <br>
                              <button type="submit" class="btn btn-primary"><i class="align-middle me-1" data-feather="search"></i> CARI</button>
                         </div>
                    </form>
                    <div id="dataPenilaian"></div>
               </div>
          </div>
     </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
     function pilihKelas() {
          var kelas = $('#kelas').val();
          var gm_id = $('#guru_mapel').val();
          if (kelas && gm_id) {
               $.ajax({
                    url: "<?= base_url('kepsek/penilaian') ?>",
                    type: "POST",
                    data: {
                         tahun_ajaran: <?= $tahunAjaran->id ?>,
                         kelas: kelas,
                         gm_id: gm_id,
                    },
                    dataType: "JSON",
                    success: function(data) {
                         if (data.status) {
                              $("#dataPenilaian").html(data.data);
                         } else {
                              alert(data.message)
                         }
                    },
                    error: function(a, t, n) {
                         alert(n);
                    }
               });
          } else {
               alert('Form kelas belum dipilih dan difilter')
          }
     }
     $("#formKelas").submit(function() {
          pilihKelas()
     });
</script>
<?= $this->endSection() ?>