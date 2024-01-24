<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link rel="icon" href="<?= base_url('img/logo.png') ?>" />

     <title>Login</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?= base_url('css/app.css') ?>" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
     <main class="d-flex w-100">
          <div class="container d-flex flex-column">
               <div class="row vh-100">
                    <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                         <div class="d-table-cell align-middle">

                              <div class="text-center mt-4">
                                   <h1 class="h2">SELAMAT DATANG</h1>
                                   <p class="lead m-0">DI SISTEM INFORMASI PENILAIAN SISWA</p>
                                   <p class="lead m-0 mb-3">SMA NEGERI 1 KANDANG SERANG</p>
                              </div>

                              <div class="card">
                                   <div class="card-body">
                                        <div class="m-sm-4">
                                             <div class="text-center">
                                                  <img src="<?= base_url('img/logo.png') ?>" alt="Logo Polres Jawa Tengah" class="img-fluid" width="150" />
                                             </div>
                                             <form action="<?= base_url('validasi') ?>" method="post">
                                                  <?php if (session()->has('error')) { ?>
                                                       <div class="alert alert-danger">
                                                            <p class="m-0"><i class="align-middle me-1" data-feather="alert-triangle"></i><b> ERROR :</b></p>
                                                            <?= session('error'); ?>
                                                       </div>
                                                  <?php } ?>
                                                  <?php if (session()->has('success')) { ?>
                                                       <div class="alert alert-success">
                                                            <i class="align-middle me-1" data-feather="info"></i> <?= session('success'); ?>
                                                       </div>
                                                  <?php } ?>
                                                  <div class="mb-3">
                                                       <label class="form-label">Username</label>
                                                       <input class="form-control form-control-lg" required value="<?= old('username'); ?>" type="username" name="username" placeholder="Masukan username Anda" />
                                                  </div>
                                                  <div class="mb-3">
                                                       <label class="form-label">Password</label>
                                                       <input class="form-control form-control-lg" required type="password" name="password" placeholder="Masukan password Anda" />
                                                       <small>
                                                            <a href="javascript:void(0)">Lupa Password Anda?</a>
                                                       </small>
                                                  </div>
                                                  <div class="mb-3">
                                                       <label class="form-label">Hak Akses</label>
                                                       <select name="hak_akses" id="hak_akses" required class="form-control form-control-lg">
                                                            <option value="">Pilih salah satu</option>
                                                            <option <?= old('hak_akses') == 1 ? 'selected ' : ''; ?>value="1">Admin</option>
                                                            <option <?= old('hak_akses') == 2 ? 'selected ' : ''; ?>value="2">Guru</option>
                                                            <option <?= old('hak_akses') == 3 ? 'selected ' : ''; ?>value="3">Siswa</option>
                                                            <option <?= old('hak_akses') == 4 ? 'selected ' : ''; ?>value="4">Kepala Sekolah/Wakil Ketua Kurikulum</option>
                                                            <option <?= old('hak_akses') == 5 ? 'selected ' : ''; ?>value="5">Guru Bimbingan Konseling</option>
                                                            <option <?= old('hak_akses') == 6 ? 'selected ' : ''; ?>value="6">Wali Kelas</option>
                                                       </select>
                                                  </div>
                                                  <div class="text-center mt-3">
                                                       <button type="submit" class="btn btn-lg btn-primary"><i class="align-middle me-1" data-feather="log-in"></i> Masuk</button>
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                              </div>

                         </div>
                    </div>
               </div>
          </div>
     </main>

     <script src="js/app.js"></script>

</body>

</html>