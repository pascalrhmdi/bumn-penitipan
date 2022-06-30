<?= $this->extend('layouts/app'); ?>

<?= $this->section('pageStyles'); ?>
<style>
  td,
  th {
    padding: .75rem .5rem !important;
  }
</style>
<?= $this->endSection(); ?>

<?= $this->section('main'); ?>

<div class="row">
  <div class="my-3">
    <!-- Information Card of Barang -->
    <div class="card border-0 shadow components-section">
      <!-- Card Header -->
      <div class="card-header d-flex justify-content-between align-items-center py-2 px-3">
        <a role="button" href="<?= base_url("admin/item"); ?>" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
          <svg class="icon icon-xs me-2" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 15 15">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
          </svg>
          Kembali
        </a>
        <div>
          <a class="btn btn-sm btn-info" href="<?= site_url("admin/item/" . $item->id); ?>/edit" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-pencil-fill" viewBox="0 0 16 16">
              <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
            </svg>
          </a>
          <form class="d-inline" action="<?= site_url("admin/item/" . $item->id); ?>" method="POST">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="DELETE" />
            <button id="delete" class="btn btn-sm btn-danger" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
              </svg>
            </button>
          </form>
        </div>
      </div>

<?php
  $keuntungan = $item->harga_rb - $item->harga_jual;
  $keuntungan_in_rupiah = "Rp" . number_format($keuntungan, 2, ',', '.');
?>

      <!-- Card Body -->
      <div class="card-body">
        <h5 class="mb-0">Detail Barang</h3>
          <table class="table table-borderless w-auto ms-2 mb-3">
            <tbody>
              <tr>
                <th class="fw-bold" scope="row" style="min-width: 240px;">Nama barang</th>
                <td>:&nbsp;<?= $item->nama_barang; ?></td>
              </tr>
              <tr>
                <th class="fw-bold" scope="row">Harga Jual</th>
                <td>:&nbsp;<?= $item->getHargaJual(true); ?></td>
              </tr>
              <tr>
                <th class="fw-bold" scope="row">Harga Jual di RB</th>
                <td>:&nbsp;<?= $item->getHargaRb(true); ?></td>
              </tr>
              <tr class="text-success">
                <th class="fw-bold" scope="row">Laba</th>
                <td >:&nbsp;<?= $keuntungan_in_rupiah; ?></td>
              </tr>
              <tr class="text-danger">
                <th class="fw-bold" scope="row">Tanggal Kedaluwarsa Barang</th>
                <td>:&nbsp;<?= $item->expired_at->toLocalizedString('d MMMM YYYY'); ?></td>
              </tr>
            </tbody>
          </table>
        <h5 class="mb-0">Detail Umkm</h3>
        <table class="table table-borderless w-auto ms-2">
            <tbody>
              <tr>
                <th class="fw-bold" scope="row" style="min-width: 240px;">Nama Pemberi Barang</th>
                <td>:&nbsp;<?= $item->nama_pemberi; ?></td>
              </tr>
              <tr>
                <th class="fw-bold" scope="row">Nomor Telepon Pemberi Barang</th>
                <td>:&nbsp;<a href="http://wa.me/<?= $item->telepon_pemberi; ?>/?text=%5BPesan%20dari%20Rumah%20BUMN%20Denpasar%5D%0ASelamat%20_%3F_%2C%20semoga%20bapak%2Fibu%20selalu%20diberi%20kesehatan.%0AKami%20dari%20Rumah%20BUMN%20Denpasar%2C%20Bali." target="_blank"><?= $item->telepon_pemberi; ?>&nbsp;<img src="<?= base_url("images/icons/whatsapp.png"); ?>" alt="Logo WA" height="23"></a></td>
              </tr>
              <tr>
                <th class="fw-bold" scope="row">Tanggal Barang Diberikan</th>
                <td>:&nbsp;<?= $item->created_at->toLocalizedString('d MMMM YYYY'); ?></td>
              </tr>
            </tbody>
          </table>
          <div class="card-footer d-flex justify-content-end">
            <a href="http://wa.me/<?= $item->telepon_pemberi; ?>/?text=%5BPesan%20dari%20Rumah%20BUMN%20Denpasar%5D%0ASelamat%20_%3F_%2C%20semoga%20bapak%2Fibu%20selalu%20diberi%20kesehatan.%0AKami%20dari%20Rumah%20BUMN%20Denpasar%2C%20Bali." class="btn btn-primary mx-2" target="_blank">Hubungi Pemberi Barang</a>
            <a href="<?= site_url('/admin/umkm/' . $item->id_umkm); ?>" class="btn btn-primary">Lihat UMKM</a>
          </div>
      </div>
    </div>
  </div>
</div>

<?= $this->section('pageScripts'); ?>
<script>
  $(document).ready(function() {
    $('#item_table').DataTable({
      columnDefs: [{
        targets: 2,
        render: $.fn.dataTable.render.number('.', ',', 0, 'Rp')
      }, ],
    });
  });
</script>
<?= $this->endSection(); ?>

<?= $this->endSection(); ?>