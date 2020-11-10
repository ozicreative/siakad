<div class="row">
    <div class="col-md-12">
        <div class="card card-info card-outline">
            <div class="card-header">
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
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th width="22%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($datagrid as $row) : ?>
                            <tr>
                                <td><?= $row['tanggal'] ?></td>
                                <td><?= $row['nama_siswa'] ?></td>
                                <td><?= $row['klas'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td><?= $row['keterangan'] ?></td>
                                <td>
                                    <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $row['id_kehadiran']; ?>"><i class="fas fa-edit"></i> Edit</button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.modal Edit-->
<?php foreach ($datagrid as $row) : ?>
    <div class="modal fade" id="edit<?= $row['id_kehadiran']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kehadiran Siswa</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('kehadiran/edit/' . $row['id_kehadiran'])
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