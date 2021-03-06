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
                            <th width="8%">NISN</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th width="5%">Gen</th>
                            <th>Tgl Lahir</th>
                            <th>Kelahiran</th>
                            <th width="10px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($siswa as $key => $value) { ?>
                            <tr>
                                <td><?= $value['nisn'];  ?></td>
                                <td><?= $value['nama_siswa'];  ?></td>
                                <td><?= $value['lvl_kelas'];  ?></td>
                                <td><?= $value['alamat'];  ?></td>
                                <td><?= $value['gender'];  ?></td>
                                <td><?= date('d-m-Y', strtotime($value["tgl_lhr"]));  ?></td>
                                <td><?= $value['kelahiran'];  ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#edit<?= $value['id_siswa']; ?>" role="button" class="btn btn-sm btn-warning" data-toggle="modal" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="#delete<?= $value['id_siswa']; ?>" role="button" class="btn btn-sm btn-danger" data-toggle="modal" data-placement="top" title="Hapus"><i class="fas fa-trash-alt"></i></a>
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
            <div class="modal-body">
                <?php
                echo form_open('siswa/add')
                ?>

                <div class="form-group row">
                    <div class="form-group col-lg-6">
                        <label>NISN</label>
                        <input name="nisn" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tgl_lhr" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-lg-6">
                        <label>Nama</label>
                        <input type="text" name="nama_siswa" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Kota Kelahiran</label>
                        <input type="text" name="kelahiran" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-lg-6">
                        <label>Jenis Kelamin</label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option>-gender-</option>
                            <option value="L">Laki - laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-lg-6">
                        <label>Periode</label>
                        <input type="date('Y')" name="periode" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Kelas</label>
                        <select name="kelas_id" id="kelas_id" class="form-control" required>
                            <option>- pilih kelas -</option>
                            <?php foreach ($kelas as $key => $value) { ?>
                                <option value="<?= $value['id_kelas'] ?>"><?= $value['nama_kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="active" id="active" class="form-control">
                        <option>-Status-</option>
                        <option value="1">Aktif</option>
                        <option value="2">Nonaktif</option>
                    </select>
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
<?php foreach ($siswa as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_siswa']; ?>">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Data Siswa</h5>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('siswa/edit/' . $value['id_siswa'])
                    ?>

                    <div class="form-group row">
                        <div class="form-group col-lg-6">
                            <label>NISN</label>
                            <input name="nisn" value="<?= $value['nisn'] ?>" class="form-control" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Tanggal Lahir</label>
                            <input type="date" value="<?= $value['tgl_lhr'] ?>" name="tgl_lhr" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-lg-6">
                            <label>Nama</label>
                            <input type="text" value="<?= $value['nama_siswa'] ?>" name="nama_siswa" class="form-control" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Kota Kelahiran</label>
                            <input type="text" value="<?= $value['kelahiran'] ?>" name="kelahiran" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-lg-6">
                            <label>Jenis Kelamin</label>
                            <select name="gender" class="form-control">
                                <option><?= $value['gender'] ?></option>
                                <option value="L">Laki - laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Alamat</label>
                            <input type="text" value="<?= $value['alamat'] ?>" name="alamat" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-lg-6">
                            <label>Periode</label>
                            <input type="number" value="<?= $value['periode'] ?>" name="periode" class="form-control" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label>Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control" required>
                                <option><?= $value['lvl_kelas'] ?></option>
                                <?php foreach ($kelas as $key => $value) { ?>
                                    <option value="<?= $value['id_kelas'] ?>"><?= $value['nama_kelas'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="active" class="form-control">
                            <option value="1">Active</option>
                            <option value="2">Nonactive</option>
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
<?php foreach ($siswa as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_siswa']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data Siswa</h4>
                </div>
                <div class="modal-body">
                    <h4>Yakin ingin menghapus data <b><?= $value['nama_siswa']; ?></b>...?</h4>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('siswa/delete/' . $value['id_siswa']) ?>" type="submit" class="btn btn-danger">Confirm</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.End modal Delete-->