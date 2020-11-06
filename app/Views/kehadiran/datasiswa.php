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
                                <td><?= $row['kelas'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td><?= $row['keterangan'] ?></td>
                                <td>
                                    <a href="<?= base_url('kehadiran/view/' . $row['key_kehadiran']); ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i> Edit</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>