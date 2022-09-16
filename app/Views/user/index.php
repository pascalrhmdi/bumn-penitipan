<?= $this->extend('layouts/app.php') ?>

<?= $this->section('main') ?>

<?php
helper('text');
?>

<div class="row">
  <div class="my-3">
    <h4>Tabel Akun Pengelola</h4>
    <p class="m-0">Berisi tabel Akun yang ada di basis data.</p>
  </div>
  <div class="row my-3 justify-content-end">
    <a class="btn btn-primary col-3 col-xl-2 align-items-center" href="<?= site_url("/register"); ?>">
      <svg class="icon icon-xs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
      </svg>
      Tambah <span class="text-italic">Akun</span></a>
  </div>
  <div class="table-responsive">
    <table id="user" class="table table-hover table-bordered align-middle">
      <thead>
        <tr>
          <th class="text-center">No.</th>
          <th class="text-center">Nama</th>
          <th class="text-center">Status</th>
          <th class="text-center">Peran</th>
          <th class="text-center"  style="max-width:8rem">Dibuat Tgl</th>
          <th class="text-center text-italic"  style="max-width:7rem">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $index => $user) : ?>
          <tr>
            <?php
              $role = $user->getRoles();
            ?>
            <td class="text-center"><?= $index + 1; ?></td>
            <td class="text-wrap"><?= $user->username; ?></td>
            <td class="text-wrap <?= $user->active ? "text-success" : "text-danger"; ?>"><?= $user->active ? "Aktif" : "Tidak Aktif"; ?></td>
            <td class="text-wrap  text-capitalize"><?= $role[1] ?? $role[2] ?></td>
            <td class="text-capitalize"  style="max-width:6rem" data-order="<?= $user->created_at->timestamp; ?>"><?= $user->created_at->toLocalizedString('dd MMMM YYYY'); ?></td>
            <td class="d-flex justify-content-center gap-2">
              <a class="btn btn-sm btn-secondary" href="<?= site_url("admin/user/" . $user->id); ?>" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                </svg>
              </a>
              <a class="btn btn-sm btn-info <?php if($user->id === user_id()) echo "d-none" ?>" href="<?= site_url("admin/user/" . $user->id); ?>/edit" role="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                </svg>
              </a>

              <!-- Button trigger modal -->
              <div class="<?php if($user->id == user_id()) echo "d-none" ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                <button type="button" class="btn btn-sm btn-danger"  data-bs-toggle="modal" data-bs-target="#confirmDelete" onclick="confirm_modal('<?= $user->username ?>', <?= $user->id ?>)">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                  </svg>
                </button>
              </div>
              
            </td>
          </tr>
          <?php endforeach ?>
          <!-- Modal -->
          <div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="confirmDeleteLabel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="confirmDeleteLabel">Hapus Pengguna</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Yakin ingin menghapus Pengguna <span id="namaPengguna"></span>?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <form action="asd" method="POST" id="formId" >
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE" />
                    <button class="btn btn-danger" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                      Hapus
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </tbody>
    </table>
  </div>
</div>

<?= $this->section('pageScripts'); ?>
<script>
  $(document).ready(function() {
    $('#user').DataTable({
      order: [[2, 'desc']],
      language: {
        emptyTable: 'Tidak ada data akun'
      }
    });
  });

  function confirm_modal(namaPengguna, id)
    {
      $('#namaPengguna').text(namaPengguna)
      $('#formId').attr('action', `http://pbw-2.test/admin/user/${id}`);
    }
</script>
<?= $this->endSection(); ?>

<?= $this->endSection() ?>