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
if (!isset($_SESSION['userid'])) header("location:login.php");

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
    <div class="container">
        
        <div class="row justify-content-center" id="display_item" style="margin-top: 4%;">
        <div class="row justify-content-start">
                <p>รูปแบบการจอง</p>
                <div class="col-10 d-flex justify-content-start">
                    <button type="button" class="btn btn-outline-danger" style="margin-right: 10px;"onclick="location.href='noticfication.php'">เลือกลายที่ร้านมี</button>
                    <button type="button" class="btn btn-danger" style="margin-right: 10px;" onclick="location.href='noticfication2.php'">อัปโหลดภาพที่ต้องการสัก</button>
                    <button type="button" class="btn btn-outline-danger" onclick="location.href='noticfication3.php'">จ้างให้ร้านออกแบบลายสัก</button>
                </div>
            </div>
            <table class="col-sm-6 table">
                <thead>
                    <tr>
                        <th>วันที่่จอง</th>
                        <th>สถานะ</th>
                        <th>รายละเอียด</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //เรียกข้อมูลจากตาราง order
                    $customerNumber = $_SESSION['userid']; //แทนค่า session ด้วยตัวแปร
                    $order = mysqli_query($conn, "SELECT order_id, date, time, order_detail, status, user_id, time_stamp FROM book_detail WHERE user_id = $customerNumber AND book_type = 2"); //เลือกข้อมูลที่ต้องการจากใน orders
                    //แสดงประวัติการสั่งซื้อ
                    if ($order && mysqli_num_rows($order) > 0) { //ถ้าค่าเท่ากันจริงๆให้ทำตามเงื่อนไข
                        while ($rs = mysqli_fetch_array($order)) { //while loop เพื่อแสดงข้อมูลออกมา

                    ?>
                            <tr>
                                <td><?php echo $rs['date']; ?></td>
                                <td><?php echo $rs['status']; ?></td>
                                <td><a class="btn btn-success" href="order_detail2.php?oid=<?php echo $rs['order_id']; ?>">รายละเอียด</a></td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>

    </div>
    <?php include('_footer.php'); ?>
</body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly" defer></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

</html>