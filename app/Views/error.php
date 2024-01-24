<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="row">
     <div class="col-12">
          <div class="card">
               <div class="card-body">
                    <div class="alert alert-danger">
                         <h1><i class="align-middle" data-feather="alert-triangle"></i> <?= $message ?></h1>
                    </div>
               </div>
          </div>
     </div>
</div>
<?= $this->endSection() ?>