<div class="row">
    <div class="col-md-12">
        <div class="card card-info card-outline">
            <div class="card-content">
                <div class="card-options">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal1" id="btnAdd"">New Data</button>
                </div>
                <form role=" form" method="POST" id="myForm"></form>
                        <table class="table table-bordered" id="example">
                            <thead>
                                <tr>
                                    <th>Key</th>
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
                                        <td><?= $row['key_kehadiran'] ?></td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td><?= $row['nama_kelas'] ?></td>
                                        <td><?= $row['TOTAL'] ?></td>
                                        <td><?= $row['MASUK'] ?></td>
                                        <td><?= $row['ALPHA'] ?></td>
                                        <td><?= $row['SAKIT'] ?></td>
                                        <td><?= $row['IJIN'] ?></td>
                                        <td>
                                            <a name="edit" href="<?= base_url('kehadiran/view/' . $row['key_kehadiran']); ?>" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Edit"><i class="material-icons m-warning">edit</i></a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
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
                        <a href="kehadiran/generate" id="btn_submit" class=" modal-action modal-close waves-effect waves-green btn-flat">Generate</a>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->