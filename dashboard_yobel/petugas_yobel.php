<?php require_once '../autoloader_yobel.php'; ?>

<?php require_once PROJECT_ROOT_YOBEL . '/helper_yobel/authcheck_yobel.php' ?>
<?php 
  if(!check_valid_role_yobel('admin')){
    $_SESSION['gagal_yobel'] = 'Unauthorized';
    header('Location: home_yobel.php');
    return;
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

  }

  $qDataPetugas_yobel = query_yobel("SELECT * FROM petugas_yobel");
?>

<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/head_yobel.php' ?>
<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/partials_yobel/sidebarStart_yobel.php' ?>

  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <h4>List Data Petugas</h4>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="row mb-2">
          <div class="col text-end">
            <a href="<?= base_url_yobel('/dashboard_yobel/petugas_yobel/tambah_yobel.php') ?>" class="btn btn-primary"><i class="fa fa-plus"></i></a>
          </div>
        </div>
        <table class="table table-striped table-bordered" id="datatable_yobel">
          <thead>
            <tr>
              <th>Username</th>
              <th>Nama</th>
              <th>Nomor Telepon</th>
              <th>Level</th>
              <!-- <th>Aksi</th> -->
            </tr>
          </thead>
          <tbody>
            <?php while($row_yobel = mysqli_fetch_object($qDataPetugas_yobel)): ?>
              <tr>
                <td><?= $row_yobel->username_yobel ?></td>
                <td><?= $row_yobel->nama_petugas_yobel ?></td>
                <td><?= $row_yobel->telp_yobel ?></td>
                <td><?= $row_yobel->level_yobel ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/partials_yobel/sidebarEnd_yobel.php' ?>
<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/foot_yobel.php' ?>