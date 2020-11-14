<div class="row">
    <div class="col-md-12">
        <div class="card card-info card-outline">
            <div class="card-header">
                <div class="card-tools float-right">
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#"><i class="fa fa-plus"></i> <b>Export Data</b></button>
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> <b>Tambah Data</b></button>
                </div>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-info alert-dismissible">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                } ?>
                <table class="table table-bordered table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>Guru</th>
                            <th>Kelas</th>
                            <th>Pelajaran</th>
                            <th>Tanggal</th>
                            <th>Materi</th>
                            <th>Hadir/Tidak Hadir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datagrid as $key => $value) : ?>
                            <tr>
                                <td><?= $value['guru'] ?></td>
                                <td><?= $value['kelas'] ?></td>
                                <td><?= $value['pelajaran'] ?></td>
                                <td><?= date('d-m-Y', strtotime($value['tanggal'])) ?></td>
                                <td><?= $value['materi'] ?></td>
                                <td><?= $value['t_hadir'] ?>/<?= $value['t_tdkhadir'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btn-xs btn-edit" data-toggle="modal" data-target="#edit<?= $value['id_kbm']; ?>"><i class="fas fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_kbm']; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
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
<!-- /.modal Add-->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('kbm/add')
                ?>

                <div class="form-group row">
                    <div class="form-group col-lg">
                        <label>Jadwal</label>
                        <select id="jadwal_id" name="jadwal_id" class="form-control">
                            <option>-Pilih Jadwal-</option>
                            <?php foreach ($datajadwal as $row) : ?>
                                <option value="<?= $row['id_jadwal'] ?>"><?= $row['pelajaran'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-lg-6">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>
                    <div class="form-group col-lg-3">
                        <label>Siswa Hadir</label>
                        <input type="number" name="hadir" class="form-control">
                    </div>
                    <div class="form-group col-lg-3">
                        <label>Tidak Hadir</label>
                        <input type="number" name="tdkhadir" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label>Materi</label>
                    <input type="text" name="materi" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.End modal Add-->

<!-- /.Modal Edit -->
<?php foreach ($datagrid as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_kbm']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('kbm/edit' . $value['id_kbm'])
                    ?>

                    <div class="form-group row">
                        <div class="form-group col-lg">
                            <label>Jadwal</label>
                            <select id="jadwal_id" name="jadwal_id" class="form-control">
                                <?php foreach ($datajadwal as $key => $row) { ?>
                                    <option value="<?= $row['id_jadwal'] ?>" <?php if ($value['jadwal_id'] == $row['id_jadwal']) {
                                                                                    echo "selected";
                                                                                } ?>><?= $row['pelajaran'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-lg-6">
                            <label>Tanggal</label>
                            <input type="date" value="<?= $value['tanggal']; ?>" name="tanggal" class="form-control">
                        </div>
                        <div class="form-group col-lg-3">
                            <label>Siswa Hadir</label>
                            <input type="number" value="<?= $value['t_hadir']; ?>" name="hadir" class="form-control">
                        </div>
                        <div class="form-group col-lg-3">
                            <label>Tidak Hadir</label>
                            <input type="number" value="<?= $value['t_tdkhadir']; ?>" name="tdkhadir" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-lg-8">
                            <label>Materi</label>
                            <input type="text" value="<?= $value['materi']; ?>" name="materi" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>