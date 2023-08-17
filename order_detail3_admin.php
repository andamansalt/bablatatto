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
                <li><a href="addmin.php" class="nav-link px-2 link-dark">ลายสัก</a></li>
                <li><a href="admin_book.php" class="nav-link px-2 link-dark">จองแบบเลือกลาย</a></li>
                <li><a href="admin_book2.php" class="nav-link px-2 link-dark">จองแบบอัปโหลดรูป</a></li>
                <li><a href="admin_book3.php" class="nav-link px-2 link-danger">จองแบบจ้างออกแบบ</a></li>
            </ul>

            <div class="col-md-3 text-end" style="margin-right: 2%;">
                <a href="user_profile.php"><i class="fa-solid fa-user" style="font-size:28px; color:#000000; padding-right:5%; padding-left:5%;"></i></a>
                <a href="noticficatione.php"><i class="fa-solid fa-bell" style="font-size:28px; color:#000000; padding-right:5%; padding-left:5%"></i></a>
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

        #hero2 {
            border: 2px solid red;
            padding-top: auto;
            border-radius: 15px;
        }

        .home.vertical-center:hover {
            background-color: #000000;
        }
    </style>

    <div class="container">

        <div id="display_item row justify-content-center">
            <table class="table">
                <div class="d-grid gap-2 d-md-flex  justify-content-md-start" align="center">
                    <a href="admin_book3.php" style="text-decoration:none;">
                        <div class="home vertical-center" style="color:#184244 ; padding-top:8px;  height:40px; width:150px; border-radius:20px; background-color:white; margin-top:15px;"><i class="fa-solid fa-arrow-left"></i> ย้อนกลับ</div>
                    </a>
                </div>
                <!-- <thead>
                    <tr>
                        <th class="text-center" width="10%">ลำดับ</th>
                        <th class="text-center" width="20%">รูป</th>
                        <th class="text-center" width="30%">ชื่อสินค้า</th>
                        <th class="text-center" width="10%">จำนวน</th>
                        <th class="text-center" width="15%">ราคาต่อชิ้น</th>
                        <th class="text-center" width="15%">ราคารวม</th>
                    </tr>
                </thead> -->
                <tbody>
                    <?php

                    $orderNumber = $_REQUEST['oid'];

                    $od_detail = "SELECT book_detail.*, tatto.*, payment.*, artist.*, user.*,design.* FROM book_detail LEFT JOIN upload_picture ON book_detail.order_id = upload_picture.order_id LEFT JOIN design ON book_detail.order_id = design.order_id LEFT JOIN payment ON book_detail.order_id = payment.order_id LEFT JOIN tatto ON (book_detail.tatto_id = tatto.tatto_id) LEFT JOIN artist ON book_detail.artist_id = artist.artist_id LEFT JOIN user ON book_detail.user_id = user.user_id where book_detail.order_id = $orderNumber"; //่join ตาราง orderdetalis,orders,tbl_product
                    $order = mysqli_query($conn, $od_detail); //ดึงข้อมูลออกมา

                    $i = 1;
                    $total = 0;
                    $art = '';
                    if ($rs[9] = 1) {
                        $art = 'artist1.png';
                    } else {
                        $art = 'artist2.png';
                    }
                    //คำนวณราคารวมทั้งหมด
                    if ($order && mysqli_num_rows($order) > 0) { //ถ้า order มากก่า 0 ให้ทำ while loop
                        while ($rs = mysqli_fetch_array($order)) { //วนลูป
                            // $total += $rs['quantityOrdered'] * $rs['priceEach']; //เอาจำนวนกับราคาคูณกันแล้วเก็บใน total

                    ?>
                            <!-- <tr>
                                <td class="text-center"><?php echo $rs[0]; ?></td>
                                <td class="text-center"><img style="height: 150px;width: auto;" src="img/<?php echo $rs[7] ?>"></td>
                                <td><?php echo $rs['book_detail.time_stamp']; ?></td>
                                <td class="text-center" type="date"><?php echo $rs[1]; ?></td>
                                <td class="text-right" ><?php echo $rs['book_detail.position']; ?></td>
                                <td class="text-right"><?php echo $rs['book_detail.time']; ?></td>
                                <td class="text-right"><?php echo $rs['book_detail.time_stamp']; ?></td>
                            </tr> -->
                            <h1 class="display-5 justify-content-center fw-bold lh-1 mb-3" style="text-align: center;">รายละเอียดการจอง</h1>
                            <div class="container col-xxl-8 px-4 py-5">

                                <div id="hero2" class="row flex-lg-row-reverse justify-content-center align-items-center g-5 py-5">

                                    <div class="col-lg-6 justify-content-center align-items-center">
                                        <form action="edit_order.php" method="POST">
                                            <p class="lead">วันที่จอง: <input type="date" name="date" style="border-radius: 10px; padding:5px; border:solid 1px black;" value="<?php echo $rs[1]; ?>"></p>
                                            <p class="lead">เวลาที่จอง: <select id="time" class="form-control" name="time" placeholder="วันจอง" required style="width:50%; border-radius: 15px; border:solid 1px black; ">
                                                    <option value="12:00 น."><?php echo $rs[2]; ?></option>
                                                    <option value="12:00 น.">12:00 น.</option>
                                                    <option value="13:00 น.">13:00 น.</option>
                                                    <option value="14:00 น.">14:00 น.</option>
                                                    <option value="15:00 น.">15:00 น.</option>
                                                    <option value="16:00 น.">16:00 น.</option>
                                                    <option value="17:00 น.">17:00 น.</option>
                                                    <option value="18:00 น.">18:00 น.</option>
                                                </select></p>
                                            <p class="lead">ไซส์ของลายสัก:<input type="text" name="size" style="border-radius: 10px; padding:5px; border:solid 1px black;" value="<?php echo $rs['order_size']; ?>">
                                            <p class="lead">รายละเอียดเพิ่มเติม: <?php echo $rs[5]; ?></p>
                                            <input type="hidden" name="id" style="border-radius: 10px; padding:5px; border:solid 1px black;" value="<?php echo $rs[0]; ?>">

                                            <p class="lead">ค่ามัดจำ: <input type="text" name="price" style="border-radius: 10px; padding:5px; border:solid 1px black; width:20%;" value="<?php echo $rs[25]; ?>"> บาท (<?php echo $rs[24]; ?>)</p>

                                            <p class="lead">ช่าง: <input type="text" name="artist" style="border-radius: 10px; padding:5px; border:solid 1px black;" value="<?php echo $rs['artist_nickname']; ?>"> </p>
                                            <p class="lead">รูปที่ออกแบบ: <input type="file" name="design" value="<?php echo $rs['design_pic']; ?>"> </p>
                                            <!-- <input type="text" name="artist" style="border-radius: 10px; padding:5px; border:solid 1px black; width:25%;" value="<?php echo $rs['artist_nickname']; ?>"> </p> -->
                                            <p class="lead">เวลาเริ่มสัก: <?php echo date('h:i A', strtotime($rs[5])); ?> <input type="time" name="s_time" style="border-radius: 10px; padding:5px; border:solid 1px black;" value="<?php echo date('h:i A', strtotime($rs[5])); ?>"></p>
                                            <p class="lead">เวลาสักเสร็จ: <?php echo date('h:i A', strtotime($rs[6])); ?> <input type="time" name="e_time" style="border-radius: 10px; padding:5px; border:solid 1px black;" value="<?php echo date('h:i A', strtotime($rs[6])); ?>"></p>

                                            <button class="w-4 btn btn-lg btn-danger" style="width:120px; font-size:15px; border-radius: 25px; margin-left: 25%; margin-top:0;" type="submit" name="edit_book3" autocomplete="on">บันทึก</button>
                                        </form>
                                    </div>
                                    <div class="col-10 col-sm-8 col-lg-6">
                                        <img src="img/<?php echo $rs['design_ref_pic']; ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="500" height="500" loading="lazy"> <br>
                                        <h4>รูปที่ร้านออกแบบ</h4>
                                        <img src="img/<?php echo $rs['design_pic']; ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="500" height="500" loading="lazy">
                                    </div>
                                   
                                    <button class="w-4 btn btn-lg btn-primary" style="width: 200px; font-size:15px; border-radius: 25px; margin-left: 10px; margin-top: 1%;" type="submit" name="edit_book4" onclick="location.href='edit_after_order.php?oid=<?php echo $rs['order_id']; ?>'" autocomplete="on">บันทึกชำระเงินหลังสัก</button>


                                </div>
                            </div>


                            <!-- <tr>
                        <td class="text-right" colspan="5">
                            <h3>รวมทั้งสิ้น</h3>
                        </td>
                        <td class="text-right">
                            <h3><?php echo $rs[8]; ?></h3>
                        </td>
                    </tr> -->
                </tbody>
            </table>
    <?php }
                    } ?>
        </div>
    </div>
    </div>



    <?php include('_footer.php'); ?>
</body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly" defer></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>