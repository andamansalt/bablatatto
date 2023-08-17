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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <title>Addmin Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                <li><a href="admin_book2.php" class="nav-link px-2 link-danger">จองแบบอัปโหลดรูป</a></li>
                <li><a href="admin_book3.php" class="nav-link px-2 link-dark">จองแบบจ้างออกแบบ</a></li>
            </ul>

            <div class="col-md-3 text-end" style="margin-right: 2%;">
                <a href="user_profile.php"><i class="fa-solid fa-user" style="font-size:28px; color:#000000; padding-right:5%; padding-left:5%;"></i></a>
                <a href="noticfication.php"><i class="fa-solid fa-bell" style="font-size:28px; color:#000000; padding-right:5%; padding-left:5%"></i></a>
                <button type="button" class="btn btn-danger"><a class="logout" href="logout.php" onclick="return confirm('คุณต้องการออกจากระบบใช่ไหม?');">logout</a></button>
            </div>

        </header>
        <div class="box-se d-flex col-8 justify-content-start my-3">
            <h5 class="text-1">สถานะ</h5>
            <!-- <select id="dropdown-menu" name="dropdown-menu">
                <option value="0">ทั้งหมด</option>
                <option value="1">รอดำเนินการ</option>
                <option value="2">จองสำเร็จ</option>
                <option value="3">ยกเลิกจอง</option>
            </select> -->
            <button type="button" class="btn btn-outline-danger" style="margin-right: 10px;" onclick="location.href='admin_book2.php'">ทั้งหมด</button>
                    <button type="button" class="btn btn-danger" style="margin-right: 10px;" onclick="location.href='admin2_book2.php'">รอดำเนินการ</button>
                    <button type="button" class="btn btn-outline-danger" style="margin-right: 10px;" onclick="location.href='admin3_book2.php'">จองสำเร็จ</button>
                 
        </div>
        &nbsp;
        <style>
            .logout {
                float: left;
                text-decoration: none;
                color: white;
            }

            .box-se {
                margin-left: 15%;
            }

            #dropdown-menu {
                width: 120px;
                height: 40px;
                border-radius: 5px;
                border: 1px solid #A0A0A0;
                color: #A0A0A0;
                padding: 0 5px;
                margin-left: 10px;
            }

            .text-1 {
                padding-top: 8px;
            }

            .box-content {
                color: #A0A0A0;
            }

            p.b {
                margin-left: 5%;
                padding: 0 1%;
            }

            p.c {
                padding: 2px 3.5%;
            }
            p.c.time{
                margin-left: 0;
            }

            .b.con-1 {
                margin-left: 2%;
            }

            .b.con-2 {
                margin-left: 0.5%;
            }

            .b.con-3 {
                margin-left: 7%;
            }

            .b.con-4 {
                margin-left: 6%;
            }

            .con-1 {
                margin-right: 50px;
            }

            .content-1 {
                /* margin-left: 8%; */
                padding-top: 1.6%;
                margin-bottom: 7px;
                width: 100%;
                height: 75px;
                /* background-color: #07147C; */
                border-radius: 5px;
                border: 1px solid #A0A0A0;
                box-shadow: 0 2px 2px #aaaaaa;
            }

            .detail-button {
                font-size: 15px;
                width: 100px;
                height: 40px;
                background-color: #ffffff;
                border: 1px solid #07147C;
                border-radius: 5px;
                color: #07147C;
                margin-left: 5%;
                margin-top: -7px;
            }

            .detail-button:hover {
                background-color: #07147C;
                color: #ffffff;
            }

            .box-content {
                margin-top: 3%;
            }
        </style>
        

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="box-content d-flex justify-content-start">
                        <p class="b con-1">รหัสคิว</p>
                        <p class="b con-2">ลูกค้า</p>
                        <p class="b con-4">วันที่</p>
                        <p class="b con-3">เวลาที่จอง</p>
                        <p class="b con-5">ช่างสัก</p>
                        <p class="b con-6">สถานะการจอง</p>
                        <p class="b con-7">สถานะการชำระเงิน</p>
                    </div>
                    <?php
                    //เรียกข้อมูลจากตาราง order=
                    $customerNumber = $_SESSION['userid']; //แทนค่า session ด้วยตัวแปร
                    $order = mysqli_query($conn, "SELECT book_detail.*, tatto.*, payment.*, artist.*, user.*,upload_picture.uploadpic_id, upload_picture.uploadpic_pic FROM book_detail LEFT JOIN upload_picture ON book_detail.order_id = upload_picture.order_id LEFT JOIN design ON book_detail.order_id = design.order_id LEFT JOIN payment ON book_detail.order_id = payment.order_id LEFT JOIN tatto ON (book_detail.tatto_id = tatto.tatto_id) LEFT JOIN artist ON book_detail.artist_id = artist.artist_id LEFT JOIN user ON book_detail.user_id = user.user_id WHERE book_detail.book_type = 2 AND book_detail.status = 'รอการดำเนินการ' ORDER BY book_detail.date, book_detail.time"); //เลือกข้อมูลที่ต้องการจากใน orders
                    //แสดงประวัติการสั่งซื้อ
                    if ($order && mysqli_num_rows($order) > 0) { //ถ้าค่าเท่ากันจริงๆให้ทำตามเงื่อนไข
                        while ($rs = mysqli_fetch_array($order)) { //while loop เพื่อแสดงข้อมูลออกมา

                    ?>
                            <!-- <tr>
                                <td></td>
                                <td></td>
                                <td><a class="btn btn-success" href="order_detail.php?oid=<?php echo $rs['book_detail.order_id']; ?>">รายละเอียด</a></td>
                            </tr> -->
                            <div class="content-1 d-flex justify-content-start">
                                <p class="c name"><?php echo $rs[0]; ?></p>
                                <p class="c status"><?php echo $rs['username']; ?></p>
                                <p class="c day"><?php echo $rs['date']; ?></p>
                                <p class="c time"><?php echo $rs['time']; ?></p>
                                <p class="c status"><?php echo $rs['artist_nickname']; ?></p>
                                <p class="c day"><?php echo $rs['status']; ?></p>
                                <p class="c status"><?php echo $rs['payment_status']; ?></p>


                                <input type="button" class="detail-button" value="รายละเอียด" onclick="location.href='order_detail2_admin.php?oid=<?php echo $rs[0]; ?>'">
                            </div>
                    <?php }
                    }
                    ?>
                    <script>
                        $('#detail-button').on('click', function(e) {
                                e.preventDefault();
                                const href = $(this).attr('detail-button')

                                Swal.fire({
                                    title: 'ddddddddddddd',
                                    text: 'ddddddddddddddd',
                                    type: 'warning'
                                })

                            }

                        )
                    </script>
                    <!--  -->


                 


                </div>


            </div>
        </div>


        <?php include('_footer.php'); ?>
</body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly" defer></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

</html>