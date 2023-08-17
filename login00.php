<?php

session_start();
include "db_connect.php";
global $conn;
//เช็คusernameและpassword
if (isset($_POST['login_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    //ซ่อนpassword
    $passwordenc = md5($password);
    
    $query = "SELECT * FROM `user` WHERE username = '$username' AND password = '$passwordenc'";
    
    //echo  $query ;
    $result = mysqli_query($conn,$query);
    // echo "
    // <script>
    // alert('$query'); 
     
    // </script>";
    if (!$result || mysqli_num_rows($result) == 1) {
        
        $row = mysqli_fetch_array($result);

         $_SESSION['userid'] = $row['user_id'];
         $_SESSION['name'] = $row['username'];
         $_SESSION['userlevel'] = $row['type'];
    //      echo "
    // <script>
    // alert($_SESSION[name]);
     
    // </script>";
        // //เลือกหน้าที่จะไปด้วยเลข1กับ0
            if ($_SESSION['userlevel'] == '1') {
                 header("Location:addmin.php");
             }
             if ($_SESSION['userlevel'] == '0') {
                 header("Location:index_user.php");
             }
    } 
} else {
    header("Location:login.php");
   
  }
?>