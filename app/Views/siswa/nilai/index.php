<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-3">NILAI</h1>
<div class="row">
     <div class="col-12">
          <div class="card">
               <div class="card-body">
                    <?php if ($status) { ?>
                         <h2 class="text-center m-0">TAHUN AJARAN <?= $tahunAjaranAktif->nama ?></h2>
                         <table class="table-sm mt-5">
                              <tr>
                                   <td class="w-8"><b>NIS</b></td>
                                   <td class="w-1">:</td>
                                   <td><?= $dataTAD->nis ?></td>
                              </tr>
                              <tr>
                                   <td><b>NAMA</b></td>
                                   <td class="w-1">:</td>
                                   <td><?= $dataTAD->nama_siswa ?></td>
                              </tr>
                              <tr>
                                   <td><b>JENIS KELAMIN</b></td>
                                   <td class="w-1">:</td>
                                   <td><?= $dataTAD->jk_siswa == 'l' ? 'Laki - Laki' : 'Perempuan' ?></td>
                              </tr>
                              <tr>
                                   <td><b>KELAS</b></td>
                                   <td class="w-1">:</td>
                                   <td><?= $dataTAD->nama_kelas ?></td>
                              </tr>
                         </table>
                         <hr>
                         <h3>NILAI</h3>
                         <table class="table table-sm table-sm table-bordered">
                              <tr>
                                   <th class="w-1">NIP</th>
                                   <th>GURU</th>
                                   <th>MATA PELAJARAN</th>
                                   <?php foreach ($kategoriNilai as $kn) : ?>
                                        <th class="w-10 text-center"><?= $kn->nama ?></th>
                                   <?php endforeach; ?>
                                   <th class="w-10 text-center">RATA - RATA</th>
                              </tr>
                              <?php
                              $jmlKategoriNilai = count($kategoriNilai);
                              $jmlMapel = count($mapel);
                              $rataNasional = 0;
                              foreach ($mapel as $n => $k) :
                                   $rata = 0;
                                   $nilai = 0;
                              ?>
                                   <tr>
                                        <td><?= $k->nip ?></td>
                                        <td><?= $k->nama_guru ?></td>
                                        <td><?= $k->nama_mapel ?></td>
                                        <?php foreach ($kategoriNilai as $kn) :
                                             $dataNilai = $db->table('nilai')->select(['nilai', 'status'])->where(['tahun_ajaran_detail_id' => $dataTAD->tad_id, 'kategori_nilai_id' => $kn->id, 'guru_mapel_detail_id' => $k->gmd_id])->get()->getRow()
                                        ?>
                                             <?php if (isset($dataNilai) && $dataNilai->status === '2') {
                                                  $nilai += $dataNilai->nilai;
                                             ?>
                                                  <td class="text-end"> <?= $dataNilai->nilai ?> </td>
                                             <?php } else { ?>
                                                  <td class="text-center"><span class="badge bg-danger">NILAI BELUM<br>DIMASUKAN</span></td>
                                             <?php } ?>
                                        <?php endforeach;
                                        $rata = round($nilai / $jmlKategoriNilai, 2);
                                        $rataNasional += $rata;
                                        ?>
                                        <td class="text-end fw-bold"> <?= $rata ?> </td>
                                   </tr>
                              <?php endforeach; ?>
                              <tr>
                                   <td colspan="<?= $jmlKategoriNilai + 3 ?>" class="text-center h4">RATA - RATA SELURUHNYA</td>
                                   <td class="text-end h4"><?= $rataNasional > 1 ? round($rataNasional / $jmlMapel, 2) : 0 ?></td>
                              </tr>
                         </table>
                         <h3>NILAI SIKAP</h3>
                         <table class="table table-sm table-sm table-bordered">
                              <tr>
                                   <th class="w-1">NO</th>
                                   <th>KATEGORI SIKAP</th>
                                   <th class="w-1 text-center">NILAI</th>
                                   <th></th>
                              </tr>
                              <?php
                              $jmlKategoriSikap = count($kategoriSikap);
                              $nilai = 0;
                              foreach ($kategoriSikap as $n => $kn) :
                                   $dataNilai = $db->table('nilai_sikap')->select(['nilai', 'status'])->where(['tahun_ajaran_detail_id' => $dataTAD->tad_id, 'kategori_sikap_id' => $kn->id])->get()->getRow()
                              ?>
                                   <tr>
                                        <td><?= ++$n ?></td>
                                        <td><?= $kn->nama ?></td>
                                        <?php if (isset($dataNilai) && $dataNilai->status === '2') {
                                             $nilai += $dataNilai->nilai;
                                        ?>
                                             <td class="text-end"> <?= $dataNilai->nilai ?> </td>
                                             <td><?= nilaiSikap($dataNilai->nilai) ?></td>
                                        <?php } else { ?>
                                             <td class="text-center"><span class="badge bg-danger">NILAI BELUM<br>DIMASUKAN</span></td>
                                             <td>Kurang</td>
                                        <?php } ?>
                                   </tr>
                              <?php endforeach; ?>
                              <tr>
                                   <td colspan="2" class="text-center h4">RATA - RATA SELURUHNYA</td>
                                   <td class="text-end h4"><?= $nilai > 1 ? round($nilai / $jmlKategoriSikap, 2) : 0 ?></td>
                                   <td><?= $nilai > 1 ? nilaiSikap(round($nilai / $jmlKategoriSikap, 2)) : 'Kurang' ?></td>
                              </tr>
                         </table>
                         <a href="<?= base_url('siswa/cetak') ?>" target="_blank" class="btn btn-primary">CETAK</a>
                    <?php } else { ?>
                         <h1 class="text-danger text-center m-0">SISWA BELUM TERDAFTAR DI TAHUN AJARAN <?= $tahunAjaranAktif->nama ?></h1>
                    <?php } ?>
               </div>
          </div>
     </div>
</div>
<?= $this->endSection() ?>