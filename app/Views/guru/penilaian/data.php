<h3 class="text-center m-1">KELAS <?= $kelas->nama ?></h3>
<form action="javascript:void(0)" method="post" id="formPenilaian">
     <table class="table table-sm table-bordered">
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

     <?php if ($statusForm) { ?>
          <ul>
               <li class="text-danger">Data yang sudah disimpan tidak bisa diubah kembali</li>
               <li class="text-danger">Klik tombol simpan untuk melihat rata-rata</li>
          </ul>
          <div class="d-grid gap-2">
               <!-- <button type="submit" class="btn btn-lg btn-primary" onclick="return confirm('Apakah anda yakin ingi menyelesaikan penginputan nilai ini?')">SIMPAN</button> -->
               <button type="submit" class="btn btn-lg btn-primary">SIMPAN</button>
          </div>
     <?php } else { ?>
          <a href="<?= base_url('guru/penilaian/cetak/' . $tahun_ajaran . '/' . $gmd . '/' . $kelas->id) ?>" target="_blank" class="btn btn-primary">CETAK</a>
     <?php } ?>
</form>
<script>
     $(".inputanNilai").change(function() {
          var kn = $(this).data('kn');
          var tad = $(this).data('tad');
          if (kn && tad) {
               $.ajax({
                    url: "<?= base_url('guru/penilaian/aksi') ?>",
                    type: "POST",
                    data: {
                         kn: kn,
                         tad: tad,
                         gmd: <?= $gmd ?>,
                         nilai: $(this).val(),
                    },
                    dataType: "JSON",
                    success: function(data) {
                         if (!data.status) {
                              alert(data.message)
                         }
                    },
                    error: function(a, t, n) {
                         alert(n);
                    }
               });
          } else {
               alert('ID Data tidak valid')
          }
     });
     $("#formPenilaian").submit(function() {
          $.ajax({
               url: "<?= base_url('guru/penilaian/selesai') ?>",
               type: "POST",
               data: {
                    tahun_ajaran: <?= $tahun_ajaran ?>,
                    kelas: <?= $kelas->id ?>,
                    gmd: <?= $gmd ?>,
               },
               dataType: "JSON",
               success: function(data) {
                    if (data.status) {
                         pilihKelas()
                    } else {
                         alert(data.message)
                    }
               },
               error: function(a, t, n) {
                    alert(n);
               }
          });
     });
</script>