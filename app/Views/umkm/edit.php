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
          <div class="form-group mb-2 d-flex flex-column">
            <label for="nama_umkm">Nama UMKM<span class="text-danger">*</span></label>
            <input type="text" class="form-control <?= session('errors.nama_umkm') ? "is-invalid" : null; ?>" id="nama_umkm" name="nama_umkm" value="<?= old('nama_umkm') ?? $data->nama_umkm; ?>" required>
            <?php if (!session('errors.nama_umkm')) : ?>
              <small id="nama_umkm_help" class="form-text text-muted text-end">Masukkan Nama UMKM.</small>
            <?php else : ?>
              <small class="invalid-feedback">
                <?= session('errors.nama_umkm') ?>
              </small>
            <?php endif ?>
          </div>
          <div class="form-group mb-2 d-flex flex-column">
            <label for="nomor_telepon">Nomor Telepon<span class="text-danger">*</span></label>
            <div class="input-group">
              <span class="input-group-text">+62</span>
              <input type="tel" class="form-control <?= session('errors.nomor_telepon') ? "is-invalid" : null; ?>" id="nomor_telepon" name="nomor_telepon" value="<?= old('nomor_telepon') ?? $data->getNomorTelepon(true); ?>" required>
            </div>
            <?php if (!session('errors.nomor_telepon')) : ?>
              <small id="nomor_telepon_help" class="form-text text-muted text-end">Nomor Whatsapp lebih baik. Isi tanpa awalan 0 atau 62.</small>
            <?php else : ?>
              <small class="invalid-feedback">
                <?= session('errors.nomor_telepon') ?>
              </small>
            <?php endif ?>
          </div>
          <div class="form-group mb-2 d-flex flex-column">
            <label for="alamat">Alamat UMKM<span class="text-danger">*</span></label>
            <textarea class="form-control <?= session('errors.alamat') ? "is-invalid" : null; ?>" id="alamat" name="alamat" rows="3"><?= old('alamat') ?? $data->alamat; ?></textarea>
            <?php if (!session('errors.alamat')) : ?>
              <small id="alamat_help" class="form-text text-muted text-end">Masukkan alamat UMKM.</small>
            <?php else : ?>
              <small class="invalid-feedback">
                <?= session('errors.alamat') ?>
              </small>
            <?php endif ?>
          </div>
          <a class="btn btn-outline-secondary" href="<?= site_url("admin/umkm"); ?>" type="button">Kembali</a>
          <button class="btn btn-primary px-4" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->section('pageStyles'); ?>
<script>
  const nomor_telepon = document.getElementById('nomor_telepon');
  nomor_telepon.addEventListener('keyup', function(e) {
    const splittedValue = this.value.split('-').join('')
    console.log(splittedValue);
    nomor_telepon.value = splittedValue.replace(/(\d)(\d)(\d)(\d)(?!$)/g, '$1$2$3$4-')
  });
</script>
<?= $this->endSection(); ?>

<?= $this->endSection(); ?>