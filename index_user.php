<?php include('db_connect.php'); ?>
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
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <title>Babla.tattoostudio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</head>
<?php ?>
<div class="success">

</div>

<?php
session_start();
if (!isset($_SESSION['userid']))header("location:login.php");

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('locationL login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
?>

<body>

    <div class="container-fluid">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-12 border-bottom"">
      <a href=" index_user.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="img/logo.png" alt="logo" style="width: 15%;height: auto; margin-left:15%;">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="index_user.php" class="nav-link px-2 link-danger">หน้าหลัก</a></li>
                <li><a href="booking.php" class="nav-link px-2 link-dark">จองคิว</a></li>
                <li><a href="about_user.php" class="nav-link px-2 link-dark">เกี่ยวกับเรา</a></li>
             
            </ul>

            <div class="col-md-3 text-end" style="margin-right: 2%;">
                <a href="user_profile.php"><i class="fa-solid fa-user" style="font-size:28px; color:#000000; padding-right:5%; padding-left:5%;"></i></a>
                <a href="noticfication.php"><i class="fa-solid fa-bell" style="font-size:28px; color:#000000; padding-right:5%; padding-left:5%"></i></a>
                <button type="button" class="btn btn-danger"><a class="logout" href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบใช่ไหม?');">logout</a></button>
            </div>

        </header>
    </div>
    <style>
        .logout {
            float: left;
            text-decoration: none;
            color: white;
        }

        .logout :hover {
            color: white;
        }
    </style>


    <div class="container-fluidrow flex justify-content-center">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/banner.png" class="d-block w-100" alt="1">
                </div>
                <div class="carousel-item">
                    <img src="img/banner2.png" class="d-block w-100" alt="2">
                </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <div class="container col-xxl-8 px-4 py-5">
            <div id="hero" class="row flex-lg-row-reverse justify-content-center align-items-center g-5 py-5">
                <div class="col-lg-6 ">
                    <h1 class="display-5 justify-content-center fw-bold lh-1 mb-3" style="text-align: center;">สวัสดีค่ะ/ครับ</h1>
                    <p class="lead"> ยินดีต้อนรับคุณลูกค้าทุกท่านเข้าสู่ร้านสัก Babla.tattoostudio ร้านสักของเราเปิดให้บริการมาได้ประมาณ 7 ปีแล้ว โดยมีหน้าร้านตั้งอยู่
                        บริเวณตรงข้ามหน้ามหาวิทยาลัยสิลปากร วิทยาเขตสนามจันทร์ ทางร้าน
                        รับงานสักหลายประเภทไม่ว่าจะเป็น สักแทททู สักสี ที่ผ่านมาลูกค้ามักจะใช้
                        บริการสักลายแนวมินิมอล ข้อความ หรือตัวอักษรเป็นส่วนใหญ่
                        หากท่านสนใจจะใช้บริการสักของทางร้าน สามารถเช็ควันเวลา
                        และกดจองคิวได้เลย</p>
                    <div class="d-grid gap-2 d-md-flex  justify-content-md-center">
                        <button type="button" class="booking btn btn-success btn-lg px-4 me-md-2" onclick="location.href='booking.php'" style="margin-top: 4%; width: 80%; height: 56px; border-radius: 50px;">จองคิว</button>
                    </div>
                </div>
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="img/aaa1981.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                </div>

            </div>
        </div>



        <div class="row g-4  py-2 row-cols-1 row-cols-lg-3 justify-content-center ">
            <div class="featue col justify-content-center ">
                <img class="feat justify-content-center" src="img/shield.png">
                <h3 class="fs-2 justify-content-center">ปลอดภัย</h3>
                <p class="justify-content-center">ร้านสักมีใบประกอบวิชาชีพ รับรองอย่างถูกกฎหมาย</p>

            </div>
            <div class="featue col">
                <img class="feat" src="img/badge.png">
                <h3 class="fs-2">คุณภาพ</h3>
                <p>มีประสบการณ์การสักกว่า 7 ปี ได้รับเสียงตอบรับเชิงบวกจากผู้ใช้บริการมาโดยตลอด</p>

            </div>
            <div class="featue col">
                <img class="feat" src="img/care.png">
                <h3 class="fs-2">ห่วงใย</h3>
                <p>รับประกันและดูแลลูกค้าหลังใช้บริการจนกว่าแผลจะหายสนิท</p>

            </div>
        </div>
       
        
        <div id="map_canvas"  class="row" style="background: #f5f5f5; height:300px; width: 100%;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2112.7750198600543!2d100.57965109496776!3d13.788122313180464!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2e53dbc01092d%3A0xdfb6d1d2389dd2bf!2sBabla%20Tattoo%20Studio!5e0!3m2!1sth!2sth!4v1671044525847!5m2!1sth!2sth" width="800" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    </div>
    <!-- row -->
    <?php include('_footer.php'); ?>
</body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly" defer></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

</html>