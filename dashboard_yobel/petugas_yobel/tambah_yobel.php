<?php require_once '../../autoloader_yobel.php'; ?>

<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama_yobel = $_POST['nama_yobel'];
    $telp_yobel = $_POST['telp_yobel'];
    $username_yobel = $_POST['username_yobel'];
    $password_yobel = md5($_POST['password_yobel']);
    $level_yobel = $_POST['level_yobel'];

    $query_yobel = query_yobel("SELECT * FROM masyarakat_yobel WHERE username_yobel = '$username_yobel'");
    $query1_yobel = query_yobel("SELECT * FROM petugas_yobel WHERE username_yobel = '$username_yobel'");

    if(mysqli_num_rows($query_yobel) > 0 || mysqli_num_rows($query1_yobel) > 0){
      $_SESSION['gagal_yobel'] = 'Username sudah ada';
      header('Method: GET');
      header('Location: tambah_yobel.php');
      return;
    }

    $query_yobel = query_yobel("INSERT INTO `petugas_yobel` (`id_petugas_yobel`, `nama_petugas_yobel`, `username_yobel`, `password_yobel`, `telp_yobel`, `level_yobel`) VALUES (NULL, '$nama_yobel', '$username_yobel', '$password_yobel', '$telp_yobel', '$level_yobel')");

    if($query_yobel){
      $_SESSION['berhasil_yobel'] = 'Berhasil';
      header('Location: ' . base_url_yobel('/dashboard_yobel/petugas_yobel.php'));
      return;
    }
    else {
      $_SESSION['gagal_yobel'] = 'Registrasi gagal, silahkan coba lagi nanti';
    }
  }
?>

<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/head_yobel.php' ?>
<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/partials_yobel/sidebarStart_yobel.php' ?>

  <div class="row m-0 justify-content-center align-items-center" style="height: 80vh"> 
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Tambah Petugas</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <form action="" method="post">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama_yobel" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>Nomor Telepon</label>
                    <input type="number" name="telp_yobel" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username_yobel" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password_yobel" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label>Role</label>
                      <select name="level_yobel" class="form-select" required>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                      </select>
                  </div>
                  <div class="row mt-2">
                      <div class="col text-end">
                          <button type="submit" class="btn btn-primary">Tambah</button>
                      </div>
                  </div>
              </form>
              </div>
            </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/partials_yobel/sidebarEnd_yobel.php' ?>
<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/foot_yobel.php' ?>