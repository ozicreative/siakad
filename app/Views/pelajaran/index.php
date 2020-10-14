<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <div class="card-tools float-right">
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> <b>New Data</b></button>
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
                            <th width="30px">No</th>
                            <th>Pelajaran</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th width="22%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pelajaran as $key => $value) { ?>
                            <tr>
                                <td><?= $no++;  ?></td>
                                <td><?= $value['nama_pelajaran'];  ?></td>
                                <td><?= $value['kelas_id'];  ?></td>
                                <td><?= $value['nama_active'];  ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_pelajaran']; ?>"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger btn-sm btnhapus" data-toggle="modal" data-target="#delete<?= $value['id_pelajaran']; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.modal Add-->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pelajaran</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('pelajaran/add')
                ?>

                <div class="form-group">
                    <label>Pelajaran</label>
                    <input name="nama_kelas" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <input name="kelas_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input name="active" class="form-control">
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

<!-- /.modal Edit-->
<?php foreach ($pelajaran as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_pelajaran']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Pelajaran</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('pelajaran/edit/' . $value['id_pelajaran'])
                    ?>

                    <div class="form-group">
                        <label>Pelajaran</label>
                        <input name="nama_pelajaran" value="<?= $value['nama_pelajaran']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <input name="kelas_id" value="<?= $value['kelas_id']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input name="active" value="<?= $value['active']; ?>" class="form-control">
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
<?php } ?>
<!-- /.End modal Edit-->

<!-- /.modal Delete-->
<?php foreach ($pelajaran as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_pelajaran']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Pelajaran</h4>
                </div>
                <div class="modal-body">
                    <h4>Yakin ingin menghapus data <b><?= $value['nama_pelajaran']; ?></b>...?</h4>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('pelajaran/delete/' . $value['id_pelajaran']) ?>" type="submit" class="btn btn-danger">Confirm</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.End modal Delete-->