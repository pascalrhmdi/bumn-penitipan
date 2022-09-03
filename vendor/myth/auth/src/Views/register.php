<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center form-bg-image" data-background-lg="images/illustrations/signin.svg">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                    <div class="d-flex align-items-center justify-content-between mb-1 mt-md-0 ">
                        <h1 class="mb-0 h3 fw-bolder">Daftar</h1>
                        <img style="width: 25%" src="images/brand/Logo-Rumah-BUMN-Denpasar.png" alt="Rumah BUMN Denpasar Bali">
                    </div>

                    <!-- Form -->
                    <form action="<?= route_to('register') ?>" method="post">
                        <?= csrf_field() ?>
                        <?php if ($config->validFields === ['email']) : ?>
                            <div class="form-group mb-2 d-flex flex-column">
                                <label for="email"><?= lang('Auth.email') ?></label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">
                                        <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                            </path>
                                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                                        </svg>
                                    </span>
                                    <input type="email" name="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php else : "is-valid"; endif ?>" placeholder="<?= lang('Auth.email') ?>" id="email" value="<?= old('email') ?>" autofocus>
                                </div>
                                <?php if (!session('errors.email')) : ?>
                                    <small id="email_help" class="form-text text-muted text-end">Harus email yang valid.</small>
                            </div>
                        <?php else : ?>
                            <small class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </small>
                        <?php endif ?>
                    <?php endif; ?>

                    <div class="form-group mb-2  d-flex flex-column">
                        <label for="username"><?= lang('Auth.username') ?></label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill icon icon-xs text-gray-600" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
</svg>
                            </span>
                            <input type="text" name="username" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php else : "is-valid"; endif ?>" placeholder="<?= lang('Auth.username') ?>" id="username" value="<?= old('username') ?>">
                        </div>
                        <?php if (!session('errors.username')) : ?>
                            <small id="username_help" class="form-text text-muted text-end">Nama Pengguna.</small>
                        <?php else : ?>
                            <small class="invalid-feedback">
                                <?= session('errors.username') ?>
                            </small>
                        <?php endif ?>
                    </div>

                    <div class="form-group mb-2  d-flex flex-column">
                        <label for="password_hash"><?= lang('Auth.password'); ?></label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon2">
                                <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <input type="password" name="password_hash" placeholder="********" class="form-control <?php if (session('errors.password_hash')) : ?>is-invalid<?php else : "is-valid"; endif ?>" id="password_hash" autocomplete="off">
                        </div>
                        <?php if (!session('errors.password_hash')) : ?>
                            <small id="password_hash_help" class="form-text text-muted text-end">Password setidaknya sepanjang 8 karakter.</small>
                        <?php else : ?>
                            <small class="invalid-feedback">
                                <?= session('errors.password_hash') ?>
                            </small>
                        <?php endif ?>
                    </div>

                    <div class="form-group mb-2  d-flex flex-column">
                        <label for="pass_confirm"><?= lang('Auth.repeatPassword'); ?></label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon2">
                                <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <input type="password" name="pass_confirm" placeholder="********" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php else : "is-valid"; endif ?>" id="pass_confirm" autocomplete="off">
                        </div>
                        <?php if (!session('errors.pass_confirm')) : ?>
                            <small id="pass_confirm_help" class="form-text text-muted text-end">Password harus sama.</small>
                        <?php else : ?>
                            <small class="invalid-feedback">
                                <?= session('errors.pass_confirm') ?>
                            </small>
                        <?php endif ?>
                    </div>

                    <br>
                                <div class="d-flex justify-content-end col-12">
                                    <a role="button" class="btn btn-outline-secondary btn-block me-2" href="/admin">Kembali</a>
                                    <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                                </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</section>

<?= $this->endSection() ?>