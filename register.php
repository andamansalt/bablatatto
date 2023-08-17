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
                    <form action="register_db.php" method="post">
                        <h1 class="h3 mb-3 fw-normal" style="text-align:center; font-size:50px;">สมัครสมาชิก</h1>
                        <!-- <h1 class="h3 mb-3 fw-normal">สมัครสมาชิก</h1> -->


                        <div class="form-floating" style="margin-bottom: 3%;">
                            <input type="text" class="form-control" name="username" placeholder="Usernaeme" required style="border-radius: 25px; border:solid #7A7676;">
                            <label for="username">ชื่อผู้ใช้</label>
                        </div>
                        <div class="form-floating" style="margin-bottom: 3%; ">
                            <input type="password" class="form-control" name="password_1" placeholder="Password" required style="border-radius: 25px; border:solid #7A7676;">
                            <label for="password_1">รหัสผ่าน</label>
                        </div>
                        <div class="form-floating" style="margin-bottom: 3%; ">
                            <input type="password" class="form-control" name="password_2" placeholder="Confirm Password" required style="border-radius: 25px; border:solid #7A7676;">
                            <label for="password_2">ยืนยันรหัสผ่าน</label>
                        </div>
                        <div class="form-floating" style="margin-bottom: 3%; ">
                            <input type="tel" class="form-control" name="phone" placeholder="Phone Number" required style="border-radius: 25px; border:solid #7A7676;">
                            <label for="phone">เบอร์โทรศัพท์</label>
                        </div>
                        <div class="form-floating" style="margin-bottom: 3%; ">
                            <input type="email" id="email"class="form-control" name="email" placeholder="E-mail" required style="border-radius: 25px; border:solid #7A7676;">
                            <label for="email">E-mail</label>
                        </div>
                        <div class="form-floating g" style="margin-bottom: 7%; ">
                            <label for="gender">เพศ</label>
                            <input type="radio" name="gender" value="Male"style="margin-top: 22px;"> ชาย
                            <input type="radio" name="gender" value="Female"> หญิง
                            <input type="radio" name="gender" value="etc"> อื่นๆ

                        </div>
                        <div class="form-floating" style="margin-bottom: 3%; ">
                            <input type="date" class="form-control" name="birthday" placeholder="birthday" required style="border-radius: 25px; border:solid #7A7676;">
                            <label for="birthday">วันเกิด</label>
                        </div>
                

                        <button class="w-100 btn btn-lg btn-secondary" style="border-radius: 25px;" type="submit" name="reg_user" autocomplete="on">ยืนยันการสมัคร</button>

                    </form>

                </main>
            </div>
        </div>

        <script src="js/bootstrap.min.js"></script>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>