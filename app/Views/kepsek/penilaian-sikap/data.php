<h3 class="text-center m-1">KELAS <?= $kelas->nama ?></h3>
<form action="javascript:void(0)" method="post" id="formPenilaian">
     <table class="table table-sm table-bordered">
          <tr>
               <th class="w-1">NO</th>
               <th class="w-1">NIS</th>
               <th>NAMA</th>
               <?php foreach ($kategoriSikap as $n => $k) : ?>
                    <th class="w-10 text-center"><?= $k->nama ?></th>
               <?php endforeach; ?>
               <th class="w-10 text-center">RATA-RATA</th>
               <th class="w-10 text-center"></th>
          </tr>
          <?php
          $jmlKN = count($kategoriSikap);
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
                    foreach ($kategoriSikap as $n => $k) :
                         $dataNilai = $db->table('nilai_sikap')->select(['nilai', 'status'])->where(['tahun_ajaran_detail_id' => $s->tad_id, 'kategori_sikap_id' => $k->id])->get()->getRow();
                         if (isset($dataNilai) && $dataNilai->status === '2') {
                              $nilai += $dataNilai->nilai;
                         } else {
                              $statusForm = true;
                         }
                    ?>
                         <td class="text-end"> <?= isset($dataNilai) ? $dataNilai->nilai : '0' ?> </td>
                    <?php endforeach;
                    $rata = round($nilai / $jmlKN, 2);
                    $rataNasional += $rata;
                    ?>
                    <td class="text-end fw-bold"><?= $rata ?></td>
                    <td class="text-end fw-bold"><?= nilaiSikap($rata) ?></td>
               </tr>
          <?php endforeach; ?>
          <tr>
               <td colspan="<?= $jmlKN + 3 ?>" class="text-center h4">RATA - RATA SELURUHNYA</td>
               <td class="text-end h4"><?= $rataNasional > 1 ? round($rataNasional / $jmlSiswa, 2) : 0 ?></td>
               <td class="text-end h4"><?= $rataNasional > 1 ? nilaiSikap(round($rataNasional / $jmlSiswa, 2)) : 0 ?></td>
          </tr>
     </table>
     <?php if ($statusForm) { ?>
          <h1 class="text-center text-danger">DATA NILAI BELUM FINAL</h1>
     <?php } ?>
</form>