<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header with-border">
                <div class="card-tools pull-right">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> <b>Tambah User</b></button>
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
                <table class="table table-bordered table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($user as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nama_user']; ?></td>
                                <td><?= $value['email']; ?></td>
                                <td><?= $value['username']; ?></td>
                                <td>
                                    <?php if ($value['level'] == 1) {
                                        echo 'Root';
                                    } elseif ($value['level'] == 2) {
                                        echo 'Admin';
                                    } elseif ($value['level'] == 3) {
                                        echo 'Guru';
                                    } elseif ($value['level'] == 4) {
                                        echo 'Kepala Sekolah';
                                    } elseif ($value['level'] == 5) {
                                        echo 'Wali Siswa';
                                    } elseif ($value['level'] == 6) {
                                        echo 'Siswa';
                                    } ?>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btn-xs btn-edit" data-toggle="modal" data-target="#edit<?= $value['id_user']; ?>"><i class="fas fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_user']; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div> <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.modal Add-->
<div class="modal fade" id="add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah User</h4>
            </div>
            <div class="modal-body">

                <?php
                echo form_open('user/add')
                ?>

                <div class="form-group row">
                    <div class="form-group col-lg-6">
                        <label>Nama</label>
                        <input name="nama_user" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-lg-6">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-lg-6">
                        <label>Level</label>
                        <select name="level" id="level" class="form-control" required>
                            <option>-level-</option>
                            <option value="3">Guru</option>
                            <option value="4">Kepala Sekolah</option>
                            <option value="5">Wali Siswa</option>
                            <option value="6">Siswa</option>
                        </select>
                    </div>
                </div>
                <div class="form-group float-right">
                    <button type="submit" class="btn btn-danger btn-md">Simpan</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.End modal Add-->

<!-- /.modal Edit-->
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_user']; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                </div>
                <div class="modal-body">

                    <?php
                    echo form_open('user/edit/' . $value['id_user'])
                    ?>

                    <div class="form-group row">
                        <div class="form-group col-lg-6">
                            <label>Nama</label>
                            <input name="nama_user" value="<?= $value['nama_user']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Email</label>
                            <input name="email" value="<?= $value['email']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-lg-6">
                            <label>Username</label>
                            <input name="username" value="<?= $value['username']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Password</label>
                            <input name="password" value="<?= $value['password']; ?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-lg-6">
                            <label>Foto</label>
                            <input name="img" value="<?= $value['img']; ?>" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Level</label>
                            <input type="text" name="level" id="level" class="form-control" value="
                            <?php if ($value['level'] == 1) {
                                echo 'Root';
                            } elseif ($value['level'] == 2) {
                                echo 'Admin';
                            } elseif ($value['level'] == 3) {
                                echo 'Guru';
                            } elseif ($value['level'] == 4) {
                                echo 'Kepala Sekolah';
                            } elseif ($value['level'] == 5) {
                                echo 'Wali Siswa';
                            } elseif ($value['level'] == 6) {
                                echo 'Siswa';
                            } ?>" readonly>
                        </div>
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
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_user']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus User</h4>
                </div>
                <div class="modal-body">
                    <h4>Yakin ingin menghapus data <b><?= $value['nama_user']; ?></b>...?</h4>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('user/delete/' . $value['id_user']) ?>" type="submit" class="btn btn-danger">Confirm</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.End modal Delete-->