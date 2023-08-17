<?php
session_start();
include "db_connect.php";
global $conn;
$errors = array();
// $postion = mysqli_real_escape_string($conn, $_POST['position']);
// $size = mysqli_real_escape_string($conn, $_POST['size']);
// $tatto = mysqli_real_escape_string($conn, $_POST['tatto']);
// $user_id = $_SESSION['userid'];
// $artist = mysqli_real_escape_string($conn, $_POST['artist']);
// $orderday = mysqli_real_escape_string($conn, $_POST['orderday']);
// $ordertime = mysqli_real_escape_string($conn, $_POST['ordertime']);
// $detail = mysqli_real_escape_string($conn, $_POST['detail']);
// $postion = mysqli_real_escape_string($conn, $_POST['position']);
// $size = mysqli_real_escape_string($conn, $_POST['size']);
// $tatto = mysqli_real_escape_string($conn, $_POST['tatto']);
// $user_id = $_SESSION['userid'];
// $artist = mysqli_real_escape_string($conn, $_POST['artist']);
// $orderday = mysqli_real_escape_string($conn, $_POST['orderday']);
// $ordertime = mysqli_real_escape_string($conn, $_POST['ordertime']);
// $detail = mysqli_real_escape_string($conn, $_POST['detail']);
// print('<pre>');
// print_r($_POST);
// print('</pre>');

$total = $_POST['total'].'00';
$total2 = $_POST['total'];
// exit();

require_once dirname(__FILE__).'/omise-php/lib/Omise.php';
define('OMISE_API_VERSION', '2015-11-17');
// define('OMISE_PUBLIC_KEY', 'PUBLIC_KEY');
// define('OMISE_SECRET_KEY', 'SECRET_KEY');
define('OMISE_PUBLIC_KEY', 'pkey_test_5u52dtty3dnnz6h52x4');
define('OMISE_SECRET_KEY', 'skey_test_5u52dtvqf7nfjrvjs2d');

$charge = OmiseCharge::create(array(
  'amount' => $total,
  'currency' => 'thb',
  'card' => $_POST["omiseToken"]
));

$status = ($charge['status']);

if ($status == 'successful'){

    // insert
    $position = $_SESSION['position'];
    $size = $_SESSION['size'];
    $tatto = $_SESSION['tatto'];
    $user_id = $_SESSION['userid'];
    $artist = $_SESSION['artist'];
    $orderday = $_SESSION['orderday'];
    $ordertime = $_SESSION['ordertime'];
    $detail = $_SESSION['detail'];
    

        
            
        $sql = "INSERT INTO  book_detail(date, time, position, order_size, order_detail, status, tatto_id, artist_id, user_id, time_stamp, book_type) VALUES ('$orderday', '$ordertime', '$position', '$size', '$detail', 'จองสำเร็จ', '$tatto', '$artist', '$user_id', now(), 1)";
        mysqli_query($conn, $sql);

        $query = "SELECT MAX(order_id) FROM `book_detail` WHERE user_id = '$user_id';";
        $result = $conn->query($query);

        if ($statement = mysqli_query($conn, $query)) //queryข้อมูลจาก database
        {
            while ($row = mysqli_fetch_array($statement)) //while loop วนรอบเพื่อแสดงข้อมูล
            {
                $order = $row[0];
                $sql2 = "INSERT INTO  payment(payment_status, payment_amount, payment_date, payment_bank, order_id) VALUES ('ชำระเงินแล้ว', '$total2', now(), 'Visa', '$order')";
                mysqli_query($conn, $sql2);
                // echo $order;
                // echo $sql;
            }
              echo ("<script>location.href='waiting_3.php'</script>");
            

        }
            //  $sql2 = "INSERT INTO  payment(payment_status, payment_amount, payment_date, payment_bank, order_id) VALUES ('$status', '$total', now(), 'กสิกร', '$detail', 'จองสำเร็จ', '$tatto', '$artist', '$user_id', now(), '20')";
            //  mysqli_query($conn2, $sql2);

            // echo $sql;
    
        // echo $sql ;
        // echo $sql2 ;

    // insert

    echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    echo ' <script>
    setTimeout(function() {
     swal({
         title: "ชำระเงินสำเร็จ",
         text: "กรุณารอการตรวจสอบจากแอดมิน",
         type: "success"
     }, function() {
         window.location = "index_user.php"; //หน้าที่ต้องการให้กระโดดไป
     });
 }, 1000);
</script>';


}else{
    echo '<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    echo ' <script>
    setTimeout(function() {
     swal({
         title: "เกิดขอผิดพลาด",
         text: "กรุณาลองใหม่อีกครั้ง",
         type: "error"
     }, function() {
         window.location = "waiting_3.php"; //หน้าที่ต้องการให้กระโดดไป
     });
 }, 1000);
</script>';

}

// print('<pre>');
// print_r($charge);
// print('</pre>');

echo $status;
// echo $sql;
