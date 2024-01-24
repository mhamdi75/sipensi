<!DOCTYPE html>
<html>

<head>
     <title>TAHUN AJARAN <?= $tahunAjaran->nama ?> - KELAS <?= $kelas->nama ?> - <?= $guruMapel->nama_mapel ?></title>
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
                                        <td align="center" style="color: black; font-family: 'Times New Roman'; font-size: 18px;font-weight: bold">TAHUN AJARAN <?= $tahunAjaran->nama ?></td>
                                   </tr>
                              </table>
                              <table class="table-sm mt-5">
                                   <tr>
                                        <td><b>KELAS</b></td>
                                        <td class="w-1">:</td>
                                        <td><?= $kelas->nama ?></td>
                                   </tr>
                                   <tr>
                                        <td><b>MATA PELAJARAN</b></td>
                                        <td class="w-1">:</td>
                                        <td><?= $guruMapel->nama_mapel ?></td>
                                   </tr>
                              </table>
                              <h3>NILAI</h3>
                              <table width="95%" style="margin-left: 2.5%;margin-right: 2.5%;border-collapse: collapse" cellpadding="3" cellspacing="3" border="1">
                                   <tr>
                                        <th class="w-1">NO</th>
                                        <th class="w-1">NIS</th>
                                        <th>NAMA</th>
                                        <?php foreach ($kategoriNilai as $n => $k) : ?>
                                             <th class="w-10 text-center"><?= $k->nama ?></th>
                                        <?php endforeach; ?>
                                        <th class="w-10 text-center">RATA-RATA</th>
                                   </tr>
                                   <?php
                                   $jmlKN = count($kategoriNilai);
                                   $jmlSiswa = count($siswa);
                                   $rataNasional = 0;
                                   $rata = 0;
                                   $statusForm = false;
                                   foreach ($siswa as $nomor => $s) : ?>
                                        <tr>
                                             <td class="w-1"><?= ++$nomor ?></td>
                                             <td class="w-1"><?= $s->nis ?></td>
                                             <td><?= $s->nama ?></td>
                                             <?php
                                             $nilai = 0;
                                             foreach ($kategoriNilai as $n => $k) :
                                                  $dataNilai = $db->table('nilai')->select(['nilai', 'status'])->where(['tahun_ajaran_detail_id' => $s->tad_id, 'kategori_nilai_id' => $k->id, 'guru_mapel_detail_id' => $gmd])->get()->getRow();
                                             ?>
                                                  <?php
                                                  if (isset($dataNilai) && $dataNilai->status === '2') {
                                                       $nilai += $dataNilai->nilai;
                                                  ?>
                                                       <td class="text-end"> <?= isset($dataNilai) ? $dataNilai->nilai : '0' ?> </td>
                                                  <?php } else {
                                                       $statusForm = true;
                                                  ?>
                                                       <td class="text-end"><input type="number" required class="form-control form-control-sm inputanNilai" data-kn="<?= $k->id ?>" data-tad="<?= $s->tad_id ?>" value="<?= isset($dataNilai) ? $dataNilai->nilai : '' ?>" placeholder="Nilai"></td>
                                                  <?php } ?>
                                             <?php endforeach;
                                             $rata = round($nilai / $jmlKN, 2);
                                             $rataNasional += $rata;
                                             ?>
                                             <td class="text-end fw-bold"><?= $rata ?></td>
                                        </tr>
                                   <?php endforeach; ?>
                                   <tr>
                                        <td colspan="<?= $jmlKN + 3 ?>" class="text-center h4">RATA - RATA SELURUHNYA</td>
                                        <td class="text-end h4"><?= $rataNasional > 1 ? round($rataNasional / $jmlSiswa, 2) : 0 ?></td>
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