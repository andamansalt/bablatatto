<?php include('db_connect.php');
session_start(); ?>

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
    <link rel="stylesheet" href="css/booking.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Babla.tattoostudio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<?php if (isset($_SESSION['success']))

?>
<div class="success">

</div>

<body>
    <!-- header -->
    <div class="container-fluid">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-12 border-bottom"">
      <a href=" index_user.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="img/logo.png" alt="logo" style="width: 15%;height: auto; margin-left:15%;">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="index_user.php" class="nav-link px-2 link-dark">หน้าหลัก</a></li>
                <li><a href="booking.php" class="nav-link px-2 link-danger">จองคิว</a></li>
                <li><a href="about_user.php" class="nav-link px-2 link-dark">เกี่ยวกับเรา</a></li>
            </ul>

            <div class="col-md-3 text-end" style="margin-right: 2%;">
                <a href="user_profile.php"><i class="fa-solid fa-user" style="font-size:28px; color:#000000; padding-right:5%; padding-left:5%;"></i></a>
                <a href="noticfication.php"><i class="fa-solid fa-bell" style="font-size:28px; color:#000000; padding-right:5%; padding-left:5%"></i></a>
                <button type="button" class="btn btn-danger"><a class="logout" href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบใช่ไหม?');">logout</a></button>
            </div>

        </header>
    </div>
    <!-- header -->
    <div class="main-content">
        <div class="container ">
            <div class="row justify-content-center py-5">
                <div class="col-2 d-flex justify-content-end">
                    <div class="circle">
                        <h1>1</h1>
                    </div>
                </div>
                <hr class="line">
                <div class="col-2 d-flex justify-content-center">
                    <div class="circle2">
                        <h1>2</h1>
                    </div>
                </div>
                <hr class="line ">
                <div class="col-2">
                    <div class="circle2">
                        <h1>3</h1>
                    </div>
                </div>
            </div>
            <hr style="border-top: 2px solid #000000 ;">

            <div class="row justify-content-start">
                <p>รูปแบบการจอง</p>
                <div class="col-10 d-flex justify-content-start">
                    <button type="button" class="btn btn-outline-danger" style="margin-right: 10px;"onclick="location.href='booking1.php'">เลือกลายที่ร้านมี</button>
                    <button type="button" class="btn btn-outline-danger" style="margin-right: 10px;" onclick="location.href='booking2.php'">อัปโหลดภาพที่ต้องการสัก</button>
                    <button type="button" class="btn btn-outline-danger" onclick="location.href='booking3.php'">จ้างให้ร้านออกแบบลายสัก</button>
                </div>
            </div>
        </div>
        
                    </div>
                </div>
                
            </div>
        </div>
    </div>



    <?php include('_footer.php'); ?>
</body>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

</html>