<?php include('db_connect.php');

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index_user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Babla.tattoostudio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    <?php include('./user_header.php'); ?>
    <?php
    $s_userid = $_SESSION['userid'];
    $sql = "SELECT * FROM `user` WHERE `user_id` = $s_userid ";
    // echo $sql;
    $result = $conn->query($sql);
    $row = $result->fetch_array();

    ?>
    <?php
    if (isset($_POST['submitupdate'])) {

        //                       $email = $_POST['email'];
        $pass = $_POST['password'];
        $conpass = $_POST['conpassword'];
        $md5pass = md5($pass); //ทำให้admitไม่รู้pass
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $address = $_POST['address'];


        if ($conpass == $pass) {
            //                            $md5pass = md5($pass);
            // $sql_up = "UPDATE user SET password ="$md5pass",firstname ="$firstname", lastname ="$lastname", phone = "$tel", email = "$email", address ="$address" WHERE user_id = $s_userid";
            $sql_up = "UPDATE user SET password ='$md5pass',firstname ='$firstname', lastname ='$lastname', phone = '$tel', address ='$address' WHERE user_id = $s_userid";
            //                                    . " VALUES ('$username', '$md5pass' , '$name' , '$surname' , '$tel' , '$email')";
            //                            "UPDATE `reserve` SET `$time` = `$time` - $table WHERE `id_res`= 1 ";
            echo $sql_up;
            $res = mysqli_query($conn, $sql_up);
            //$sql_time.=" where username='$username' and password='$md5pass'";
            if ($res == 1) {
                //                            header("Location:login.php");
                echo '<script> 
                                document.location.replace("user_profile.php");
                            </script>';
            }
        } else
            echo "<br>Password ไม่ตรงกัน กรุณากรอก Password ใหม่<br>";
    }
    ?>
    <div class="mian-content">
        <!-- header -->


        <h1 class="header-w3ls">
        </h1>
        <div class="container" align="center">
            <div class="col-md-6" style="border:2px solid #006400;">

                <form method="post">

                    <div class="main">
                        <br>
                        <h1>Edit Profile</h1>
                        <br>
                        <img src="img/logo.png" alt="" width="50px" class="img-fluid">
                        <div class="icon-head">
                        </div>
                        <br>
                        <h4> User : <?php echo $_SESSION['name'] ?></h4>
                        <br>
                        <div class="form-right-w3ls ">
                            <input type="password" class="form-control" name="password" placeholder="Password" value="">
                            <div class="clear"></div><br>
                        </div>
                        <div class="form-right-w3ls ">
                            <input type="password" class="form-control" name="conpassword" placeholder="Confrim Password" value="">
                            <div class="clear"></div>
                        </div><br>

                        <div class="form-right-w3ls">
                            <input type="text" class="form-control" name="email" placeholder="Your mail @example.com" value="<?php echo $row[5] ?>" disabled readonly>
                            <div class=""></div><br>
                        </div><br>
                        <div class="form-right-w3ls">
                            <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo $row[8] ?>">
                            <div class=""></div>
                        </div><br>
                        <div class="form-right-w3ls">
                            <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo $row[9] ?>">
                            <div class=""></div>
                        </div><br>
                        <div class="form-right-w3ls">
                            <input type="text" class="form-control" name="address" placeholder="Address" value="<?php echo $row[7] ?>">
                            <div class=""></div><br>
                            <div class="form-right-w3ls">
                                <input type="text" class="form-control" name="tel" placeholder="Tel number" value="<?php echo $row[3] ?>">
                                <div class=""></div>
                            </div><br>
                        </div><br>


                        <button type="submit" name="submitupdate" class="btn btn-success">Update Profile</button>
                        <br>
                        <br>

                        <button type="submit" name="submitback" class="btn btn-success"><a href="index_user.php" class="text-light"> Back </a></button>

                        <br><br>




                    </div>
            </div>
            </form>
            <br><br>

        </div>
    </div>
    <br><br>

    <?php include('_footer.php'); ?>
</body>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

</html>