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
    <title>Admin Page</title>
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
    header('location login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}



if (isset($_POST['submit'])) {
    $keyword = trim($_POST['keyword']);
} else $keyword = "";

$mode = "edit";
$id = "";
if (isset($_POST['newpro'])) { //ถ้ากดปุ่ม newpro จะไปเข้าในmode add
    $mode = "add";
    //การรันรหัสใหม่ของสินค้า
    $sql02 = "SELECT tatto_id FROM tatto ORDER BY tatto_id DESC LIMIT 1";
    $result02 = $conn->query($sql02);
    $row02 = $result02->fetch_array();
    $id = $row02[0] + 1;
}


if (isset($_GET['id'])) { //กรณีกดรหัสเพื่อแก้ไข โดยรับค่า id มาจากการกดที่ id
    $id = $_GET['id'];
    //query ข้อมูลจากรหัส
    $sql00 = "SELECT * FROM tatto where tatto_id='$id'"; //ดึงข้อมูลมาจากตางราง tatto
    $result00 = $conn->query($sql00);
    while ($row00 = $result00->fetch_array()) { //แสดงตัวข้อมูลที่เลือกใน rows ต่างๆ
        $id = $row00[0];
        $name = $row00[1];
        $image = $row00[3];
        $color = $row00[2];
        $time = $row00[4];
        $detail = $row00[5];
        $category = $row00[7];
    }
}




//การกดค้นห้า
$category_list = array();
$sql01 = "SELECT tatto_id,category_id FROM tatto";
$result01 = $conn->query($sql01);
while ($row01 = $result01->fetch_array()) {
    $tid = $row01[0];
    $ccategory = $row01[7];
    $category_list[$tid] = $ccategory;
}

?>

<body>
    <div class="container-fluid">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-12 border-bottom"">
      <a href=" index_user.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="img/logo.png" alt="logo" style="width: 15%;height: auto; margin-left:15%;">
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="addmin.php" class="nav-link px-2 link-danger">ลายสัก</a></li>
                <li><a href="admin_book.php" class="nav-link px-2 link-dark">จองแบบเลือกลาย</a></li>
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
    <br><br>
    <style>
        .logout {
            float: left;
            text-decoration: none;
            color: white;
        }

        .logout :hover {
            color: white;
        }

        .delete-box {
            width: 45px;
            height: 46px;
            font-size: 30px;
            padding: 1px;
            border: 1px solid #FF0000;
            border-radius: 20%;
            text-align: center;
            color: #FF0000;
            float: left;
            margin-top: 1%;
            margin-left: 8%;
        }

        .delete-box:hover {
            background-color: #FF0000;
            color: #ffffff;
            cursor: pointer;
        }
    </style>

    <div class="container">
        <div class="row">

            <div class="col-7">

                <?php
                //เรียกการเชื่อมต่อ

                //ทำการ query
                $sql = "SELECT * FROM tatto ";
                $clause = " WHERE tatto.tatto_id LIKE '%$keyword%' OR tatto.tatto_name LIKE '%$keyword%' OR tatto.tatto_color LIKE '%$keyword%' or tatto.tatto_pic LIKE '%$keyword%'  OR tatto.tatto_time LIKE '%$keyword%' OR tatto.tatto_detail LIKE '%$keyword%' ORDER by tatto.tatto_id ";
                $sql .= $clause;

                $result = $conn->query($sql);
                //ผลลัพธ์ของการค้นหา
                echo "<table class=\"table\" table-striped  table-hover>";

                echo "<thead><tr><td colspan=4>ผลลัพธ์การค้นหา " . $result->num_rows . " </td></thead>";
                ?>
                <div class="col-3 d-flex">
                    <form class="form-inline my-2 my-lg-0 " method="post">
                        <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" value="<?= $keyword ?>" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" name="submit" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                </div>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">ชื่อลายสัก</th>
                        <th scope="col">รูป</th>
                        <th scope="col">สี</th>
                        <th scope="col">เวลา</th>
                        <th scope="col">รายละเอียด</th>
                        <th scope="col">ประเภท</th>
                       
                    </tr>
                </thead>
                <tbody>

                    <?php
                    //เรียกข้อมูลแสดงในตาราง
                    while ($row = $result->fetch_array()) {
                        $idx = $row[0];
                        echo "<tr>";
                        echo "<td><a href=\"addmin.php?id=$idx\">" . $row[0] . "</a></td><td> " . $row[1] . " </td><td> <img style='height:150px; width: auto;' src='img/" . $row[3] . "'> </td><td> " . $row[2] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td><td>" . $row[7] . "</td>";
                    //    echo "<td><a href='delete.php?id=".$row[0]."'></a></td>";
                    ?>
                        <td>
                        <form method="POST" action='delete.php?id="<?php echo $idxx; ?>"'>
                        <input type="hidden" name="idxx" value="<?php echo $idx; ?>">
                            <button class="delete-box" onclick="return confirm('คุณต้องการออกลบลายสักนี้ใช่หรือไม่?<?php echo $idx;?> ');" name="delete" value="<?php echo $idx;?>"><i class="fa-solid fa-xmark"></i></button>
                        </form>
                        </td>
                    <?php
                    }
                    echo "</tr>";
                    echo "</tbody>";
                    echo "</table>";
                    $conn->close();
                    ?>

            </div>
            <div class="col-5">
                <form method="POST" action="addmin.php">
                    <div class="form-group row">

                        <div class="col-sm-5">
                            <button type="submit" class="btn btn-danger" name="newpro">เพิ่มลายสักใหม่</button>
                        </div>
                    </div>
                </form>

                <?php
                //เรียกการทำงานหน้าaddกับedit
                if ($mode == "add") echo "<form method=\"POST\" action=\"add.php\">";
                else echo "<form method=\"POST\" action=\"edit.php\">";
                ?>
                <form method="POST" action="edit.php">
                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="inputFirstName4">ชื่อลายสัก</label>
                            <input type="text" class="form-control" id="inputFirstName4" value="<?= $name ?>" name="name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputExtension">รูป (ขนาดไฟล์ไม่เกิน 8 Mb)</label>
                            <input type="file" accept="image/*" class="form-control" id="inputExtension" value="<?= $image ?>" name="image" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputExtension">สี</label>
                            <input type="color" class="form-control" id="inputExtension" value="<?= $color ?>" name="color" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputExtension">เวลาที่ใช้ในการสัก</label>
                            <input type="text" class="form-control" id="inputExtension" value="<?= $time ?>" name="time" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputExtension">รายละเอียด</label>
                            <textarea id="detail" rows="6" cols="70" class="form-control" id="inputExtension" value="<?= $detail ?>" name="detail" required><?= $detail ?></textarea>
                        </div>
                    </div>
                    <div class="form-row">


                        <div class="form-group col-md-6">
                            <label for="inputExtension">category_id</label>
                            <input type="text" class="form-control" id="category" value="<?= $category ?>" name="category" required>
                        </div>

                    </div>

                    <br>

                    <input type="hidden" name="id" value="<?= $id ?>">

                    <button type="submit" name="submit_edit" class="btn btn-primary">ยืนยัน</button>
                </form>


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