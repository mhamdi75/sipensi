<?= $this->extend('layout/template') ?>
<?= $this->section('style') ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css" rel="stylesheet">
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-3">DATA TAHUN AJARAN DETAIL</h1>
<div class="row">
     <div class="col-12">
          <div class="card">
               <div class="card-header">
                    <a href="<?= base_url('admin/tahun-ajaran-detail/tambah') ?>" class="btn btn-primary"><i class="align-middle me-1" data-feather="plus"></i> TAMBAH DATA</a>
               </div>
               <div class="card-body">
                    <h2 class="text-center">TAHUN AJARAN <?= $tahunAjaran->nama ?></h2>
                    <div class="row mb-3">
                         <div class="col-lg-6 col-12">
                              <form action="javascript:void" method="post" class="row" id="formFilterKelas">
                                   <div class="col-12 col-lg-6 mb-3">
                                        <label class="form-label">TAHUN AJARAN</label>
                                        <select name="tahun_ajaran" id="tahun_ajaran" required class="form-control">
                                             <option value="">-- Pilih salah satu --</option>
                                             <?php foreach ($dataTahunAjaran as $ta) : ?>
                                                  <option value="<?= $ta->id ?>"><?= $ta->nama ?></option>
                                             <?php endforeach; ?>
                                        </select>
                                   </div>
                                   <div class="col-12 col-lg-6 mb-3">
                                        <label class="form-label">KELAS</label>
                                        <div class="input-group">
                                             <select name="kelas" id="kelas" required class="form-control">
                                                  <option value="">-- Pilih salah satu --</option>
                                                  <?php foreach ($kelas as $k) : ?>
                                                       <option value="<?= $k->id ?>"><?= $k->nama ?></option>
                                                  <?php endforeach; ?>
                                             </select>
                                             <button class="btn btn-primary" type="submit"><i class="align-middle" data-feather="search"></i> CARI</button>
                                        </div>
                                   </div>
                              </form>
                         </div>
                         <div class="col-12 col-lg-3 mb-3 d-grid gap-2">
                              <br>
                              <button type="button" class="btn btn-danger" id="btnLuluskan"><i class="align-middle me-1" data-feather="x-circle"></i> LULUSKAN</button>
                         </div>
                         <div class="col-12 col-lg-3 mb-3">
                              <label class="form-label">NAIKAN KEKELAS</label>
                              <form action="javascript:void" method="post" id="formPindahKelas">
                                   <div class="input-group">
                                        <select name="kelasSelanjutnya" id="kelasSelanjutnya" required class="form-control">
                                             <option value="">-- Pilih salah satu --</option>
                                             <?php foreach ($kelas as $k) : ?>
                                                  <option value="<?= $k->id ?>"><?= $k->nama ?></option>
                                             <?php endforeach; ?>
                                        </select>
                                        <button class="btn btn-primary" type="submit"><i class="align-middle" data-feather="save"></i> SIMPAN</button>
                                   </div>
                              </form>
                         </div>
                    </div>
                    <table id="example" class="table table-hover table-bordered table-sm" style="width:100%">
                         <thead>
                              <tr>
                                   <th class="w-1">NO</th>
                                   <th>Nis</th>
                                   <th>Nama</th>
                                   <th class="w-1">AKSI</th>
                              </tr>
                         </thead>
                    </table>
               </div>
          </div>
     </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap.min.js"></script>
<script>
     $("#formFilterKelas").submit(function() {
          datatable($("#tahun_ajaran").val(), $("#kelas").val())
     });
     $("#btnLuluskan").click(function() {
          var tahun_ajaran = $('#tahun_ajaran').val();
          var kelas = $('#kelas').val();
          if (kelas) {
               $.post("<?= base_url('admin/tahun-ajaran-detail/luluskan') ?>", {
                    tahun_ajaran: tahun_ajaran,
                    kelas: kelas,
               }, function(data) {
                    datatable($("#tahun_ajaran").val(), $("#kelas").val())
               }).fail(function(a, t, n) {
                    alert(n);
               });
          } else {
               alert('Form kelas belum dipilih dan difilter')
          }
     });
     $("#formPindahKelas").submit(function() {
          var tahun_ajaran = $('#tahun_ajaran').val();
          var kelas = $('#kelas').val();
          var kelasSelanjutnya = $('#kelasSelanjutnya').val();
          if (tahun_ajaran && kelas && kelasSelanjutnya && window.confirm("Apakah anda ingin memindahkan seluruh siswa ini?")) {
               $.post("<?= base_url('admin/tahun-ajaran-detail/pindah-kelas') ?>", {
                    tahun_ajaran: tahun_ajaran,
                    kelas: kelas,
                    kelasSelanjutnya: kelasSelanjutnya,
                    tahun_ajaran_selanjutnya: <?= $tahunAjaran->id ?>,
               }, function(data) {
                    datatable($("#tahun_ajaran").val(), $("#kelas").val())
               }).fail(function(a, t, n) {
                    alert(n);
               });
          } else {
               alert('Form kelas belum dipilih dan difilter')
          }
     });

     function datatable(tahun_ajaran, kelas) {
          $("table#example").DataTable({
               bAutoWidth: !1,
               ordering: !1,
               responsive: !0,
               processing: !0,
               bDestroy: !0,
               paging: !0,
               ajax: {
                    url: "<?= base_url('admin/tahun-ajaran-detail/data') ?>",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                         tahun_ajaran: tahun_ajaran,
                         kelas: kelas,
                    },
                    success: function(response) {
                         if (!response.status) {
                              alert('Data Kosong');
                              $('.dataTables_processing').hide();
                              $("table#example").DataTable().rows.add([]).draw();
                         } else {
                              $('.dataTables_processing').hide();
                              $("table#example").DataTable().clear().draw();
                              $("table#example").DataTable().rows.add(response.data).draw();
                         }
                    },
               },
               columns: [{
                    className: "w-1 text-center"
               }, {
                    className: "w-1 text-center"
               }, {
                    className: ""
               }, {
                    className: "w-1 text-center"
               }]
          })
     }

     function keluarkanSiswa(tad, siswa) {
          if (window.confirm("Apakah anda ingin mengeluarkan siswa ini?")) {
               $.post("<?= base_url('admin/tahun-ajaran-detail/keluarkan-siswa') ?>", {
                    tad: tad,
                    siswa: siswa
               }, function(data) {
                    datatable($("#tahun_ajaran").val(), $("#kelas").val())
               }).fail(function(a, t, n) {
                    alert(n);
               });
          }
     }
</script>
<?= $this->endSection() ?>