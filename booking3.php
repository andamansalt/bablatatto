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
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
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
                <li><a href="about.php" class="nav-link px-2 link-dark">เกี่ยวกับเรา</a></li>
                
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
                    <button type="button" class="btn btn-outline-danger" style="margin-right: 10px;" onclick="location.href='booking1.php'">เลือกลายที่ร้านมี</button>
                    <button type="button" class="btn btn-outline-danger" style="margin-right: 10px;" onclick="location.href='booking2.php'">อัปโหลดภาพที่ต้องการสัก</button>
                    <button type="button" class="btn btn-danger" onclick="location.href='booking.php'">จ้างให้ร้านออกแบบลายสัก</button>
                </div>
            </div>
        </div>
        <form action="booking_db3.php" method="post">
            <div class="row justify-content-center">
                <div class="col-6" style="margin-top: 20px;margin-left: -31%">
                    <input type='file' class="upload" name="img" id="file-input" multiple="multiple" onchange="readURL(this);" />
                    <label for="file-input">
                        <i class="fa-solid fa-plus"></i>
                        &nbsp; อัพโหลดไฟล์ (ขนาดไม่เกิน 8 Mb)
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
                                        .width(200)
                                        .height(auto);
                                };

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                </div>
                <div class="col-10 row justify-content-center" id="nav" style="margin-top: 3% ;">
                    <div class="col-sm-4">
                        <p>ตำแหน่ง</p>
                        <input class="text-box" name="position" type="text" placeholder="โปรดระบุตำแหน่งที่ต้องการสัก">
                    </div>

                    <div class="col-sm-4">
                        <p>ขนาด (cm x cm)</p>
                        <input class="text-box" name="size" type="text" placeholder="โปรดระบุขนาด (cm x cm)">
                    </div>

                    <div class="col-sm-4">
                        <p>สี</p>
                        <input class="text-box2" name="color" type="color" style=" height: 55px;">
                    </div>

                    <div class="col-sm-10" style="margin-top:2%; margin-left:-17%;">
                        <p>รายละเอียดอื่นๆ (เช่น คอนเซป ความหมายของรูป)</p>
                        <input class="text-box" name="detail" type="text" placeholder="โปรดระบุรายละเอียดของลายสักที่ต้องการสัก">
                    </div>

                    <p style="margin-top: 15px;">วันที่ต้องการจอง</p>
                    <!-- <div class="form-floating" style="margin-bottom: 3%; ">
                            <input type="date" class="form-control" name="birthday" placeholder="birthday" required style="border-radius: 25px; border:solid #7A7676;padding:20px;">
                        </div> -->
                        <div class="row d-flex justify-content-start">
                    <input type="date" class="form-control" name="orderday" placeholder="วันจอง" required style="border-radius: 8px; border:solid 1px #7A7676; height:50px; width:30%;">
                        </div>

                    <div class="row d-flex justify-content-end" style="margin-top: 2%;">
                        <button class="w-4 btn btn-lg btn-secondary" style="width:120px; font-size:15px; border-radius: 25px; " type="submit" name="reg_user" autocomplete="on">ยกเลิก</button>
                        <button class="w-4 btn btn-lg btn-secondary" style="width:120px; font-size:15px; border-radius: 25px; margin-left: 10px;" type="submit" name="booking3" autocomplete="on">ดำเนินการต่อ</button>
                    </div>
                </div>


        </form>
    </div>




    <?php include('_footer.php'); ?>
</body>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

</html>