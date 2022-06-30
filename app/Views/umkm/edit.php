<?= $this->extend('layouts/app'); ?>

<?= $this->section('main'); ?>

<div class="row">
  <div class="my-3">
    <h4>Form Edit UMKM</h4>
    <p>Mengedit data UMKM, formulir dengan tanda <span class="text-danger">*</span> wajib diisi.</p>
  
    <div class="card border-0 shadow components-section">
      <div class="card-body">
        <form action="<?= route_to('App\Controllers\Umkm::update', $data->id); ?>" method="post">
          <?= csrf_field(); ?>
          <input type="hidden" name="_method" value="PUT">
          <div class="mb-3">
            <label for="nama_umkm">Nama UMKM</label>
            <input type="text" class="form-control <?= session('errors.nama_umkm') ? "is-invalid" : null; ?>" id="nama_umkm" name="nama_umkm" value="<?= old('nama_umkm') ?? $data->nama_umkm; ?>" required>
            <div class="invalid-feedback">
              <?= session('errors.nomor_telepon') ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="nomor_telepon">Nomor Telepon</label>
            <div class="input-group">
              <span class="input-group-text" id="nomor_telepon">+62</span>
              <input type="number" class="form-control <?= session('errors.nomor_telepon') ? "is-invalid" : null; ?>" id="nomor_telepon" name="nomor_telepon" value="<?= old('nomor_telepon') ?? $data->getNomorTelepon(true); ?>" required>
            </div>
            <div class="invalid-feedback">
              <?= session('errors.nomor_telepon') ?>
            </div>
          </div>
          <div class="mb-3">
            <label for="alamat">Alamat UMKM</label>
            <textarea class="form-control <?= session('errors.alamat') ? "is-invalid" : null; ?>" id="alamat" name="alamat" rows="3"><?= old('alamat') ?? $data->alamat; ?></textarea>
            <div class="invalid-feedback">
              <?= session('errors.alamat') ?>
            </div>
          </div>
          <a class="btn btn-outline-secondary" href="<?= site_url("admin/umkm"); ?>" type="button">Kembali</a>
          <button class="btn btn-primary px-4" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>