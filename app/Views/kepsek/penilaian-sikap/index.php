<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<h1 class="h3 mb-3">FORM PENILAIAN</h1>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center m-0">TAHUN AJARAN <?= $tahunAjaran->nama ?></h2>
                <form action="javascript:void(0)" id="formKelas" class="m-0" method="post">
                    <input type="hidden" name="tahun_ajaran" id="tahun_ajaran" value="<?= $tahunAjaran->id ?>">
                    <label class="form-label">PILIH KELAS</label>
                    <div class="input-group">
                        <select name="kelas" required id="kelas" class="form-control">
                            <option value="">-- Pilih salah satu --</option>
                            <?php foreach ($kelas as $k) : ?>
                                <option value="<?= $k->id ?>"><?= $k->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type=" submit" class="btn btn-primary"><i class="align-middle me-1" data-feather="save"></i> NILAI</button>
                    </div>
                </form>
                <div id="dataPenilaian"></div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
    function pilihKelas() {
        var kelas = $('#kelas').val();
        if (kelas) {
            $.ajax({
                url: "<?= base_url('kepsek/penilaian-sikap') ?>",
                type: "POST",
                data: {
                    tahun_ajaran: <?= $tahunAjaran->id ?>,
                    kelas: kelas,
                },
                dataType: "JSON",
                success: function(data) {
                    if (data.status) {
                        $("#dataPenilaian").html(data.data);
                    } else {
                        alert(data.message)
                    }
                },
                error: function(a, t, n) {
                    alert(n);
                }
            });
        } else {
            alert('Form kelas belum dipilih dan difilter')
        }
    }
    $("#formKelas").submit(function() {
        pilihKelas()
    });
</script>
<?= $this->endSection() ?>