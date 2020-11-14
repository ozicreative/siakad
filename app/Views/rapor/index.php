<div class="row">
    <div class="col-md-12">
        <div class="card card-info card-outline">
            <div class="card-body">
                <?php if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-info alert-dismissible">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                } ?>
                <table class="table table-bordered table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Gender</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datagrid as $key => $value) { ?>
                            <tr>
                                <td><?= $value['nisn'];  ?></td>
                                <td><?= $value['nama_siswa'];  ?></td>
                                <td><?= $value['lvl_kelas'];  ?></td>
                                <td><?= $value['gender'];  ?></td>
                                <td>
                                <a href="<?= base_url('rapor/view/' . $value['id_siswa']); ?>" class="btn btn-info btn-xs"><i class="fas fa-eye"></i> Lihat</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>