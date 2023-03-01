<div class="container-fluid mb-3">
  <div class="row">
    <div class="col d-flex">
      <div>
        <a href="<?= base_url_yobel('/dashboard_yobel/home_yobel.php') ?>" class="nav-link me-2">Home</a>
      </div>
  
      <?php if($_SESSION['role_user_yobel'] == 'admin'): ?>
        <div>
          <a href="<?= base_url_yobel('/dashboard_yobel/masyarakat_yobel.php') ?>" class="nav-link me-2">Masyarakat</a>
        </div>
        <div>
          <a href="<?= base_url_yobel('/dashboard_yobel/petugas_yobel.php') ?>" class="nav-link me-2">Petugas</a>
        </div>
        <div>
          <a href="<?= base_url_yobel('/dashboard_yobel/laporan_yobel.php') ?>" class="nav-link me-2" target="_blank">Buat Laporan</a>
        </div>
      <?php endif; ?>

      <?php if(check_valid_role_yobel(['admin', 'petugas'])): ?>
        <div>
          <a href="<?= base_url_yobel('/dashboard_yobel/list_keluhan_yobel.php') ?>" class="nav-link me-2">List Keluhan</a>
        </div>
      <?php endif; ?>

      <?php if($_SESSION['role_user_yobel'] == 'masyarakat'): ?>
        <div>
          <a href="<?= base_url_yobel('/dashboard_yobel/keluhan_kamu_yobel.php') ?>" class="nav-link me-2">Aduan Kamu</a>
        </div>
        <div>
          <a href="<?= base_url_yobel('/dashboard_yobel/buat_aduan_yobel.php') ?>" class="nav-link me-2">Buat Aduan</a>
        </div>
      <?php endif; ?>
  
      <div>
        <button class="btn btn-sm btn-danger" onclick="window.location.href = '<?= base_url_yobel('/dashboard_yobel/misc_yobel/logout_yobel.php') ?>'">Logout</button>
      </div>
    </div>
  </div>
</div>