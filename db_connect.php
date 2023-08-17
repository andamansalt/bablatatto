<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bablatattoostudio";
  global $conn;
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Connection failed" . mysqli_connect_error());
  } 
  $charset = "SET NAMES 'UTF8'";
error_reporting( error_reporting() & ~E_NOTICE );

mysqli_query($conn, $charset);
?>