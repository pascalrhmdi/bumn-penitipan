<?= $this->extend('layouts/app.php') ?>

<?= $this->section('main') ?>

<div class="row">
  <div class="my-3">
    <h4>Form Tambah Barang</h4>
    <p>Menambah data Barang, seluruh data wajib diisi.</p>

    <div class="card border-0 shadow components-section">
      <div class="card-body">
        <form action="<?= route_to('App\Controllers\Item::create') ?>" method="post">
          <?= csrf_field(); ?>
          <input type="hidden" name="id_user" value="<?= user_id(); ?>">
          <h6 class="fw-bolder">Data UMKM dan Pemberi</h6>
          <div class="ms-5 mb-4">
            <div class="form-group mb-2 d-flex flex-column">
              <label class="my-1 me-2" for="id_umkm">Nama UMKM<span class="text-danger">*</span></label>
              <select class="form-select choices <?= session('errors.id_umkm') ? "is-invalid" : null; ?>" id="id_umkm" name="id_umkm" aria-label="Select UMKM" autofocus>
                <option value="" selected>Pilih UMKM</option>
                <?php foreach ($umkms as $umkm) : ?>
                  <option value="<?= $umkm->id; ?>" <?= old('id_umkm') ===  $umkm->id ?  "selected" : null; ?>><?= $umkm->nama_umkm; ?></option>
                <?php endforeach ?>
              </select>
              <?php if (!session('errors.id_umkm')) : ?>
                <small id="id_umkm_help" class="form-text text-muted text-end">Pilih UMKM yang menyetorkan barang.</small>
                <a href="<?= route_to("App\Controllers\Umkm::new"); ?>" class="form-text d-inline-flex align-self-end text-info ">UMKM belum terdaftar? Buat.</a>
              <?php else : ?>
                <small class="invalid-feedback">
                  <?= session('errors.id_umkm') ?>
                </small>
              <?php endif ?>
            </div>
            <div class="form-group mb-2 d-flex flex-column">
              <label for="nama_pemberi">Nama Penyetor Barang<span class="text-danger">*</span></label>
              <input type="text" class="form-control <?= session('errors.nama_pemberi') ? "is-invalid" : null; ?>" id="nama_pemberi" name="nama_pemberi" value="<?= old('nama_pemberi'); ?>">
              <?php if (!session('errors.nama_pemberi')) : ?>
                <small id="nama_pemberi_help" class="form-text text-muted text-end">Sesuai KTP.</small>
              <?php else : ?>
                <small class="invalid-feedback">
                  <?= session('errors.nama_pemberi') ?>
                </small>
              <?php endif ?>
            </div>
            <div class="form-group mb-2 d-flex flex-column">
              <label for="telepon_pemberi">Nomor Telepon Pemberi<span class="text-danger">*</span></label>
              <div class="input-group">
                <span class="input-group-text" id="nomor_telepon">+62</span>
                <input type="tel" class="form-control <?= session('errors.telepon_pemberi') ? "is-invalid" : null; ?>" placeholder="8128-xxxx-xxx" id="telepon_pemberi" name="telepon_pemberi" value="<?= old('telepon_pemberi'); ?>">
              </div>
              <?php if (!session('errors.telepon_pemberi')) : ?>
                <small id="telepon_pemberi_help" class="form-text text-muted text-end">Nomor Whatsapp lebih baik. Isi tanpa awalan 0 atau 62.</small>
              <?php else : ?>
                <small class="invalid-feedback">
                  <?= session('errors.telepon_pemberi') ?>
                </small>
              <?php endif ?>
            </div>
          </div>
          <h6 class="fw-bolder">Data Barang</h6>
          <div class="ms-5 mb-4">
            <div class="form-group mb-2 d-flex flex-column">
              <label for="nama_barang">Nama Barang<span class="text-danger">*</span></label>
              <input type="text" class="form-control <?= session('errors.nama_barang') ? "is-invalid" : null; ?>" id="nama_barang" name="nama_barang" value="<?= old('nama_barang'); ?>">
              <?php if (!session('errors.nama_barang')) : ?>
                <small id="nama_barang_help" class="form-text text-muted text-end">Nama Barang yang disetor.</small>
              <?php else : ?>
                <small class="invalid-feedback">
                  <?= session('errors.nama_barang') ?>
                </small>
              <?php endif ?>
            </div>
            <div class="form-group mb-2 d-flex flex-column">
              <label for="harga_jual">Harga Jual<span class="text-danger">*</span></label>
              <input type="text" class="form-control <?= session('errors.harga_jual') ? "is-invalid" : null; ?>" id="harga_jual" name="harga_jual" value="<?= old('harga_jual'); ?>" placeholder="Rpx.xxx">
              <?php if (!session('errors.harga_jual')) : ?>
                <small id="harga_jual_help" class="form-text text-muted text-end">Harga barang.</small>
              <?php else : ?>
                <small class="invalid-feedback">
                  <?= session('errors.harga_jual') ?>
                </small>
              <?php endif ?>
            </div>
            <div class="form-group mb-2 d-flex flex-column">
              <label for="harga_rb">Harga Jual Rumah BUMN<span class="text-danger">*</span></label>
              <input type="text" class="form-control <?= session('errors.harga_rb') ? "is-invalid" : null; ?>" id="harga_rb" name="harga_rb" value="<?= old('harga_rb'); ?>" placeholder="Rpx.xxx">
              <?php if (!session('errors.harga_rb')) : ?>
                <small id="harga_rb_help" class="form-text text-muted text-end">Harga jual barang di Rumah BUMN.</small>
              <?php else : ?>
                <small class="invalid-feedback">
                  <?= session('errors.harga_rb') ?>
                </small>
              <?php endif ?>
            </div>
            <div class="form-group mb-2 d-flex flex-column">
              <label for="expired_at">Tanggal Kedaluwarsa<span class="text-danger">*</span></label>
              <div class="input-group ">
                <span class="input-group-text">
                  <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                  </svg>
                </span>
                <input class="form-control <?= session('errors.expired_at') ? "is-invalid" : null; ?>" id="expired_at" name="expired_at" type="date" value="<?= old('expired_at'); ?>">
              </div>
              <?php if (!session('errors.expired_at')) : ?>
                <small id="expired_at_help" class="form-text text-muted text-end">Tanggal Kedaluwarsa Barang.</small>
              <?php else : ?>
                <small class="invalid-feedback">
                  <?= session('errors.expired_at') ?>
                </small>
              <?php endif ?>
            </div>
          </div>
          <button class="btn btn-primary " type="submit" title="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->section('pageScripts'); ?>
<script>
  var selectStateInputEl = d.querySelector('#id_umkm');
  if (selectStateInputEl) {
    const choices = new Choices(selectStateInputEl);
  }
  
  const harga_jual = document.getElementById('harga_jual');
    harga_jual.addEventListener('keyup', function(e)
    {
        harga_jual.value = formatRupiah(this.value, "Rp");
    });

  const harga_rb = document.getElementById('harga_rb');
    harga_rb.addEventListener('keyup', function(e)
    {
        harga_rb.value = formatRupiah(this.value, "Rp");
    });

  function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp.' + rupiah : '');
    }

    const telepon_pemberi = document.getElementById('telepon_pemberi');
    telepon_pemberi.addEventListener('keyup', function(e)
    {
      const splittedValue = this.value.split('-').join('')
      telepon_pemberi.value = splittedValue.replace(/(\d)(\d)(\d)(\d)(?!$)/g, '$1$2$3$4-')
    });
</script>
<?= $this->endSection(); ?>

<?= $this->endSection(); ?>