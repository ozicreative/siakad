<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/img/' . session()->get('img')) ?>" class="card-img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">My Profile</h5>
                                <p class="card-text"><b>Nama : </b><?= session()->get('nama_user') ?></p>
                                <p class="card-text"><b>Username : </b><?= session()->get('username') ?></p>
                                <p class="card-text"><b>Email : </b><?= session()->get('email') ?></p>

                                <a href="profile/edit/<?= session()->get('id_user') ?>" class="btn btn-warning">Edit</a>

                                <form action="profile/<?= session()->get('id_user') ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">Delete</button>
                                </form>

                                <br><br>
                                <a href="/">Dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>