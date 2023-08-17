<?php include('db_connect.php'); ?>
<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <title>Babla.tattoostudio</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container text-center">
        <div class="row">
            <div class="col">

            </div>
            <div class="col loginbrand">
                <main class="form-signin w-100 m-auto">
                   
                        <h1 class="h3 mb-3 fw-normal" style="text-align:center; font-size:60px; margin-left:-40%">Babla.tattoostudio</h1>
                        <h1 class="h3 mb-3 fw-normal">เปลี่ยนรหัสผ่านสำเร็จ</h1>

                        <?php
                        if (isset($_SESSION['info'])) {
                        ?>
                            <div class="alert alert-success text-center">
                                <?php echo $_SESSION['info']; ?>
                            </div>
                        <?php
                        }
                        ?>
                       
                        <div class="form-group">
                            <!-- <input class="form-control button" type="submit" name="check-reset-otp" value="Submit"> -->
                            <a href="login.php"><button class="w-100 btn btn-lg btn-secondary" style="border-radius: 25px;" type="submit" name="home">เข้าสู่ระบบ</button></a>
                        </div>


                    

                </main>
            </div>
        </div>

        <script src="js/bootstrap.min.js"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>