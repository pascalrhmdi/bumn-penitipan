<?= $this->extend('layouts/app.php') ?>

<?= $this->section('main') ?>

<div class="row">
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
              <h2 class="h5">UMKM</h2>
              <h3 class="fw-extrabold mb-0">345,678</h3>
            </div>
          </div>
          <div class="col-12 col-xl-7 px-xl-0">
            <div class="d-none d-sm-block">
              <h2 class="h6 text-gray-400 mb-0">UMKM</h2>
              <h3 class="fw-extrabold mb-0">345k</h3>
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
              <svg class="icon" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
              </svg>
            </div>
            <div class="d-sm-none">
              <h2 class="fw-extrabold h5">Barang</h2>
              <h3 class="mb-0">43.594</h3>
            </div>
          </div>
          <div class="col-12 col-xl-7 px-xl-0">
            <div class="d-none d-sm-block">
              <h2 class="h6 text-gray-400 mb-0">Barang</h2>
              <h3 class="fw-extrabold mb-0">43.594</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="col-12 px-0 mb-4">
      <div class="card border-0 shadow">
        <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">
          <div class="d-block">
            <div class="h6 fw-normal text-gray mb-2">Total orders</div>
            <h2 class="h3 fw-extrabold">452</h2>
            <div class="small mt-2">
              <span class="fas fa-angle-up text-success"></span>
              <span class="text-success fw-bold">18.2%</span>
            </div>
          </div>
          <div class="d-block ms-auto">
            <div class="d-flex align-items-center text-end mb-2">
              <span class="dot rounded-circle bg-gray-800 me-2"></span>
              <span class="fw-normal small">July</span>
            </div>
            <div class="d-flex align-items-center text-end">
              <span class="dot rounded-circle bg-secondary me-2"></span>
              <span class="fw-normal small">August</span>
            </div>
          </div>
        </div>
        <div class="card-body p-2">
          <div class="ct-chart-ranking ct-golden-section ct-series-a"></div>
        </div>
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