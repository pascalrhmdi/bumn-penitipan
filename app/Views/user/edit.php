<?= $this->extend('layouts/app'); ?>

<?= $this->section('main'); ?>

<div class="row">
  <div class="my-3">
    <div class="col-2">
      <a role="button" href="<?= base_url("admin/user"); ?>" class="btn btn-secondary d-inline-flex align-items-center col-8 mb-2">
        <svg class="icon icon-xs me-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        </svg>
        Kembali
      </a>
    </div>
    <h4>Edit Profil</h4>
    <p>Mengubah profil dan password <?= $user->username; ?>, formulir dengan tanda <span class="text-danger">*</span> wajib diisi.</p>

    <div class="col-12 d-flex flex-row">
      <div class="card col-6 border-0 shadow components-section me-1">
        <!-- <div class="card-header h6">Edit Profil</div> -->
        <div class="card-body">
          <!-- <h6>Edit Profil</h6> -->
          <form action="<?= route_to('App\Controllers\User::update', $user->id) ?>" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group mb-2 d-flex flex-column">
              <label for="email">Email<span class="text-danger">*</span></label>
              <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?? $user->email; ?>" disabled>
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
              <input type="text" class="form-control <?= session('errors.username') ? "is-invalid" : null; ?>" id="username" name="username" value="<?= old('username') ?? $user->username; ?>">
              <?php if (!session('errors.username')) : ?>
                <small id="username_help" class="form-text text-muted text-end">Nama Admin.</small>
              <?php else : ?>
                <small class="invalid-feedback">
                  <?= session('errors.username') ?>
                </small>
              <?php endif ?>
            </div>
            <div class="form-check mb-2">
              <input class="form-check-input" type="checkbox" value="<?= old('active') ?? $user->username; ?>" id="active" name="active" <?php if($user->active) echo "checked" ; ?>>
              <label class="form-check-label" for="active">
              Aktifkan Akun
              </label>
            </div>
            <div class="d-flex justify-content-end">
              <button class="btn btn-primary btn-sm" type="submit" title="submit">Ubah Akun</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Ubah Password -->
      <div class="card col-6 border-0 shadow components-section ms-1">
        <div class="card-body">
          <form action="<?= route_to('reset-password', $user->id) ?>" method="POST">
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