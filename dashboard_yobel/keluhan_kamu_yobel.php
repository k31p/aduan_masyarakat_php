<?php require_once '../autoloader_yobel.php'; ?>

<?php require_once PROJECT_ROOT_YOBEL . '/helper_yobel/authcheck_yobel.php' ?>
<?php 
  $nik_yobel = $_SESSION['id_user_yobel'];

  if(!check_valid_role_yobel('masyarakat')){
    $_SESSION['gagal_yobel'] = 'Unauthorized';
    header('Location: home_yobel.php');
    return;
  }

  if(isset($_POST['selesaikan_pengaduan_yobel'])){
    $id_pengaduan_yobel = $_POST['id_pengaduan_yobel'];
    $query_yobel = query_yobel("UPDATE `pengaduan_yobel` SET `status_yobel` = 'selesai' WHERE `pengaduan_yobel`.`id_pengaduan_yobel` = $id_pengaduan_yobel");
    header('Method: GET');
    header('Location: keluhan_kamu_yobel.php');
    return;
  }

  $qDataKeluhanKamu = query_yobel("SELECT * FROM `pengaduan_yobel` WHERE nik_yobel = '$nik_yobel'");
?>

<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/head_yobel.php' ?>
<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/partials_yobel/sidebarStart_yobel.php' ?>
  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <h4>List Keluhan Kamu</h4>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <table class="table table-responsive table-striped table-bordered" id="datatable_yobel" style="min-width: 800px">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal Pengaduan</th>
              <th>Isi Laporan</th>
              <th>Foto</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $num_yobel = 1; while($row_yobel = mysqli_fetch_object($qDataKeluhanKamu)): ?>
              <tr>
                <td><?= $num_yobel++ ?></td>
                <td><?= $row_yobel->tgl_pengaduan_yobel ?></td>
                <td><?= $row_yobel->isi_laporan_yobel ?></td>
                <td class="text-center">
                  <?php if($row_yobel->foto_yobel != ''): ?>
                    <img src="<?= base_url_yobel('/uploads_yobel' . '/' . $row_yobel->foto_yobel) ?>" style="max-width: 200px" alt="Gambar keluhan">
                  <?php else: ?>
                    No Image
                  <?php endif; ?>
                </td>
                <td>
                  <?php 
                    if($row_yobel->status_yobel == '0'){
                      echo '<div class="badge bg-warning">Pending</div>';
                    } 
                    else if($row_yobel->status_yobel == 'proses'){
                      echo '<div class="badge bg-info">Proses</div>';
                    } 
                    else if($row_yobel->status_yobel == 'selesai') {
                      echo '<div class="badge bg-success">Selesai</div>';
                    }
                  ?>
                </td>
                <td>
                  <div class="d-inline-flex">
                    <?php if($row_yobel->status_yobel != '0'): ?>
                      <form action="tanggapan_keluhan_yobel.php" method="get" class="me-2">
                        <input type="hidden" name="id_pengaduan_yobel" value="<?= $row_yobel->id_pengaduan_yobel ?>">
                        <button type="submit" name="proses_action_yobel" title="Lihat Tanggapan" class="btn btn-sm btn-secondary"><i class="fa fa-list"></i></button>
                      </form>
                    <?php endif; ?>
                    <?php if($row_yobel->status_yobel == 'proses'): ?>
                      <form action="" method="post">
                        <input type="hidden" name="id_pengaduan_yobel" value="<?= $row_yobel->id_pengaduan_yobel ?>">
                        <button type="submit" name="selesaikan_pengaduan_yobel" title="Tandai Selesai" class="btn btn-sm btn-success" onclick="return confirm('Selesaikan?')"><i class="fa fa-check"></i></button>
                      </form>
                    <?php endif; ?>
                  </div>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/partials_yobel/sidebarEnd_yobel.php' ?>
<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/foot_yobel.php' ?>