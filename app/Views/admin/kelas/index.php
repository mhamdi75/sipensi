<?= $this->extend('layout/template') ?>
<?= $this->section('style') ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap.min.css" rel="stylesheet">
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-3">DATA KELAS</h1>
<div class="row">
     <div class="col-12">
          <div class="card">
               <div class="card-header">
                    <a href="<?= base_url('admin/kelas/tambah') ?>" class="btn btn-primary"><i class="align-middle me-1" data-feather="plus"></i> TAMBAH DATA</a>
               </div>
               <div class="card-body">
                    <table id="example" class="table table-hover table-bordered table-sm" style="width:100%">
                         <thead>
                              <tr>
                                   <th class="w-1">NO</th>
                                   <th>Nama</th>
                                   <th class="w-1">AKSI</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php foreach ($data  as $n => $k) : ?>
                                   <tr>
                                        <td class="text-center"><?= ++$n ?></td>
                                        <td><?= $k->nama ?></td>
                                        <td>
                                             <div class="btn-group">
                                                  <a href="<?= base_url('admin/kelas/ubah/' . $k->id) ?>" class="btn btn-sm btn-success"><i class="align-middle w-0 p-0" data-feather="edit-2"></i></a>
                                                  <a href="<?= base_url('admin/kelas/hapus/' . $k->id) ?>" onclick="return confirm('Apakah anda serius ingin menghapus data ini?')" class="btn btn-sm btn-danger"><i class="align-middle w-0 p-0" data-feather="trash-2"></i></a>
                                             </div>
                                        </td>
                                   </tr>
                              <?php endforeach; ?>
                         </tbody>
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
     $(document).ready(function() {
          $('#example').DataTable({
               responsive: true
          });
     });
</script>
<?= $this->endSection() ?>