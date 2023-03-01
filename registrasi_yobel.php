<?php require_once 'autoloader_yobel.php'; ?>

<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nik_yobel = $_POST['nik_yobel'];
    $nama_yobel = $_POST['nama_yobel'];
    $telp_yobel = $_POST['telp_yobel'];
    $username_yobel = $_POST['username_yobel'];
    $password_yobel = md5($_POST['password_yobel']);

    $query_yobel = query_yobel("SELECT * FROM masyarakat_yobel WHERE username_yobel = '$username_yobel' OR nik_yobel = '$nik_yobel'");
    $query1_yobel = query_yobel("SELECT * FROM petugas_yobel WHERE username_yobel = '$username_yobel'");

    if(mysqli_num_rows($query_yobel) > 0 || mysqli_num_rows($query1_yobel) > 0){
      $_SESSION['gagal_yobel'] = 'Username atau NIK sudah ada';
      header('Method: GET');
      header('Location: registrasi_yobel.php');
      return;
    }

    $query_yobel = query_yobel("INSERT INTO `masyarakat_yobel` (`nik_yobel`, `nama_yobel`, `username_yobel`, `password_yobel`, `telp_yobel`) VALUES ('$nik_yobel', '$nama_yobel', '$username_yobel', '$password_yobel', '$telp_yobel')");

    if($query_yobel){
      $_SESSION['berhasil_yobel'] = 'Registrasi berhasil, kamu sudah bisa login';
      header('Location: login_yobel.php');
      return;
    }
    else {
      $_SESSION['gagal_yobel'] = 'Registrasi gagal, silahkan coba lagi nanti';
    }
  }
?>

<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/head_yobel.php' ?>

  <div class="row m-0 justify-content-center align-items-center" style="height: 80vh"> 
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Registrasi</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <form action="" method="post">
                  <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik_yobel" class="form-control" required>
                  </div>
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
                  <div class="row mt-2">
                      <div class="col text-end">
                          <button type="submit" class="btn btn-primary">Registrasi</button>
                      </div>
                  </div>
              </form>
              </div>
            </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/foot_yobel.php' ?>