<?php 
  function base_url_yobel($endpoint_yobel){
    return BASE_URL_YOBEL . $endpoint_yobel;
  }

  function query_yobel($sql_yobel){
    global $conn_yobel;
    $query_yobel = mysqli_query($conn_yobel, $sql_yobel);
    $err_yobel = mysqli_error($conn_yobel);
    if($err_yobel){
      echo $err_yobel;
      die;
    }

    return $query_yobel;
  }

  function check_valid_role_yobel($role_yobel){
    if(is_array($role_yobel)){
      return in_array($_SESSION['role_user_yobel'], $role_yobel);
    } else {
      return $_SESSION['role_user_yobel'] == $role_yobel;
    }
  }