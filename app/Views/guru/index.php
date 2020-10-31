<div class="row">
    <div class="col-md-12">
        <div class="card card-info card-outline">
            <div class="card-header">
                <div class="card-tools float-right">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> <b>New Data</b></button>
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
                            <th width="30px">No</th>
                            <th>NUPTK</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($guru as $key => $value) { ?>
                            <tr>
                                <td><?= $no++;  ?></td>
                                <td><?= $value['nuptk'];  ?></td>
                                <td><?= $value['nama_guru'];  ?></td>
                                <td><?= $value['nama_active'];  ?></td>
                                <td>
                                    <div class="btn-group">
                                    <!-- <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#edit<?= $value['id_guru']; ?>"><i class="fas fa-eye"></i> View</button> -->
                                    <button class="btn btn-warning btn-xs btn-edit" data-toggle="modal" data-target="#edit<?= $value['id_guru']; ?>"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_guru']; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    </div>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Guru</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('guru/add')
                ?>

                <div class="form-group row">
                    <div class="form-group col-lg-6">
                        <label>NUPTK</label>
                        <input name="nuptk" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Nama Guru</label>
                        <input name="nama_guru" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-lg-6">
                        <label>Kelahiran</label>
                        <input name="kelahiran" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Tgl Lahir</label>
                        <input type="date" name="tgl_lhr" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="active" id="active" class="form-control" required>
                        <option>- status -</option>
                        <?php foreach ($tbl_active as $key => $value) { ?>
                            <option value="<?= $value['id_active'] ?>"><?= $value['nama_active'] ?></option>
                        <?php } ?>
                    </select>
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
<?php foreach ($guru as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_guru']; ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Guru</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('guru/edit/' . $value['id_guru'])
                    ?>

                    <div class="form-group row">
                        <div class="form-group col-lg-6">
                            <label>NUPTK</label>
                            <input name="nuptk" value="<?= $value['nuptk']; ?>" class="form-control" readonly>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Nama Guru</label>
                            <input type="text" name="nama_guru" value="<?= $value['nama_guru']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-lg-6">
                            <label>Kelahiran</label>
                            <input type="text" name="kelahiran" value="<?= $value['kelahiran']; ?>" class="form-control" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Tgl Lahir</label>
                            <input type="date" name="tgl_lhr" value="<?= $value['tgl_lhr']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="active" class="form-control" required>
                            <option value="1" <?php echo ($value['active'] == 1) ? 'selected' : ''; ?>>Active</option>
                            <option value="2" <?php echo ($value['active'] == 2) ? 'selected' : ''; ?>>Nonactive</option>
                        </select>
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
<?php foreach ($guru as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_guru']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Guru</h4>
                </div>
                <div class="modal-body">
                    <h4>Yakin ingin menghapus data <b><?= $value['nama_guru']; ?></b>...?</h4>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('guru/delete/' . $value['id_guru']) ?>" type="submit" class="btn btn-danger">Confirm</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.End modal Delete-->