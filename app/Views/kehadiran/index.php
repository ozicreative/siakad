<div class="row">
    <div class="col-md-12">
        <div class="card card-info card-outline">
            <div class="card-header">
                <div class="card-tools float-right">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal1"><i class="fa fa-plus"></i> <b>New Data</b></button>
                </div>
            </div>
            <div class=" card-body">

                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>

                <table class="table table-bordered" id="example">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Kelas</th>
                            <th>Jumlah</th>
                            <th>Masuk</th>
                            <th>Alpha</th>
                            <th>Sakit</th>
                            <th>Ijin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datagrid as $row) : ?>
                            <tr>
                                <td><?= $row['tanggal'] ?></td>
                                <td><?= $row['nama_kelas'] ?></td>
                                <td><?= $row['TOTAL'] ?></td>
                                <td><?= $row['MASUK'] ?></td>
                                <td><?= $row['ALPHA'] ?></td>
                                <td><?= $row['SAKIT'] ?></td>
                                <td><?= $row['IJIN'] ?></td>
                                <td>
                                <a href="<?= base_url('kehadiran/view/' . $row['key_kehadiran']); ?>" class="btn btn-info btn-xs"><i class="fas fa-eye"></i> Lihat</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal -->
<div id="modal1" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buat Kehadiran</h4>
            </div>
            <div class="modal-body">

                <?php echo form_open('kehadiran/generate') ?>
                <!-- <form class="form-horizontal" role="form" method="post" id="myform"> -->

                <div class="form-group row">
                    <div class="form-group col-lg-6">
                        <label for="kelas_id">Kelas</label>
                        <select id="kelas_id" name="kelas_id" class="form-control">
                            <option>- pilih kelas -</option>
                            <?php foreach ($datakelas as $row) : ?>
                                <option value="<?= $row['id_kelas'] ?>"><?= $row['nama_kelas'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="tanggal">Tanggal</label>
                        <input id="tanggal" name="tanggal" type="date" class="form-control">
                    </div>
                </div>
                <!-- </form> -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Generate</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->