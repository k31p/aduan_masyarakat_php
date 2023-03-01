<?php 
  session_start();
  date_default_timezone_set('Asia/Jakarta');
  define('PROJECT_ROOT_YOBEL', __DIR__);
  define('BASE_URL_YOBEL', 'http://localhost/aduancurhatmurni_yobel');
  require_once PROJECT_ROOT_YOBEL . '/helper_yobel/database_yobel.php';
  require_once PROJECT_ROOT_YOBEL . '/helper_yobel/functions_yobel.php';