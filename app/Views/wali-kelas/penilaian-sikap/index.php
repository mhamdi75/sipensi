<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-3">FORM PENILAIAN</h1>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center m-0">TAHUN AJARAN <?= $tahunAjaran->nama ?></h2>
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
                        <ul>
                            <li class="text-danger">Data yang sudah disimpan tidak bisa diubah kembali</li>
                            <li class="text-danger">Klik tombol simpan untuk melihat rata-rata</li>
                        </ul>
                        <div class="d-grid gap-2">
                            <!-- <button type="submit" class="btn btn-lg btn-primary" onclick="return confirm('Apakah anda yakin ingi menyelesaikan penginputan nilai ini?')">SIMPAN</button> -->
                            <button type="submit" class="btn btn-lg btn-primary">SIMPAN</button>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>