<div class="container">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Mahasiswa <strong>Berhasil</strong> <?= $this->session->flashdata('flash') ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-6">
            <a href="<?= base_url('Mahasiswa/tambah') ?>" class="btn btn-primary">Tambah Data</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data mahasiswa.." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Data Mahasiswa</h3>
            <?php if (empty($mahasiswa)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data Mahasiswa Kosong
                </div>
            <?php endif; ?>
            <ul class="list-group">
                <?php foreach ($mahasiswa as $mhs) : ?>

                    <li class="list-group-item">
                        <?= $mhs['nama']; ?>
                        <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['id_mhs'];  ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin ? ');">
                            hapus</a>
                        <a href="<?= base_url(); ?>mahasiswa/ubah/<?= $mhs['id_mhs'];  ?>" class="badge badge-warning float-right">
                            Ubah</a>
                        <a href="<?= base_url(); ?>mahasiswa/detail/<?= $mhs['id_mhs'];  ?>" class="badge badge-primary float-right">
                            Detail</a>
                    </li>

                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>