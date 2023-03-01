<?php 

  if(!isset($_SESSION['id_user_yobel'])){
    $_SESSION['gagal_yobel'] = 'Login dulu yaa';
    header('Location: ' . base_url_yobel('/login_yobel.php'));
    return;
  }