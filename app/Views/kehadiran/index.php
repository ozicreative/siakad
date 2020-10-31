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
                        foreach ($kehadiran as $key => $value) { ?>
                            <tr>
                                <td><?= date('d-m-Y', strtotime($value["tanggal"]));  ?></td>
                                <td><?= $value['nama_kelas'];  ?></td>
                                <td><?= $value['TOTAL'];  ?></td>
                                <td><?= $value['MASUK'];  ?></td>
                                <td><?= $value['IJIN'];  ?></td>
                                <td><?= $value['ALPHA'];  ?></td>
                                <td><?= $value['SAKIT'];  ?></td>
                                <td>
                                    <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $value['id_kehadiran']; ?>"><i class="fas fa-edit"></i> Edit</button>
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
                        <select name="tanggal" id="tanggal" class="form-control" required>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
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
</div>
<!-- /.End modal Add-->