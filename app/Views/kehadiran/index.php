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
                            <th>Total</th>
                            <th>Masuk</th>
                            <th>Ijin</th>
                            <th>Alpha</th>
                            <th>Sakit</th>
                            <th width="22%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($kehadiran as $key => $row) { ?>
                            <tr>
                                <td><?= $row["tanggal"];  ?></td>
                                <td><?= $row['nama_kelas'];  ?></td>
                                <td><?= $row['TOTAL'];  ?></td>
                                <td><?= $row['MASUK'];  ?></td>
                                <td><?= $row['IJIN'];  ?></td>
                                <td><?= $row['ALPHA'];  ?></td>
                                <td><?= $row['SAKIT'];  ?></td>
                                <td>
                                    <a href="<?= base_url('kehadiran/view/'.$row['key_kehadiran']); ?>" class="btn btn-info btn-xs"><i class="fas fa-eye"></i> Lihat</a>
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
                <h4 class="modal-title">Buat Kehadiran</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('kehadiran/add')
                ?>
                <div class="form-group row">
                    <div class="form-group col-lg-6">
                        <label>Kelas</label>
                        <select name="kelas_id" id="kelas_id" class="form-control" required>
                            <option>- pilih kelas -</option>
                            <?php foreach ($kelas as $key => $value) { ?>
                                <option value="<?= $value['id_kelas'] ?>"><?= $value['nama_kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Generate</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!-- /.End modal Add-->