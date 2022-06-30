<?= $this->extend('layouts/app.php') ?>

<?= $this->section('main') ?>

<?php
helper('text');
?>

<div class="row">
  <div class="my-3">
    <h4>Tabel UMKM</h4>
    <p class="m-0">Berisi tabel UMKM yang berlokasi di Denpasar, Bali.</p>
    <small class="text-muted">*Harap diperhatikan, menghapus UMKM juga menghapus barang-barang UMKM tersebut</small>
  </div>
  <?= view('Myth\Auth\Views\_message_block') ?>
  <div class="row my-3 justify-content-end">
    <a class="btn btn-primary col-3 col-xl-2 align-items-center" href="<?= site_url("/admin/umkm/new"); ?>">
      <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
      </svg>
      Tambah UMKM</a>
  </div>
  <div class="table-responsive">
    <table id="umkm" class="table table-hover table-bordered align-middle">
      <thead>
        <tr>
          <th class="text-center">No.</th>
          <th class="text-center">Nama UMKM</th>
          <th class="text-center">Nomor Telepon UMKM</th>
          <th class="text-center">Alamat</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($umkms as $index => $umkm) : ?>
          <tr>
            <td class="text-center"><?= $index + 1; ?></td>
            <td class="text-wrap" style="max-width:6rem"><?= $umkm->nama_umkm; ?></td>
            <td><a href="http://wa.me/<?= $umkm->nomor_telepon; ?>/?text=%5BPesan%20dari%20Rumah%20BUMN%20Denpasar%5D%0ASelamat%20_%3F_%2C%20semoga%20bapak%2Fibu%20selalu%20diberi%20kesehatan.%0AKami%20dari%20Rumah%20BUMN%20Denpasar%2C%20Bali." target="_blank"><?= $umkm->nomor_telepon; ?>&nbsp;<img src="<?= base_url("images/icons/whatsapp.png"); ?>" alt="Logo WA" height="23"></a></td>
            <td class="text-capitalize"><?= word_limiter($umkm->alamat, 5); ?></td>
            <td class="d-flex justify-content-center gap-2 ">
              <a class="btn btn-sm btn-secondary" href="<?= site_url("admin/umkm/" . $umkm->id); ?>" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                </svg>
              </a>
              <a class="btn btn-sm btn-info" href="<?= site_url("admin/umkm/" . $umkm->id); ?>/edit" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                </svg>
              </a>
              <form action="<?= site_url("admin/umkm/" . $umkm->id); ?>" method="POST">
              <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE" />
                <button id="delete" class="btn btn-sm btn-danger" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                  </svg>
                </button>
              </form>
            </td>
          </tr>

        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->section('pageScripts'); ?>
<script>
  $(document).ready(function() {
    $('#umkm').DataTable();
  });
</script>
<?= $this->endSection(); ?>

<?= $this->endSection() ?>