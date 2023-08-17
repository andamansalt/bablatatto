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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <title>Babla.tattoostudio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
</head>

<body>


    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom"">
      <a href=" index_user.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="img/logo.png" alt="logo" style="width: 15%;height: auto;">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="index.php" class="nav-link px-2 link-dark">หน้าหลัก</a></li>
                <li><a href="booking.php" class="nav-link px-2 link-dark">จองคิว</a></li>
                <li><a href="about.php" class="nav-link px-2 link-danger">เกี่ยวกับเรา</a></li>
                
            </ul>

            <div class="col-md-3 text-end">
                <a href="login.php"><button type="button" class="loginbutton btn btn-danger me-2">ลงทะเบียน/เข้าสู่ระบบ</button></a>
                <!-- <a href="#"><i class="fa-solid fa-user" style="font-size:28px; color:#000000; padding-right:5%; padding-left:5%;"></i></a>
       <a href=""><i class="fa-solid fa-bell" style="font-size:28px; color:#000000;"></i></a>  -->
                <!-- <button type="button" class="btn btn-danger">Sign-up</button> -->
            </div>
            <!-- <a href="#"><i class="fa-solid fa-user" style="font-size:28px; color:#000000; padding-right:5%; padding-left:5%;"></i></a>
            <a href=""><i class="fa-solid fa-bell" style="font-size:28px; color:#000000;"></i></a> -->
        </header>
    </div>

    <div class="container col-xxl-10 px-4 py-5">
        <div id="hero1" class="row flex-lg-row-reverse justify-content-center align-items-center g-5 py-5" style="background-color: #1B1B1B; ">
            <div class="col-lg-6 " style="background-color: #1B1B1B; width:500px; height: auto;">
                <h1 class="display-5 justify-content-center fw-bold lh-1 mb-3" style="text-align: start; color: white;">เกี่ยวกับเรา</h1>
                <p class="lead" style="color: white; font-size:16px;"> Babla.tattoostudioร้านสักของเราเปิดให้บริการมาได้ประมาณ 7 ปีแล้ว โดยมีหน้าร้านตั้งอยู่บริเวณตรงข้ามหน้ามหาวิทยาลัยสิลปากร วิทยาเขต
                    พระราชวังสนามจันทร์ อนาคตมีแผนจะย้ายไปให้บริการในเขตกรุงเทพมหานคร ทางร้านรับงานสักหลายประเภทไม่ว่าจะเป็น สักแทททู สักสี ที่ผ่านมาลูกค้ามักจะ
                    ใช้บริการสักลายแนวมินิมอล ข้อความ หรือตัวอักษรเป็นส่วนใหญ่</p>
                <p class="lead" style="color: white; font-size:16px;"> ขอขอบคุณลูกค้าทุกท่าน</p>
                <ul class="nav col-md-4 justify-content-start list-unstyled d-flex" style="color: white; font-size:36px;">
                    <li class="ms-3"><i class="fa-brands fa-facebook"></i></li>
                    <li class="ms-3"><i class="fa-brands fa-instagram"></i></li>
                </ul>

            </div>
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="img/background.png" class="d-block mx-lg-auto img-fluid " alt="Bootstrap Themes" width="700" height="900" loading="lazy">
            </div>

        </div>
    </div>

    </div>
    <!-- row -->
    <?php include('_footer.php'); ?>
</body>

</html>