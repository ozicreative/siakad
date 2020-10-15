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
                            <th width="25px">No</th>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Pelajaran</th>
                            <th>Guru</th>
                            <th width="17%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($jadwal as $key => $value) { ?>
                            <tr>
                                <td><?= $no++;  ?></td>
                                <td><?= $value['lvl_kelas'];  ?> - <?= $value['nama_kelas'];  ?></td>
                                <td><?= $value['hari']; ?></td>
                                <td><?= date('H:i', strtotime($value['mulai']));  ?> - <?= date('H:i', strtotime($value['selesai']));  ?></td>
                                <td><?= $value['nama_pelajaran']; ?></td>
                                <td><?= $value['nama_guru']; ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_kelas']; ?>"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger btn-sm btnhapus" data-toggle="modal" data-target="#delete<?= $value['id_kelas']; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
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
                <h4 class="modal-title">Buat Jadwal</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('kelas/add')
                ?>

                <div class="form-group row">
                    <div class="form-group col-lg-6">
                        <label>Kelas</label>
                        <select name="kelas_id" id="kelas_id" class="form-control">
                            <option>- pilih kelas -</option>
                            <?php foreach ($kelas as $key => $value) { ?>
                                <option value="<?= $value['id_kelas'] ?>"><?= $value['lvl_kelas'] ?> - <?= $value['nama_kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Hari</label>
                        <select name="hari" id="hari" class="form-control" required>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-6">
                    <label>Pelajaran</label>
                        <select name="pelajaran_id" id="pelajaran_id" class="form-control" required>
                            <option>- pilih mapel -</option>
                            <?php foreach ($pelajaran as $key => $value) { ?>
                                <option value="<?= $value['id_pelajaran'] ?>"><?= $value['nama_pelajaran'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-3">
                        <label>Start</label>
                        <input type="time" name="mulai" class="form-control">
                    </div>
                    <div class="form-group col-md-3">
                        <label>End</label>
                        <input type="time" name="selesai" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label>Guru</label>
                        <select name="guru_id" id="guru_id" class="form-control" required>
                            <option>- pilih guru -</option>
                            <?php foreach ($guru as $key => $value) { ?>
                                <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
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
    <?php foreach ($jadwal as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value['id_kelas']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Kelas</h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        echo form_open('kelas/edit/' . $value['id_kelas'])
                        ?>

                        <div class="form-group">
                            <label>Jurusan</label>
                            <input name="nama_kelas" value="<?= $value['nama_kelas']; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="lvl_kelas" class="form-control">
                                <option><?= $value['lvl_kelas'] ?></option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="active" class="form-control">
                                <option value="<?= $value['active'] ?>"><?= $value['nama_active'] ?></option>
                                <option value="1">Aktif</option>
                                <option value="2">Nonaktif</option>
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
    <?php foreach ($jadwal as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_kelas']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Kelas</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Yakin ingin menghapus data <b><?= $value['nama_kelas']; ?></b>...?</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="<?= base_url('kelas/delete/' . $value['id_kelas']) ?>" type="submit" class="btn btn-danger">Confirm</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>
    <!-- /.End modal Delete-->