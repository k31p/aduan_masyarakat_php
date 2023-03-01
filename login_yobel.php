<?php require_once 'autoloader_yobel.php'; ?>

<?php 
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username_yobel = $_POST['username_yobel'];
    $password_yobel = md5($_POST['password_yobel']);

    $cekPasswordPetugas_yobel = query_yobel("SELECT * FROM petugas_yobel WHERE username_yobel = '$username_yobel' AND password_yobel = '$password_yobel'");
    $login_yobel = mysqli_fetch_object($cekPasswordPetugas_yobel);
    if($login_yobel){
      $_SESSION['id_user_yobel'] = $login_yobel->id_petugas_yobel;
      $_SESSION['nama_user_yobel'] = $login_yobel->nama_petugas_yobel;
      $_SESSION['role_user_yobel'] = $login_yobel->level_yobel;

      header('Location: dashboard_yobel/home_yobel.php');
      return;
    }

    $cekPasswordMasyarakat_yobel = query_yobel("SELECT * FROM masyarakat_yobel WHERE username_yobel = '$username_yobel' AND password_yobel = '$password_yobel'");
    $login_yobel = mysqli_fetch_object($cekPasswordMasyarakat_yobel);
    if($login_yobel){
      $_SESSION['id_user_yobel'] = $login_yobel->nik_yobel;
      $_SESSION['nama_user_yobel'] = $login_yobel->nama_yobel;
      $_SESSION['role_user_yobel'] = 'masyarakat';

      header('Location: dashboard_yobel/home_yobel.php');
      return;
    }

    $_SESSION['gagal_yobel'] = 'Username atau password salah';
  }
?>

<?php require_once PROJECT_ROOT_YOBEL . '/layout_yobel/head_yobel.php' ?>

  <div class="row m-0 justify-content-center align-items-center" style="height: 80vh"> 
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Login Pengaduan</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <form action="" method="post">
                  <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username_yobel" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password_yobel" class="form-control" required>
                  </div>
                  <div class="row">
                    <div class="col">
                      Belum punya akun? <a href="<?= base_url_yobel('/registrasi_yobel.php') ?>">Registrasi disini</a>
                    </div>
                  </div>
                  <div class="row mt-2">
                      <div class="col text-end">
                          <button type="submit" class="btn btn-primary">Login</button>
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