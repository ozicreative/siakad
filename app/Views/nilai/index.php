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
                                <td><?= $row['tanggal']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $row['id_nilai']; ?>"><i class="fas fa-edit"></i> Edit</button>
                                    </div>
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
                <h4 class="modal-title">Buat Kehadiran</h4>
            </div>
            <div class="modal-body">

                <?php echo form_open('kehadiran/generate') ?>
                <!-- <form class="form-horizontal" role="form" method="post" id="myform"> -->

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
                <!-- </form> -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Generate</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<!-- End Modal add-->
<!-- /.modal Edit-->
<?php foreach ($datagrid as $row) : ?>
    <div class="modal fade" id="edit<?= $row['id_nilai']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kehadiran Siswa</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('kehadiran/edit/' . $row['id_nilai'])
                    ?>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="MASUK" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>Masuk</option>
                            <option value="ALPHA" <?php echo ($row['status'] == 2) ? 'selected' : ''; ?>>Alpha</option>
                            <option value="SAKIT" <?php echo ($row['status'] == 3) ? 'selected' : ''; ?>>Sakit</option>
                            <option value="IJIN" <?php echo ($row['status'] == 4) ? 'selected' : ''; ?>>Ijin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input name="keterangan" value="<?= $row['keterangan']; ?>" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php endforeach ?>
<!-- /.End modal Edit-->