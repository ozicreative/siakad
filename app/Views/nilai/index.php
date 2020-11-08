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
                            <th>Jenis Ujian</th>
                            <th>Pelajaran</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($datagride as $key => $value) { ?>
                            <tr>
                                <td><?= $value['tanggal'];  ?></td>
                                <td><?= $value['nama_active'];  ?></td>
                                <td>
                                    <div class="btn-group">
                                    <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $value['id_pelajaran']; ?>"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger btn-xs btnhapus" data-toggle="modal" data-target="#delete<?= $value['id_pelajaran']; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
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