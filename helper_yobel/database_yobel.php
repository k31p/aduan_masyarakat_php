<?php 
  $server_yobel = 'localhost';
  $username_yobel = 'root';
  $password_yobel = '';
  $db_yobel = 'pengaduancurhat_yobel';

  $conn_yobel = mysqli_connect($server_yobel, $username_yobel, $password_yobel, $db_yobel);
  $err_yobel = mysqli_error($conn_yobel);
  if($err_yobel){
    echo $err_yobel;
    die;
  }