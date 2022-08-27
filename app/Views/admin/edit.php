<?= $this->extend('layouts/app'); ?>

<?= $this->section('main'); ?>

<div class="row">
  <div class="my-3">
    <h4>Edit Profil</h4>
    <p>Mengubah profil dan password admin, formulir dengan tanda <span class="text-danger">*</span> wajib diisi.</p>

    <?= view('Myth\Auth\Views\_message_block') ?>
    
    <div class="col-12 d-flex flex-row">
      <div class="card col-6 border-0 shadow components-section me-1">
        <!-- <div class="card-header h6">Edit Profil</div> -->
        <div class="card-body">
          <!-- <h6>Edit Profil</h6> -->
          <form action="<?= route_to('App\Controllers\Admin::update', user_id()) ?>" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group mb-2 d-flex flex-column">
              <label for="email">Email<span class="text-danger">*</span></label>
              <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?? user()->email; ?>" disabled>
              <?php if (!session('errors.email')) : ?>
                <small id="email_help" class="form-text text-muted text-end">Email tidak dapat dirubah.</small>
              <?php else : ?>
                <small class="invalid-feedback">
                  <?= session('errors.email') ?>
                </small>
              <?php endif ?>
            </div>
            <div class="form-group mb-2 d-flex flex-column">
              <label for="username">Nama Pengguna<span class="text-danger">*</span></label>
              <input type="text" class="form-control <?= session('errors.username') ? "is-invalid" : null; ?>" id="username" name="username" value="<?= old('username') ?? user()->username; ?>">
              <?php if (!session('errors.username')) : ?>
                <small id="username_help" class="form-text text-muted text-end">Nama Admin.</small>
              <?php else : ?>
                <small class="invalid-feedback">
                  <?= session('errors.username') ?>
                </small>
              <?php endif ?>
            </div>
            <div class="d-flex justify-content-end">
              <button class="btn btn-primary btn-sm" type="submit" title="submit">Ubah Akun</button>
            </div>
          </form>
        </div>
      </div>
      <div class="card col-6 border-0 shadow components-section ms-1">
        <!-- <div class="card-header h6">Ubah  Password</div> -->
        <div class="card-body">
          <!-- <h6>Ubah Password</h6> -->
          <form action="<?= route_to('reset-password', user_id()) ?>" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group mb-2 d-flex flex-column">
              <label for="password">Password Baru<span class="text-danger">*</span></label>
              <input type="password" class="form-control <?= session('errors.password') ? "is-invalid" : null; ?>" id="password" name="password" value="<?= old('password') ?>" placeholder="********">
              <?php if (!session('errors.password')) : ?>
                <small id="password_help" class="form-text text-muted text-end">Password setidaknya mengandung 8 karakter, tidak boleh sama.</small>
              <?php else : ?>
                <small class="invalid-feedback">
                  <?= session('errors.password') ?>
                </small>
              <?php endif ?>
            </div>
            <div class="form-group mb-2 d-flex flex-column">
              <label for="pass_confirm">Konfirmasi Password Baru<span class="text-danger">*</span></label>
              <input type="password" class="form-control <?= session('errors.pass_confirm') ? "is-invalid" : null; ?>" id="pass_confirm" name="pass_confirm" value="<?= old('pass_confirm') ?>" placeholder="********">
              <?php if (!session('errors.pass_confirm')) : ?>
                <small id="pass_confirm_help" class="form-text text-muted text-end">Password harus sama.</small>
              <?php else : ?>
                <small class="invalid-feedback">
                  <?= session('errors.pass_confirm') ?>
                </small>
              <?php endif ?>
            </div>
            <div class="d-flex justify-content-end">
              <button class="btn btn-primary  btn-sm" type="submit" title="submit">Ubah Password</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('pageScripts'); ?>
<script>
  const selectStateInputEl = d.querySelector('#id_umkm');
  if (selectStateInputEl) {
    const choices = new Choices(selectStateInputEl);
  }

  const harga_jual = document.getElementById('harga_jual');
  harga_jual.addEventListener('keyup', function(e) {
    harga_jual.value = formatRupiah(this.value, "Rp");
  });

  const harga_rb = document.getElementById('harga_rb');
  harga_rb.addEventListener('keyup', function(e) {
    harga_rb.value = formatRupiah(this.value, "Rp");
  });

  function formatRupiah(angka, prefix) {
    let number_string = angka.replace(/[^,\d]/g, '').toString(),
      split = number_string.split(','),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp.' + rupiah : '');
  }

  const telepon_pemberi = document.getElementById('telepon_pemberi');
  telepon_pemberi.addEventListener('keyup', function(e) {
    const splittedValue = this.value.split('-').join('')
    telepon_pemberi.value = splittedValue.replace(/(\d)(\d)(\d)(\d)(?!$)/g, '$1$2$3$4-')
  });

  let loadFile = function(event) {
    let output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>
<?= $this->endSection(); ?>