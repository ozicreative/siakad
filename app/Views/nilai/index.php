<div class="row">
    <div class="col-md-12">
        <div class="card card-info card-outline">
            <div class="card-header">
                <div class="card-tools float-right">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> <b>New Data</b></button>
                </div>
            </div>
            <div class="card-body">

                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>

                <table class="table table-bordered" id="table1">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kelas</th>
                            <th>Pelajaran</th>
                            <th>Jenis Ujian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($datagrid as $row) : ?>
                            <tr>
                                <td><?= $row['tanggal']; ?></td>
                                <td><?= $row['nama_kelas']; ?></td>
                                <td><?= $row['pelajaran']; ?></td>
                                <td><?= $row['jenis']; ?></td>
                                <td>
                                    <a href="<?= base_url('nilai/view/' . $row['key_nilai']); ?>" class="btn btn-info btn-xs"><i class="fas fa-eye"></i> Lihat</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal add-->
<div id="add" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buat Nilai</h4>
            </div>
            <div class="modal-body">

                <?php echo form_open('nilai/generate') ?>

                <div class="form-group row">
                    <div class="form-group col-lg-6">
                        <label for="kelas_id">Kelas</label>
                        <select id="kelas_id" name="kelas_id" class="form-control">
                            <option>- pilih kelas -</option>
                            <?php foreach ($datakelas as $row) : ?>
                                <option value="<?= $row['id_kelas'] ?>"><?= $row['nama_kelas'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="tanggal">Tanggal</label>
                        <input id="tanggal" name="tanggal" type="date" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-lg-6">
                        <label for="pelajaran_id">Pelajaran</label>
                        <select id="pelajaran_id" name="pelajaran_id" class="form-control">
                            <option>- pilih pelajaran -</option>
                            <?php foreach ($datamapel as $row) : ?>
                                <option value="<?= $row['id_pelajaran'] ?>"><?= $row['nama_pelajaran'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="jenis">Jenis Ujian</label>
                        <select name="jenis" class="form-control">
                            <option>-pilih-</option>
                            <option value="UTS">UTS</option>
                            <option value="UAS">UAS</option>
                            <option value="Praktek">Praktek</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Generate</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<!-- End Modal add-->