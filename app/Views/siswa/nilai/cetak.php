<!DOCTYPE html>
<html>

<head>
     <title><?= $dataTAD->nis ?> - <?= $dataTAD->nama_siswa ?></title>
     <style type="text/css">
          .page-header,
          .page-header-space {
               height: 0mm;
          }

          .page-footer,
          .page-footer-space {
               height: 1mm;
          }

          .page-footer {
               position: fixed;
               bottom: 20mm;
               width: 100%;
          }

          .page-header {
               position: fixed;
               top: 10mm;
               width: 100%;
          }

          .page {
               /* page-break-after: always; */
               margin-left: 1mm;
               margin-right: 1mm;
          }

          @page {
               margin: 17mm 17mm 17mm 17mm;
          }

          html,
          body {
               width: 210mm;
               height: 297mm;
          }

          @media print {
               thead {
                    display: table-header-group;
               }

               tfoot {
                    display: table-footer-group;
               }

               body {
                    margin: 0;
               }
          }

          table.tbl {
               width: 100%;
               border-collapse: collapse;
          }

          table.tbl th {
               padding: 6px;
          }

          table.tbl td {
               padding: 5px;
          }
     </style>
</head>

<body>
     <div class="page-header" style="text-align: center"></div>
     <table width="100%">
          <thead>
               <tr>
                    <td>
                         <!--place holder for the fixed-position header-->
                         <div class="page-header-space"></div>
                    </td>
               </tr>
          </thead>
          <tbody>
               <tr>
                    <td>
                         <!--*** CONTENT GOES HERE ***-->
                         <div class="page">
                              <table width="95%" style="margin-left: 2.5%;margin-right: 2.5%" cellpadding="0" cellspacing="0" border="0">
                                   <td rowspan="4" width="15%" align="center">
                                        <img style="height : 75px" src="<?= base_url('img/logo.png') ?>" alt="Logo">
                                   </td>
                                   <td align="center">
                                        <span style="color: black; font-family: 'Times New Roman'; font-size: 25px;font-weight: bold;">SMA NEGERI 1 KANDANGSERANG</span><br>
                                        <span style="color: black; font-family: 'Times New Roman'; font-size: 12px;font-weight: bold;"> Jl. Raya Kandangserang, Kandangserang, Kec. Kandangserang, Kab. Pekalongan Prov. Jawa Tengah</span>
                                   </td>
                              </table>
                              <table width="95%" style="margin-left: 2.5%;margin-right: 2.5%;margin-bottom: 1%" cellpadding="1" cellspacing="1" border="1"></table>
                              <table width="95%" style="margin-left: 2.5%;margin-right: 2.5%;margin-bottom: 2.5%;" cellpadding="0" cellspacing="0" border="0">
                                   <tr>
                                        <td align="center" style="color: black; font-family: 'Times New Roman'; font-size: 18px;font-weight: bold">TAHUN AJARAN <?= $tahunAjaranAktif->nama ?></td>
                                   </tr>
                              </table>
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
                              <h3>NILAI</h3>
                              <table width="95%" style="margin-left: 2.5%;margin-right: 2.5%;border-collapse: collapse" cellpadding="3" cellspacing="3" border="1">
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
                              <table width="95%" style="margin-left: 2.5%;margin-right: 2.5%;border-collapse: collapse" cellpadding="3" cellspacing="3" border="1">
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
                         </div>
                    </td>
               </tr>
          </tbody>
          <tfoot>
               <tr>
                    <td>
                         <!--place holder for the fixed-position footer-->
                         <div class="page-footer-space">
                         </div>
                    </td>
               </tr>
          </tfoot>
     </table>
     <div class="page-footer">
     </div>
     <script type="text/javascript">
          window.print();
          window.focus();
          window.onafterprint = function() {
               window.close();
          }
     </script>
</body>

</html>