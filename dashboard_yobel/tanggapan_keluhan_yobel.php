<?php require_once '../autoloader_yobel.php'; ?>

<?php require_once PROJECT_ROOT_YOBEL . '/helper_yobel/authcheck_yobel.php' ?>
<?php 
  $nik_yobel = $_SESSION['id_user_yobel'];
  $id_pengaduan_yobel = $_GET['id_pengaduan_yobel'];

  $qDataTanggapan = query_yobel("SELECT tanggapan_yobel.*, petugas_yobel.nama_petugas_yobel FROM `tanggapan_yobel` 
  INNER JOIN petugas_yobel ON tanggapan_yobel.id_petugas_yobel = petugas_yobel.id_petugas_yobel
  WHERE tanggapan_yobel.id_pengaduan_yobel = '$id_pengaduan_yobel' ORDER BY tanggapan_yobel.id_tanggapan_yobel DESC");

  // if(!check_valid_role_yobel('masyarakat')){
  //   $_SESSION['gagal_yobel'] = 'Unauthorized';
  //   header('Location: home_yobel.php');
  //   return;
  // }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
  }
?>

<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/head_yobel.php' ?>
<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/partials_yobel/sidebarStart_yobel.php' ?>

  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <h4>Tanggapan Aduan</h4>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="row mb-2">
          <div class="col text-end">
            <?php if(check_valid_role_yobel(['admin', 'petugas'])): ?>
              <form action="tambah_tanggapan_yobel.php" method="get">
                <input type="hidden" name="id_pengaduan_yobel" value="<?= $id_pengaduan_yobel ?>">
                <button type="submit" name="proses_action_yobel" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tanggapan</button>
              </form>
            <?php endif; ?>
          </div>
        </div>
        <table class="table table-responsive table-striped table-bordered" style="min-width: 800px">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Penanggap</th>
              <th>Tanggapan</th>
              <!-- <th>Aksi</th> -->
            </tr>
          </thead>
          <tbody>
            <?php while($row_yobel = mysqli_fetch_object($qDataTanggapan)): ?>
              <tr>
                <td><?= $row_yobel->tgl_tanggapan_yobel ?></td>
                <td><?= $row_yobel->nama_petugas_yobel ?></td>
                <td><?= $row_yobel->tanggapan_yobel ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/partials_yobel/sidebarEnd_yobel.php' ?>
<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/foot_yobel.php' ?>