<?= $this->extend('layouts/app.php') ?>

<?= $this->section('main') ?>

<div class="row">
  <div class="my-2">
    <h3 class="mb-1">Dasbor</h4>
      <p class="mb-2">Rekapan data Sistem Penitipan Barang Rumah BUMN Denpasar, Bali.</p>
  </div>
  <?php if (in_groups("superadmin")) : ?>
  <div class="col-12 col-sm-6 col-xl-4 mb-4">
    <div class="card border-0 shadow">
      <div class="card-body">
        <div class="row d-block d-xl-flex align-items-center">
          <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
            <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
              <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                </path>
              </svg>
            </div>
            <div class="d-sm-none">
              <a class="h5 stretched-link" href="<?= route_to("App\Controllers\User::index"); ?>">Akun Pengelola</a>
              <h3 class="fw-extrabold mb-0"><?= $users; ?></h3>
            </div>
          </div>
          <div class="col-12 col-xl-7 px-xl-0">
            <div class="d-none d-sm-block">
              <a class="h6 text-gray-400 mb-0 stretched-link" href="<?= route_to("App\Controllers\User::index"); ?>">Akun Pengelola</a>
              <h3 class="fw-extrabold mb-0 "><?= $users; ?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif ?>
  <div class="col-12 col-sm-6 col-xl-4 mb-4">
    <div class="card border-0 shadow">
      <div class="card-body">
        <div class="row d-block d-xl-flex align-items-center">
          <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
            <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
              <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                </path>
              </svg>
            </div>
            <div class="d-sm-none">
              <a class="h5 stretched-link" href="<?= route_to("App\Controllers\Umkm::index"); ?>">UMKM</a>
              <h3 class="fw-extrabold mb-0"><?= $umkms; ?></h3>
            </div>
          </div>
          <div class="col-12 col-xl-7 px-xl-0">
            <div class="d-none d-sm-block">
              <a class="h6 text-gray-400 mb-0 stretched-link" href="<?= route_to("App\Controllers\Umkm::index"); ?>">UMKM</a>
              <h3 class="fw-extrabold mb-0 "><?= $umkms; ?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-sm-6 col-xl-4 mb-4">
    <div class="card border-0 shadow">
      <div class="card-body">
        <div class="row d-block d-xl-flex align-items-center">
          <div class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
            <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
              <svg class="icon" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                <path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z" />
              </svg>
              </span>
            </div>
            <div class="d-sm-none">
              <a class="fw-extrabold h5 stretched-link" href="<?= route_to("App\Controllers\Item::index"); ?>">Barang Disetorkan</a>
              <h3 class="mb-0"><?= $items; ?></h3>
            </div>
          </div>
          <div class="col-12 col-xl-7 px-xl-0">
            <div class="d-none d-sm-block">
              <a class="h6 text-gray-400 mb-0 stretched-link" href="<?= route_to("App\Controllers\Item::index"); ?>">Barang Disetorkan</a>
              <h3 class="fw-extrabold mb-0"><?= $items; ?></h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12 mb-4">
    <div class="card border-0 shadow">
      <div class="card-body">
        <h6>Export Data</h6>
        <ol>
          <li><a href="<?= site_url("admin/exportdata"); ?>" class="text-decoration-underline">Download data UMKM dan Barang.
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-cloud-download-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z" />
              </svg></a></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<div class="theme-settings card bg-gray-800 pt-2 collapse" id="theme-settings">
  <div class="card-body bg-gray-800 text-white pt-4">
    <button type="button" class="btn-close theme-settings-close" aria-label="Close" data-bs-toggle="collapse" href="#theme-settings" role="button" aria-expanded="false" aria-controls="theme-settings"></button>
    <div class="d-flex justify-content-between align-items-center mb-3">
      <p class="m-0 mb-1 me-4 fs-7">Open source <span role="img" aria-label="gratitude">💛</span></p>
      <a class="github-button" href="https://github.com/themesberg/volt-bootstrap-5-dashboard" data-color-scheme="no-preference: dark; light: light; dark: light;" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star themesberg/volt-bootstrap-5-dashboard on GitHub">Star</a>
    </div>
    <a href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard" target="_blank" class="btn btn-secondary d-inline-flex align-items-center justify-content-center mb-3 w-100">
      Download
      <svg class="icon icon-xs ms-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M2 9.5A3.5 3.5 0 005.5 13H9v2.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 15.586V13h2.5a4.5 4.5 0 10-.616-8.958 4.002 4.002 0 10-7.753 1.977A3.5 3.5 0 002 9.5zm9 3.5H9V8a1 1 0 012 0v5z" clip-rule="evenodd"></path>
      </svg>
    </a>
    <p class="fs-7 text-gray-300 text-center">Available in the following technologies:</p>
    <div class="d-flex justify-content-center">
      <a class="me-3" href="https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard" target="_blank">
        <img src="images/technologies/bootstrap-5-logo.svg" class="image image-xs">
      </a>
      <a href="https://demo.themesberg.com/volt-react-dashboard/#/" target="_blank">
        <img src="images/technologies/react-logo.svg" class="image image-xs">
      </a>
    </div>
  </div>
</div>

<div class="card theme-settings bg-gray-800 theme-settings-expand" id="theme-settings-expand">
  <div class="card-body bg-gray-800 text-white rounded-top p-3 py-2">
    <span class="fw-bold d-inline-flex align-items-center h6">
      <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
      </svg>
      Settings
    </span>
  </div>
</div>

<?= $this->endSection() ?>