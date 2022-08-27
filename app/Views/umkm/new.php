<?= $this->extend('layouts/app.php') ?>

<?= $this->section('main') ?>

<div class="row">
  <div class="my-3">
    <h4>Form Tambah UMKM</h4>
    <p>Menambah data UMKM, seluruh data wajib diisi.</p>
  
    <div class="card border-0 shadow components-section">
      <div class="card-body">
        <form action="<?= route_to('App\Controllers\Umkm::create') ?>" method="post">
          <?= csrf_field(); ?>
          <div class="mb-3 d-flex flex-column">
            <label for="nama_umkm">Nama UMKM<span class="text-danger">*</span></label>
            <input type="text" class="form-control <?= session('errors.nama_umkm') ? "is-invalid" : null; ?>" id="nama_umkm" name="nama_umkm" value="<?= old('nama_umkm'); ?>" autocapitalize="characters">
            <?php if (!session('errors.nama_umkm')) : ?>
              <small id="nama_umkm_help" class="form-text text-muted text-end">Masukkan Nama UMKM.</small>
            <?php else : ?>
              <small class="invalid-feedback">
                <?= session('errors.nama_umkm') ?>
              </small>
            <?php endif ?>
          </div>
          <div class="mb-3 d-flex flex-column">
            <label for="nomor_telepon">Nomor Telepon<span class="text-danger">*</span></label>
            <div class="input-group">
              <span class="input-group-text">+62</span>
              <input type="tel" class="form-control <?= session('errors.nomor_telepon') ? "is-invalid" : null; ?>" id="nomor_telepon" placeholder="8988xxxxxxx" name="nomor_telepon" value="<?= old('nomor_telepon') ?>">
            </div>
            <?php if (!session('errors.nomor_telepon')) : ?>
              <small id="nomor_telepon_help" class="form-text text-muted text-end">Nomor Whatsapp lebih baik. Isi tanpa awalan 08 dan 62.</small>
            <?php else : ?>
              <small class="invalid-feedback">
                <?= session('errors.nomor_telepon') ?>
              </small>
            <?php endif ?>
          </div>
          <div class="mb-3 d-flex flex-column">
            <label for="alamat">Alamat UMKM<span class="text-danger">*</span></label>
            <textarea class="form-control <?= session('errors.alamat') ? "is-invalid" : null; ?>" id="alamat" name="alamat" value="<?= old('alamat'); ?>" placeholder="Jl. Jenderal Suprapto" rows="3"></textarea>
            <?php if (!session('errors.alamat')) : ?>
              <small id="alamat_help" class="form-text text-muted text-end">Masukkan alamat UMKM.</small>
            <?php else : ?>
              <small class="invalid-feedback">
                <?= session('errors.alamat') ?>
              </small>
            <?php endif ?>
          </div>
          <button id="submit" title="submit" class="btn btn-primary" type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->section('pageScripts'); ?>
<script>
  const nomor_telepon = document.getElementById('nomor_telepon');
    nomor_telepon.addEventListener('keyup', function(e)
    {
      const splittedValue = this.value.split('-').join('')
      nomor_telepon.value = splittedValue.replace(/(\d)(\d)(\d)(\d)(?!$)/g, '$1$2$3$4-')
    });
</script>
<?= $this->endSection(); ?>

<?= $this->endSection(); ?>