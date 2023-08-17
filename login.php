<?php include('db_connect.php'); ?>
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
                    <a href="index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                        <img src="img/logo.png" alt="logo" style="width: 100%;height: auto; margin-left:150%;">
                    </a>
                    <form action="login00.php" method="post">
                        <h1 class="h3 mb-3 fw-normal" style="text-align:center; font-size:60px; margin-left:-40%">Babla.tattoostudio</h1>
                        <h1 class="h3 mb-3 fw-normal">ยินดีต้อนรับ</h1>


                        <div class="form-floating" style="margin-bottom: 5%;">
                            <input type="text" class="form-control" style="border-radius: 25px; border:solid #7A7676;" name="username" placeholder="Usernaeme" required>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating" style="margin-bottom: 5%; ">
                            <input type="password" class="form-control" style="border-radius: 25px; border:solid #7A7676;" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>

                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="w-100 btn btn-lg btn-secondary" style="border-radius: 25px;" type="submit" name="login_user" autocomplete="on">เข้าสู่ระบบ</button>
                        <a href="register.php" class="register">
                            <p class="mt-2 mb-3 text-muted" style="float: left; margin-left: 10%;">สมัครสมาชิก</p>
                        </a>
                        <p class="mt-2 mb-3 text-muted " style="float: left; margin-left: 10%;">|</p>
                        <a href="#" class="forgot">
                            <a href="forgot-password.php">
                                <p class="mt-2 mb-3 text-muted forgot" style="float: left; margin-left: 10%;">ลืมรหัสผ่าน?</p>
                            </a>
                        </a>
                    </form>

                </main>
            </div>
        </div>

        <script src="js/bootstrap.min.js"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>