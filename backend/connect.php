<?php
  $mysqli = new mysqli("localhost","root","","linhkienmaytinh");

  if ($mysqli -> connect_errno) {
    echo "Không kết nối được với MySQL: " . $mysqli -> connect_error;
    exit();
  }

  //echo "Initial character set is: " . $mysqli -> character_set_name();

  // Change character set to utf8
  $mysqli -> set_charset("utf8");

  //echo "Current character set is: " . $mysqli -> character_set_name();

?>