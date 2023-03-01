<?php 
  require_once '../../autoloader_yobel.php';
  require_once PROJECT_ROOT_YOBEL . '/helper_yobel/authcheck_yobel.php';
  
  session_unset();
  session_destroy();

  session_start();
  $_SESSION['berhasil_yobel'] = 'Berhasil logout';
  header('Location: ' . base_url_yobel('/login_yobel.php'));