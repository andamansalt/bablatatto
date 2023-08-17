<?php 
//ล้างsessionแล้วกลับหน้าlogin
    session_start();
    session_destroy();
    header("Location: login.php");

?>