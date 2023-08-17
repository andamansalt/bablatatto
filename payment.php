<?php
    
    session_start();
    include "dbconfig.php";

    if(!$_SESSION['userid']){
        header("location: index.php");
    } else {
        header("locatin: userpage.php");
    }
    $query = "SELECT * FROM user WHERE id = '".$_SESSION['userid']."'";
    $result = mysqli_query($conn, $query) or die("Error in sql : $query". mysqli_error($query));
    $row = mysqli_fetch_array($result);
    foreach($result as $row){ 
       // echo $row['id'];
       // echo $row['username'];
    }

    $query = "SELECT MAX(ordernumber) FROM orders";
    $result = mysqli_query($conn, $query) or die("Error in sql : $query". mysqli_error($query));

    foreach($result as $row1){ 
    //    echo $row1['MAX(ordernumber)'];
    }

    $orderDate =$_POST['date']." ".$_POST['time'];

    $sqlCheck = "SELECT * FROM `orders` WHERE `orderDate` ='".$orderDate."' AND `technician_name` = '".$_POST['technician_name']."'";
    $resultOrders = mysqli_query($conn, $sqlCheck) or die("Error in sql : $sqlCheck". mysqli_error($sqlCheck));
    $numRow    = mysqli_num_rows($resultOrders);
   
    if ($numRow > 0) {
        echo "
            <script>
              alert('พบข้อมูลวันและเวลาจองซ้ำ กรุณาเลือกวันและเวลาใหม่อีกครั้ง')
              window.location.href = 'book.php'
            </script>
        ";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ViVasalon</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</head>
<body>
    <style>
        body{
            background-image: url(b6.jpg);
        }     
        /* body{
            background-size:cover;
        } */
        h1{
            font-family: 'Julius Sans One', sans-serif;
        }
        /* Large rounded green border */
        hr.new5 {
          border: 1px solid black;
          border-radius: 2px;
          width: 50%;

        }
        .font-color{
            color: black !important;
        }
    </style>
    <div class="row" style="background-color: #ffffff;">
        <center style="margin-top: 20px">
            เปิดให้บริการ อังคาร - อาทิตย์ : 10.30 - 20.30 น.
            <hr class="new5">
        </center>
    
    

        <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <a class="navbar-brand px-3" href="user_page.php">
                    <img src="viva.png" alt="Viva Salon" width="15%">
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link font-color" href="user_page.php">หน้าแรก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-color" href="user_page_shop.php">บริการ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-color" href="book.php">จองคิว</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font-color" href="content.php">สาระน่ารู้</a>
                        </li>
                        <?php if(isset($_SESSION['userid'])){ ?>
                        <li class="nav-item">
                            <a class="nav-link font-color" href="contactt.php">ติดต่อเรา</a>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle font-color" href="edit_p.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">เพิ่มเติม
                            </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item font-color" href="edit_p.php?id=<?php echo $row['id'];?>">แก้ไขโปรไฟล์</a>
                                </div>
                            <!-- <a class="dropdown-item" href="#?id=<?php echo $row['id'];?>">เกี่ยวกับเรา</a> -->
                        </li> 
                        <!-- <form class="form-inline my-2 my-lg-0"> -->
                       <?php } ?>
                    </ul>
                    <?php if(isset($_SESSION['userid'])){ ?>
                    <div class="form-inline my-2 my-lg-0">
                        
                        <a class="nav-link font-color" href="logout.php">ออกจากระบบ</a>
                       
                        
                    </div>
                    <?php }else{ ?>
                    <div class="form-inline my-2 my-lg-0">
                        <a class="nav-link font-color" href="loginform.php">เข้าสู่ระบบ</a>
                        
                    </div>
                    <?php } ?>
                </div>
        </nav>
    </div>
    <br>
        <h3 align="center">การชำระเงิน</h3>
        <form action="order_db.php" method="post" align="center">
            <?php?>
			<div class="card text-black bg-light mb-3" style="width: 40%; margin: 0 auto; float: none; margin-bottom: 10px;">
            <br>
            <div class="row">
                <div class="col-md-3 offset-1">หมายเลขการจอง :</div>
                <div class="col-md-6">
                    <input list="text" name="ordernum" id="ordernum"value="<?php echo $row1['MAX(ordernumber)'] + 1?>" disabled>
                </div>
            </div>
                
            <hr>
            <div class="card-body">
                <label>QR สำหรับชำระเงิน</label><br><br>
                <img src="QRpayment.jpg" height="250"><br><br>
                <div class="row">
                    <?php 
                    $price = $_POST['price'] * ((100 - $_POST['dis']) / 100);
                    if($_POST['type'] == "การสระ/ไดร์"){
                        $price = $price * 300;
                    } else if($_POST['type'] == "การตัดผม"){
                        $price = $price * 180;
                    } else if($_POST['type'] == "การทำสีผม"){
                        $price = $price * 1800;
                    } else if($_POST['type'] == "ออกแบบทรงผม"){
                        $price = $price * 400;
                    } else if($_POST['type'] == "การสักคิ้ว"){
                        $price = $price * 1500;
                    } else if($_POST['type'] == "การยืดผม"){
                        $price = $price * 1800;
                    } else if($_POST['type'] == "การทำเล็บ"){
                        $price = $price * 300;
                    } else if($_POST['type'] == "การแต่งหน้า"){
                        $price = $price * 2000;
                    }
                    ?>
                    <div class="col-md-3 offset-1">จำนวนเงิน :</div>
                    <div class="col-md-4">
                        <input id="price" type="text" name="price" value="<?php echo number_format($price,2) ?>" disabled>
                        <input id="price" type="hidden" name="type" value="<?php echo $_POST['type']; ?>" >
                        <input id="price" type="hidden" name="technician_name" value="<?php echo $_POST['technician_name']; ?>" >
                        <input id="price" type="hidden" name="orderDate" value="<?php echo $orderDate; ?>" >
                    </div>
                    <div class="col-md-2">บาท</div>
                </div>
                
            </div>
            <hr>
            <div class="card-body">
                <label>แจ้งการชำระเงิน</label>
                <br>
                <br>
                <input type="file" name="upload" required/>
            </div>
            <hr>
            <div class="card-body">
                <button type="submit" name="submit" class="btn btn-dark" id="booking" align="center">จองคิว</button>
            </div>
		</div>
        </div>
		</form>
        <br>
        <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-10 me-auto mb-4">
                    <img src="viva.png" alt="Viva Salon" width="100%">
                </div>
            
                <div class="col-lg-4 col-8">
                    <h3 class="tm-text-primary mb-4 tm-footer-title"><font color="black">ติดต่อเรา</h3></font>
                    <p><font color="black">Facebook : Viva Salon</p></font>
                    <p><font color="black">Instagram : Viva_salon_th</p></font>
                    <p><font color="black">Line : Viva Salon Th</p></font>
                    <p><font color="black">Tel : 080-000-0000</p></font>
                    <font color="black"> Copyright 2020 Viva Salon. All rights reserved.</font>
                </div>
                
                <div class="col-lg-3 col-4">
                    <h3 class="tm-text-primary mb-4 tm-footer-title"><font color="black">เกี่ยวกับเรา</h3></font>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="#"><font color="black">ร้านเสริมสวยของเรา</a></li></font>
                        <li><a href="#"><font color="black">บริการของเรา</a></li></font>
                        <li><a href="#"><font color="black">ข่าวสารโปรโมชันเสริมสวย</a></li></font>
                        <li><a href="message.php"><font color="black">ข่าวสารการประชาสัมพันธ์</a></li></font>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-2">
                    <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                        <li class="mb-2"><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="mb-2"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                    <!-- <a href="#" class="tm-text-gray text-right d-block mb-2">Viva Salon</a>
                    <a href="#" class="tm-text-gray text-right d-block">Privacy Policy</a> -->
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-lg-3 col-8">
                <font color="black"> Copyright 2020 Viva Salon. All rights reserved.</font>
                </div> -->
                <!-- <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                    Viva Salon <a href="#" class="tm-text-gray" rel="sponsored" target="_parent">Viva Salon</a>
                </div> -->
            </div>
        </div>
    </footer>
    
</body>
</html>