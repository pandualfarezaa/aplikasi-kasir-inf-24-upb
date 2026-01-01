<?= $this->extend('v_template') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>Pengaturan Aplikasi</h4>
    </div>

    <div class="card-body">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('admin/settings/update') ?>" method="post">
            <input type="hidden" name="id" value="<?= $setting['id'] ?? '' ?>">

            <div class="form-group">
                <label>Nama Toko</label>
                <input type="text" name="nama_toko" class="form-control" value="<?= $setting['nama_toko'] ?? '' ?>">
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"><?= $setting['alamat'] ?? '' ?></textarea>
            </div>

            <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control" value="<?= $setting['telepon'] ?? '' ?>">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= $setting['email'] ?? '' ?>">
            </div>

            <button type="submit" class="btn btn-primary mt-2">
                Simpan
            </button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>