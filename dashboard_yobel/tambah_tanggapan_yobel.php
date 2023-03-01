<?php require_once '../autoloader_yobel.php'; ?>

<?php require_once PROJECT_ROOT_YOBEL . '/helper_yobel/authcheck_yobel.php' ?>
<?php 
  if(!check_valid_role_yobel(['admin', 'petugas'])){
    $_SESSION['gagal_yobel'] = 'Unauthorized';
    header('Location: home_yobel.php');
    return;
  }

  
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id_pengaduan_yobel = $_GET['id_pengaduan_yobel'];
    $tgl_tanggapan_yobel = date('Y-m-d');
    $tanggapan_yobel = $_POST['tanggapan_yobel'];
    $id_petugas_yobel = $_SESSION['id_user_yobel'];

    $query_yobel = query_yobel("INSERT INTO `tanggapan_yobel` (`id_tanggapan_yobel`, `id_pengaduan_yobel`, `tgl_tanggapan_yobel`, `tanggapan_yobel`, `id_petugas_yobel`) VALUES (NULL, '$id_pengaduan_yobel', '$tgl_tanggapan_yobel', '$tanggapan_yobel', '$id_petugas_yobel')");
    
    $_SESSION['berhasil_yobel'] = 'Berhasil mengirim tanggapan';
    header('Location: tanggapan_keluhan_yobel.php?id_pengaduan_yobel=' . $id_pengaduan_yobel);
    return;
  }
?>

<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/head_yobel.php' ?>
<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/partials_yobel/sidebarStart_yobel.php' ?>

  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <h4>Tambah Tanggapan</h4>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="">Tanggal Tanggapan</label>
                <input type="date" name="tglTanggapan_yobel" class="form-control" value="<?= date('Y-m-d') ?>" readonly disabled>
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="">Pembuat Tanggapan</label>
                <input type="text" name="penanggap_yobel" class="form-control" value="<?= $_SESSION['nama_user_yobel'] ?>" readonly disabled>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Tanggapan</label>
            <textarea name="tanggapan_yobel" id="" class="form-control"></textarea>
          </div>
          <div class="row mt-2">
            <div class="col text-end">
              <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/partials_yobel/sidebarEnd_yobel.php' ?>
<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/foot_yobel.php' ?>