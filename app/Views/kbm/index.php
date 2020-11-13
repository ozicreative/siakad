<div class="row">
    <div class="col-md-12">
        <div class="card card-info card-outline">
            <div class="card-header">
                <div class="card-tools float-right">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> <b>Kegiatan Belajar Mengajar</b></button>
                </div>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-info alert-dismissible">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                } ?>
                <table class="table table-bordered table-hover" id="table1">
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th>Guru</th>
                            <th>Kelas</th>
                            <th>Pelajaran</th>
                            <th>Tanggal</th>
                            <th>Kegiatan</th>
                            <th>Hadir/Tidak Hadir</th>
                            <th width="20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($datagrid as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama_guru']?></td>
                                <td><?= $row['nama_kelas'] ?></td>
                                <td><?= $row['nama_pelajaran']?></td>
                                <td><?= $row['tanggal']?></td>
                                <td><?= $row['materi']?></td>
                                <td><?= $row['t_hadir']?>/<?= $row['t_tdkhadir']?></td>
                                <td>
                                    <div class="btn-group">
                                    <button class="btn btn-warning btn-xs btn-edit" data-toggle="modal" data-target="#edit<?= $row['id_kbm']; ?>"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $row['id_kbm']; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
