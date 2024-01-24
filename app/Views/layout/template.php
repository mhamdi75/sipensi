<?php $database = db_connect();
$tahunAjaranAktif = $database->table('tahun_ajaran')->where('status', '1')->get()->getRow();
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link rel="icon" href="<?= base_url('img/logo.png') ?>" />

     <title>SIPENSI - SMA 1 KANDANGSERANG</title>

     <?= $this->renderSection('style') ?>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?= base_url('css/app.css') ?>" rel="stylesheet">
     <link href="<?= base_url('css/app-data.css') ?>" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
     <div class="wrapper">
          <nav id="sidebar" class="sidebar js-sidebar">
               <div class="sidebar-content js-simplebar">
                    <a class="sidebar-brand" href="javascript:void(0)">
                         <span class="align-middle">SIPENSI
                              <sup><small class="badge bg-primary text-uppercase"><?= $tahunAjaranAktif->nama ?></small></sup></span>
                    </a>

                    <ul class="sidebar-nav">
                         <?= $this->include('layout/menu') ?>
                    </ul>
               </div>
          </nav>

          <div class="main">
               <nav class="navbar navbar-expand navbar-light navbar-bg">
                    <?= $this->include('layout/navbar') ?>
               </nav>


               <main class="content">
                    <div class="container-fluid p-0">
                         <?php if (session()->has('error')) { ?>
                              <div class="alert alert-danger">
                                   <p class="m-0"><b><i class="align-middle me-1" data-feather="alert-triangle"></i> ERROR : </b></p>
                                   <?= session('error'); ?>
                              </div>
                         <?php } ?>
                         <?php if (session()->has('success')) { ?>
                              <div class="alert alert-success">
                                   <i class="align-middle me-1" data-feather="info"></i> <?= session('success'); ?>
                              </div>
                         <?php } ?>
                         <?= $this->renderSection('content') ?>
                    </div>
               </main>

               <footer class="footer">
                    <div class="container-fluid">
                         <div class="row text-muted">
                              <div class="col-6 text-start">
                                   <p class="mb-0">
                                        &copy; <?= date('Y') ?> <a class="text-muted" href="https://www.stmik-wp.ac.id/" target="_blank"><strong>STMIK Widya Pratama Pekalongan</strong></a>
                                   </p>
                              </div>
                              <div class="col-6 text-end">
                                   <ul class="list-inline">
                                        <li class="list-inline-item">
                                             <span class="text-muted">Version : <strong>1.0.5.7</strong></span>
                                        </li>
                                   </ul>
                              </div>
                         </div>
                    </div>
               </footer>
          </div>
     </div>

     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     <?= $this->renderSection('script') ?>
     <script src="<?= base_url('js/app.js') ?>"></script>
     <script src="<?= base_url('js/app-data.js') ?>"></script>
</body>

</html>