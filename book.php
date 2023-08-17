<?php
    
    // session_start();
    // include "dbconfig.php";

    // if(!$_SESSION['userid']){
    //     header("location: loginform.php");
    // } else {
    //     header("locatin: userpage.php");
    // }
    // $query = "SELECT * FROM user WHERE id = '".$_SESSION['userid']."'";
    // $result = mysqli_query($conn, $query) or die("Error in sql : $query". mysqli_error($query));

    foreach($result as $row){ 
       // echo $row['id'];
       // echo $row['username'];
    }

    $listNames = ['นายช่าง A','นายช่าง B','นายช่าง C','นายช่าง D','นายช่าง E'];
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
    <?php
            if(isset($_GET['discount'])) {
                $discount = $_GET['discount'];
                $service = '';
                $price = 1;
            } else if(isset($_GET['service'])){
                $service = $_GET['service'];
                $price = $_GET['price'];
                $discount = 0;
            } else {
                $service = '';
                $price = 1;
                $discount = 0;
            }
    ?>
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
        <h3 align="center">จองคิวออนไลน์</h3>
        
        <form action="payment.php" method="post" align="center">
			<div class="card text-black bg-light mb-3" style="width: 40%; margin: 0 auto; float: none; margin-bottom: 10px;"><br> 
                <h4><i class="far fa-calendar-alt"></i>กรอกข้อมูลการจอง</h4>
                
                <label>เลือกบริการ</label>
                <div class="card-body">
                    <?php
                    if(isset($_GET['service'])){
                        echo '<input type="text" name="type" id="input_type" value="'.$service.'">
                        <input name="dis" id="dis" type="hidden" value="'.$discount.'">
                        <input name="price" id="price" type="hidden" value="'.$price.'">';
                    } else {
                    echo '
                        <select name="type" id="input_type" class="form-control">
                            <option value="การสระ/ไดร์">การสระ/ไดร์</option>
                            <option value="การตัดผม">การตัดผม</option>
                            <option value="การทำสีผม">การทำสีผม</option>
                            <option value="ออกแบบทรงผม">ออกแบบทรงผม</option>
                            <option value="การสักคิ้ว">การสักคิ้ว</option>
                            <option value="การยืดผม">การยืดผม</option>
                            <option value="การทำเล็บ">การทำเล็บ</option>
                            <option value="การแต่งหน้า">การแต่งหน้า</option>
                        </select>
                        <input name="dis" id="dis" type="hidden" value="'.$discount.'">
                        <input name="price" id="price" type="hidden" value="'.$price.'">';
                     }  ?>
                </div>
                <label>เลือกช่าง</label>
                <div class="card-body">
                    <select name="technician_name" id="technician_name" class="form-control col-md-1">
                        <?php foreach ($listNames  as $key => $value) { ?>
                            <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                        <?php }?>
                    </select>
                    
                    
                </div>

                <label>เลือกวันที่บริการ</label>
                <div class="card-body">
                    <input id="date" type="date" name="date" class="form-control" required>
                </div>
                <label>เลือกเวลาบริการ</label>
                <div class="card-body">
                    <input id="time" type="time" name="time" class="form-control" required>
                </div>
                <div class="card-body">
                    <button type="submit" name="submit" class="btn btn-dark" id="booking" align="center" >จองคิว</button>
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