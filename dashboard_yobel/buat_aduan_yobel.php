<?php require_once '../autoloader_yobel.php'; ?>

<?php require_once PROJECT_ROOT_YOBEL . '/helper_yobel/authcheck_yobel.php' ?>
<?php 
  if(!check_valid_role_yobel('masyarakat')){
    $_SESSION['gagal_yobel'] = 'Unauthorized';
    header('Location: home_yobel.php');
    return;
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tgl_pengaduan_yobel = date('Y-m-d');
    $nik_yobel = $_SESSION['id_user_yobel'];
    $isi_laporan_yobel = htmlspecialchars(mysqli_escape_string($conn_yobel, $_POST['isi_laporan_yobel']));
    
    $status_yobel = '0';
    if($_FILES['foto_yobel']['error'] == 0){
      $rand_name_yobel = bin2hex(random_bytes(16));
      $image_extension_yobel = explode('/', $_FILES['foto_yobel']['type'])[1];
      $foto_yobel = $rand_name_yobel . '.' . $image_extension_yobel;

      $isMoved_yobel = move_uploaded_file($_FILES['foto_yobel']['tmp_name'], PROJECT_ROOT_YOBEL . '/uploads_yobel/' . $foto_yobel);
    
      if(!$isMoved_yobel){
        echo 'Gagal mengupload gambar';
        return;
      }
    }
    else {
      $foto_yobel = '';
    }

    $query_yobel = query_yobel("INSERT INTO `pengaduan_yobel` (`id_pengaduan_yobel`, `tgl_pengaduan_yobel`, `nik_yobel`, `isi_laporan_yobel`, `foto_yobel`, `status_yobel`) VALUES (NULL, '$tgl_pengaduan_yobel', '$nik_yobel', '$isi_laporan_yobel', '$foto_yobel', '$status_yobel')");

    $_SESSION['berhasil_yobel'] = 'Berhasil membuat keluhan';
    header('Location: keluhan_kamu_yobel.php');
    return;
  }
?>

<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/head_yobel.php' ?>
<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/partials_yobel/sidebarStart_yobel.php' ?>

  <div class="container mt-5">
    <div class="row">
      <div class="col">
        <h4>Hayuk mengeluh</h4>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="">Tanggal Pengaduan</label>
                <input type="date" name="tglPengaduan_yobel" class="form-control" value="<?= date('Y-m-d') ?>" readonly disabled>
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <div class="form-group">
                <label for="">Pelapor/Pengeluh</label>
                <input type="text" name="pelapor_yobel" class="form-control" value="<?= $_SESSION['nama_user_yobel'] ?>" readonly disabled>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="">Laporan/Keluhan</label>
            <textarea name="isi_laporan_yobel" id="" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="">Foto (Opsional)</label>
            <input type="file" class="form-control" name="foto_yobel" accept="image/png,image/jpg,image/jpeg">
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