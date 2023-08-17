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
    <link rel="stylesheet" href="css/booking.css">
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
            <li><a href="addmin.php" class="nav-link px-2 link-dark">ลายสัก</a></li>
                <li><a href="admin_book.php" class="nav-link px-2 link-danger">จองแบบเลือกลาย</a></li>
                <li><a href="admin_book2.php" class="nav-link px-2 link-dark">จองแบบอัปโหลดรูป</a></li>
                <li><a href="admin_book3.php" class="nav-link px-2 link-dark">จองแบบจ้างออกแบบ</a></li>
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
<?php
 $orderNumber = $_REQUEST['oid'];
// $od_detail = "SELECT * FROM payment  WHERE payment_id = $orderNumber"; //่join ตาราง orderdetalis,orders,tbl_product
// $pay = mysqli_query($conn, $od_detail); 


// if ($pay && mysqli_num_rows($pay) > 0) { //ถ้า order มากก่า 0 ให้ทำ while loop
//     while ($rs = mysqli_fetch_array($pay)) { //วนลูป
        ?>
<div class="container">
            <div class="row">
                <div class="col-6 justify-content-center" style="margin-top: 20px;">
                <form action="edit_order.php" method="POST">
                <h2>บันทึกการชำระเงินหลังการสัก</h2>
                    <input type='file' class="upload" name="img" id="file-input" multiple="multiple" onchange="readURL(this);" />
                    <label for="file-input">
                        <i class="fa-solid fa-plus"></i>
                        &nbsp; แนบไฟล์รูปหลักฐาน (ขนาดไม่เกิน 8 Mb)
                    </label>
                    <span id="file-name"></span>
                    <br><img id="blah" src="#" alt="your image" style="margin-top: 10px;" />
                    <script>
                        let inputFile = document.getElementById('file-input');
                        let fileNameField = document.getElementById('file-name');
                        inputFile.addEventListener('change', function(event) {
                            let uploadedFileName = event.target.files[0].name;
                            fileNameField.textContent = uploadedFileName;
                        })
                    </script>
                    <script>
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function(e) {
                                    $('#blah')
                                        .attr('src', e.target.result)
                                        .width(500)
                                        .height(auto);
                                };

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                </div>
                <div class="col-6 justify-content-center" style="margin-top: 20px;">
                <div class="col-sm-4">
                        <p>จำนวนเงิน</p>
                        <input class="text-box" name="price" type="text" placeholder="โปรดระบุจำนวนเงิน">
                        <p>เวลา</p>
                        <input class="text-box" name="time" type="time" placeholder="โปรดระบุเวลาที่โอน">
                        <p>วันที่</p>
                        <input class="text-box" name="date" type="date" placeholder="โปรดระบุวันที่โอน">
                        <p>ช่องทางการชำระเงิน</p>
                        <input class="text-box" name="bank" type="text" placeholder="โปรดระบุช่องทางการชำระเงิน">
                        <input type="hidden" name="id" style="border-radius: 10px; padding:5px; border:solid 1px black;"  value="<?php echo $orderNumber;?>">
                        
                        <button class="w-4 btn btn-lg btn-primary" style="width: 200px; font-size:15px; border-radius: 25px; margin-left: 10px; margin-top: 5%;" type="submit" name="edit_book5" autocomplete="on" >ยืนยัน</button>
                    </div>
                    </form>
                </div>
                </div>
                <?php //}
                    //} ?>
        </div>


<?php include('_footer.php'); ?>
</body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly" defer></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>