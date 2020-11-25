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
                                <h5 class="card-title"><?= $title; ?></h5>
                                <p class="card-text"><b>Nama : </b><?= $user['nama_user']; ?></p>
                                <p class="card-text"><small class="text-muted"><b>Username :</b><?= $user['username']; ?></small></p>

                                <a href="/komik/edit/<?= $komik['slug']; ?>" class="btn btn-warning">Edit</a>

                                <form action="/komik/<?= $komik['id']; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?');">Delete</button>
                                </form>

                                <br><br>
                                <a href="/komik">Daftar Komik</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>