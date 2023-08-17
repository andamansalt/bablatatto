<?php
session_start();
include "db_connect.php";
global $conn;
$errors = array();

if (isset($_POST['booking2'])) {
    $postion = mysqli_real_escape_string($conn, $_POST['position']);
    $size = mysqli_real_escape_string($conn, $_POST['size']);
    $img = mysqli_real_escape_string($conn, $_POST['img']);
    $user_id = $_SESSION['userid'];
    $artist = mysqli_real_escape_string($conn, $_POST['artist']);
    $orderday = mysqli_real_escape_string($conn, $_POST['orderday']);
    $detail = mysqli_real_escape_string($conn, $_POST['detail']);
    $color = mysqli_real_escape_string($conn, $_POST['color']);

    if (empty($postion)) {
        array_push($errors, "position is required");
    }
    if (empty($size)) {
        array_push($errors, "size is required");
    }
    $sqlCheck = "SELECT * FROM `book_detail` WHERE date = '$orderday' AND artist_id = '$artist' AND status = 'จองสำเร็จ'";
    $resultOrders = mysqli_query($conn, $sqlCheck) or die("Error in sql : $sqlCheck" . mysqli_error($sqlCheck));
    $numRow    = mysqli_num_rows($resultOrders);

    if ($numRow > 0) {
        echo "
        <script>
          alert('พบข้อมูลวันและเวลาจองซ้ำ กรุณาเลือกวันและเวลาใหม่อีกครั้ง')
          window.location.href = 'booking2.php'
        </script>
    ";
    }

    if (count($errors) == 0) {

        $sql = "INSERT INTO  book_detail(date, position, order_size, order_detail, status, artist_id, user_id, time_stamp, book_type) VALUES ('$orderday', '$postion', '$size', '$detail', 'รอการดำเนินการ', '$artist', '$user_id', now(), 2)";
        mysqli_query($conn, $sql);

        $query = "SELECT MAX(order_id) FROM `book_detail` WHERE user_id = '$user_id';";
        $result = $conn->query($query);

        if ($statement = mysqli_query($conn, $query)) //queryข้อมูลจาก database
        {
            while ($row = mysqli_fetch_array($statement)) //while loop วนรอบเพื่อแสดงข้อมูล
            {
                $order = $row[0];
                $sql2 = "INSERT INTO  upload_picture(order_id, uploadpic_pic, detail, size) VALUES ('$order', '$img', '$detail', '$size')";
                mysqli_query($conn, $sql2);
                echo $order;
            }
            echo ("<script>location.href='waiting_1.php'</script>");
        }
    }
}
