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
<script>
    function populateTimes() {
        var sel = document.getElementById("time");
        for (var i = 0; i < 24; i++) {
            var amPm = i < 12 ? "AM" : "PM";
            var hour = (i % 12 ? (i % 12) : 12).toString().padStart(2, '0');
            var opt = new Option(hour + ":00 " + amPm, i + ":00");
            sel.appendChild(opt);
        }
    }
    populateTimes();
</script>
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
                    <button type="button" class="btn btn-danger" style="margin-right: 10px;" onclick="location.href='booking.php'">เลือกลายที่ร้านมี</button>
                    <button type="button" class="btn btn-outline-danger" style="margin-right: 10px;" onclick="location.href='booking2.php'">อัปโหลดภาพที่ต้องการสัก</button>
                    <button type="button" class="btn btn-outline-danger" onclick="location.href='booking3.php'">จ้างให้ร้านออกแบบลายสัก</button>
                </div>
            </div>
        </div>
        <div class="container col-xxl-8 px-4 py-5">
            <div id="hero2" class="row flex-lg-row-reverse justify-content-center align-items-center g-5 py-5">
                <div class="col-lg-6 ">
                    <div id="myresult" class="img-zoom-result" align="center">
                        <script>
                            function show() {

                                <?php
                            $num = '<img src="img/tatto.png" class="d-flex mx-lg-auto img-fluid" alt="Bootstrap Themes" loading="lazy" style="margin-bottom:10px; padding-left:0 !important; width:400px;margin-top: -86%;">';

                            echo $num;
                                ?>

                            }
                        </script>
                        <img src="img/tatto (12).jpg" class="d-flex mx-lg-auto img-fluid" alt="Bootstrap Themes" loading="lazy" style="margin-bottom:10px; padding-left:0 !important; width:400px;margin-top: -86%;">
                        <p>ไซส์ M 5cm x 10cm (1,100 บาท) <br>
                            ไซส์ L 8cm x 16cm (1,600 บาท) <br>
                            ไซส์ XL 10cm x 20cm (2,100 บาท)</p>
                        <h2>ใช้เวลาประมาณ 2 ชั่วโมง</h2>
                    </div>
                </div>

                <div class="col-10 col-sm-8 col-lg-6 justify-content-around" style="margin-top:0;">
                    <form action="pay.php" method="post">
                        <p>ลายสัก</p>
                        <div class="row justify-content-around d-flex" style="width:100% ;">
                            <div class="flexch" style="height: 300px; overflow: auto;">
                                <?php
                                $query = "SELECT * FROM `tatto` WHERE status_tatt = 1;";

                                // FETCHING DATA FROM DATABASE
                                $result = $conn->query($query);

                                if ($statement = mysqli_query($conn, $query)) //queryข้อมูลจาก database
                                {
                                    $output = '';
                                    while ($row = mysqli_fetch_array($statement)) //while loop วนรอบเพื่อแสดงข้อมูล
                                    {
                                        $output .= ' 
            	<button style="width:100px; height:80px; border:none;"><img src="img/' . $row["tatto_pic"] . '" class="d-flex mx-lg-auto img-fluid "onclick="" alt="Bootstrap Themes" style="margin-bottom:10px; padding-left: 5px !important; width:100px;"></button>
                <input type="radio" name="tatto" value="' . $row["tatto_id"] . '"style="padding-top: 22px;">
                ';
                                    }
                                    echo $output; //แสดง output
                                }
                                ?>

                            </div>
                            <p style="margin-top: 15px;">ตำแหน่ง</p>
                            <input type="text" class="form-control" name="position" placeholder="โปรดระบุตำแหน่งที่ต้องการสัก" required style="height:50px; border-radius: 15px; border:solid #7A7676;">
                            <p style="margin-top: 15px;">ไซส์</p>
                            <!-- <input type="text" class="form-control" name="size" placeholder="โปรดระบุขนาดที่ต้องการ (เป็นไซต์ที่มีหรือขนาดที่ต้องการ)" required style="height:50px; border-radius: 15px; border:solid #7A7676;"> -->
                            <select id="dropdown-menu" name="size" placeholder="โปรดระบุขนาดที่ต้องการ" style="height:50px; border-radius: 15px; border:solid #7A7676;">
                                <option disabled selected value="">เลือกขนาดของลายสัก</option>
                                <option value="M">ไซส์ M 5cm x 10cm</option>
                                <option value="L">ไซส์ L 8cm x 16cm</option>
                                <option value="XL">ไซส์ XL 10cm x 20cm</option>

                            </select>

                            <p style="margin-top: 15px;">เลือกช่างสัก</p>
                            <div class="row">
                                <button style="width:100px; height:80px; border:none;"><img src="img/artist1.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" style="width: 100% ; height:auto;" loading="lazy"></button>
                                <input type="radio" name="artist" value="1" style="width: 13px;">
                                <button style="width:100px; height:80px; border:none;"><img src="img/artist2.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" style="width: 100% ; height:auto;" loading="lazy"></button>
                                <input type="radio" name="artist" value="2" style="width: 13px;">
                            </div>
                            <p style="margin-top: 15px;">วัน/เวลา ที่ต้องการจอง</p>
                            <!-- <div class="form-floating" style="margin-bottom: 3%; ">
                            <input type="date" class="form-control" name="birthday" placeholder="birthday" required style="border-radius: 25px; border:solid #7A7676;padding:20px;">
                        </div> -->

                            <input type="date" class="form-control" name="orderday" placeholder="วันจอง" required style="border-radius: 15px; border:solid #7A7676; height:50px;">
                            <!-- <select class="form-control" name="ordertime" required style="border-radius: 15px; border:solid #7A7676; height:50px; margin-top: 10px;">
                                <option value="" disabled selected>เลือกเวลา</option>
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="opel">Opel</option>
                                <option value="audi">Audi</option>
                            </select> -->
                            <select id="time" class="form-control" name="ordertime" placeholder="วันจอง" required style="border-radius: 15px; border:solid #7A7676; height:50px; margin-top: 10px;">
                                <option value="12:00 น.">12:00 น.</option>
                                <option value="13:00 น.">13:00 น.</option>
                                <option value="14:00 น.">14:00 น.</option>
                                <option value="15:00 น.">15:00 น.</option>
                                <option value="16:00 น.">16:00 น.</option>
                                <option value="17:00 น.">17:00 น.</option>
                                <option value="18:00 น.">18:00 น.</option>
                            </select>
                            <!-- <input type="time" class="form-control" name="ordertime" placeholder="วันจอง" required style="border-radius: 15px; border:solid #7A7676; height:50px; margin-top: 10px;"> -->
                            <p style="margin-top: 15px;">หมายเหตุ</p>
                            <input type="text" class="form-control" name="detail" placeholder="หากมีจุดที่อยากได้เพิ่มเติมกรุณาระบุ" style="height:50px; border-radius: 15px; border:solid #7A7676;">

                        </div>
                </div>
                <div class="row d-flex justify-content-end">
                    <button class="w-4 btn btn-lg btn-secondary" style="width:120px; font-size:15px; border-radius: 25px; " type="submit" name="" autocomplete="on">ยกเลิก</button>
                    <button class="w-4 btn btn-lg btn-secondary" style="width:120px; font-size:15px; border-radius: 25px; margin-left: 10px;" type="submit" name="booking1" autocomplete="on" onclick="location.href='pay.php'">ดำเนินการต่อ</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    <?php include('_footer.php'); ?>
</body>
<script src="js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

</html>