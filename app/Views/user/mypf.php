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