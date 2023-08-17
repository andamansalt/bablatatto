<?php
session_start();
include "db_connect.php";
global $conn;
$errors = array();

if (isset($_POST['reg_user'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password_1)) {
        array_push($errors, "password is required");
    }
    if (empty($phone)) {
        array_push($errors, "phone is required");
    }
    if (empty($email)) {
        array_push($errors, "email is required");
    }
    if (empty($gender)) {
        array_push($errors, "gender is required");
    }
    if (empty($birthday)) {
        array_push($errors, "birthday is required");
    }

    if ($password_1 != $password_2) {
        array_push($errors, "The two password do not match");
    }

    $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
    $query = mysqli_query($conn, $user_check_query);
    $result = mysqli_fetch_assoc($query);

    if ($result) {
        if ($result['username'] === $username) {
            array_push($errors, "Username already exists");
            echo '<script language="javascript">';
            echo 'alert("Username already exists")';
            echo '</script>';
            header('location: register.php');
        }
        if ($result['email'] === $email) {
            array_push($errors, "Email already exists");
            echo '<script language="javascript">';
            echo 'alert("Email already exists")';
            echo '</script>';
            header('location: register.php');
            
        }
        header('location: register.php');
    }

    if (count($errors) == 0) {
        $password = md5($password_1);

        $sql = "INSERT INTO user (username, password, phone, email, gender, birthday) VALUES ('$username', '$password', '$phone', '$email', '$gender', '$birthday')";
        mysqli_query($conn, $sql);
                
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        // header('location: index_user.php');
    }
    
    if (isset($_SESSION['username'])) {
    
        //ซ่อนpassword
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    
    
        $result = mysqli_query($conn,$query);
    
        if (!$result || mysqli_num_rows($result) == 1) {
           
            $row = mysqli_fetch_array($result);
    
             $_SESSION['userid'] = $row['user_id'];
             $_SESSION['name'] = $row['username'];
             $_SESSION['userlevel'] = $row['type'];
            //เลือกหน้าที่จะไปด้วยเลข1กับ0
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
}
?>