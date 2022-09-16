<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<section class="vh-lg-100 mt-5 mt-lg-0 bg-soft d-flex align-items-center">
  <div class="container">
    <div class="row justify-content-center form-bg-image" data-background-lg="images/illustrations/signin.svg">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">
          <div class="d-flex align-items-center justify-content-between mb-1 mt-md-0 ">
            <h1 class="mb-0 h3 fw-bolder" >Masuk</h1>
            <img style="width: 25%" src="images/brand/Logo-Rumah-BUMN-Denpasar.png" alt="Rumah BUMN Denpasar Bali">
          </div>

          <!-- Form -->
            <?= view('Myth\Auth\Views\_message_block') ?>
          <form action="<?= route_to('login'); ?>" class="mt-2" method="POST">
            <?= csrf_field(); ?>

            <div class="form-group mb-4">
              <label for="login"><?= lang('Auth.email') ?></label>
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                  <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                    </path>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                  </svg>
                </span>
                <input type="email" name="login"
                  class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php else : "is-valid"; endif ?>"
                  placeholder="<?= lang('Auth.email') ?>" id="email" value="<?= old('login') ?>" autofocus>
                <div class="invalid-feedback">
                  <?= session('errors.login') ?>
                </div>
              </div>
            </div>
            <!-- End of Form -->

            <div class="form-group">
              <!-- Form -->
              <div class="form-group mb-4">
                <label for="password"><?= lang('Auth.password'); ?></label>
                <div class="input-group">
                  <span class="input-group-text" id="basic-addon2">
                    <svg class="icon icon-xs text-gray-600" fill="currentColor" viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </span>
                  <input type="password" name="password" placeholder="********"
                    class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php else : "is-valid";  endif ?>"
                    id="password">
                  <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                  </div>
                </div>
              </div>
              <!-- End of Form -->

              <!-- Remember -->
              <?php if ($config->allowRemembering) : ?>
              <div class="d-flex justify-content-between align-items-top mb-4">
                <div class="form-check">
                  <input type="checkbox" name="remember" class="form-check-input" checked>
                  <small>
                    <span class="text-italic">Login</span> untuk selama 4 jam kedepan
                  </small>
                  </label>
                </div>

              </div>
              <?php endif ?>
              <!-- End of Remember -->
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-gray-800"><?= lang('Auth.loginAction') ?></button>
            </div>
          </form>
          <hr>

          <!-- <?php if ($config->allowRegistration) : ?>
          <div class="text-end">
            <a href="<?= route_to('register') ?>"><?= lang('Auth.needAnAccount') ?></a>
          </div>
          <?php endif; ?> -->

          <?php if ($config->activeResetter) : ?>

          <a href="<?= route_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection() ?>