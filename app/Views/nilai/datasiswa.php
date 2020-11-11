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
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Pelajaran</th>
                            <th>Jenis Ujian</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($datagrid as $row) : ?>
                            <tr>
                                <td><?= $row['nama_siswa'] ?></td>
                                <td><?= $row['kelas'] ?></td>
                                <td><?= $row['pelajaran'] ?></td>
                                <td><?= $row['jenis'] ?></td>
                                <td><?= $row['total_nilai'] ?></td>
                                <td>
                                    <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $row['id_nilai']; ?>"><i class="fas fa-edit"></i> Edit</button>
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
    <div class="modal fade" id="edit<?= $row['id_nilai']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kehadiran Siswa</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('nilai/edit/' . $row['id_nilai'])
                    ?>

                    <div class="form-group">
                        <label>Nilai</label>
                        <input type="number" name="total_nilai" value="<?= $row['total_nilai']; ?>" class="form-control">
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