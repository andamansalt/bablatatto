<?php
   include 'db_connect.php';
//รับข้อมูลจากหน้า addmin เพื่อแก้ไข
if(isset($_POST['edit_book'])  OR ($_POST['edit_book2']) OR ($_POST['edit_book3'])){//ถ้ามีการกด submit_editเข้ามาก็จะประกาศตัวแปรของข้อมูลที่จะเก็บ
    $date=$_POST['date'];
    $time=$_POST['time'];
    $position=$_POST['position'];
    $size=$_POST['size'];
    $s_time=$_POST['s_time'];
    $e_time=$_POST['e_time'];
    $id =$_POST['id'];
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

    
 
    //ใช้คำสั่ง update เพื่อแก้ไขข้อมูลใน database
    $sql="UPDATE book_detail SET date = '$date', time = '$time', position = '$position', order_size = '$size', start_time = '$s_time', end_time = '$e_time' WHERE order_id = $id;";
    $result=$conn->query($sql);
    
    if($result)header("Location:admin_book.php?msg=สำเร็จ");
    else echo $sql ;

//กลับไปยังหน้าเดิม

}


if(isset($_POST['edit_book2'])){//ถ้ามีการกด submit_editเข้ามาก็จะประกาศตัวแปรของข้อมูลที่จะเก็บ
    $date=$_POST['date'];
    $time=$_POST['time'];
    $position=$_POST['position'];
    $size=$_POST['size'];
    $s_time=$_POST['s_time'];
    $e_time=$_POST['e_time'];
    $id =$_POST['id'];
    $price = $_POST['price'];


    
 
    //ใช้คำสั่ง update เพื่อแก้ไขข้อมูลใน database
    $sql= "INSERT INTO payment( payment_status, payment_amount, order_id) VALUES ('รอการชำระเงิน', '$price', '$id') ";
    mysqli_query($conn, $sql);

    $query = "SELECT MAX(payment_id) FROM `payment` WHERE order_id = '$id';";
    $result = $conn->query($query);
    if ($statement = mysqli_query($conn, $query)) //queryข้อมูลจาก database
    {
        while ($row = mysqli_fetch_array($statement)) //while loop วนรอบเพื่อแสดงข้อมูล
        {
            $order = $row[0];
            $sql2 = "UPDATE book_detail SET date = '$date', time = '$time', order_size = '$size', start_time = '$s_time', end_time = '$e_time' WHERE order_id = $id;";
            mysqli_query($conn, $sql2);
            // echo $sql;
      
        }
        echo "
            <script>
              alert('แก้ไขสำเร็จ')
              window.location.href = 'admin_book2.php'
            </script>
        ";
    }
}
           
if(isset($_POST['edit_book3'])){//ถ้ามีการกด submit_editเข้ามาก็จะประกาศตัวแปรของข้อมูลที่จะเก็บ
    $date=$_POST['date'];
    $time=$_POST['time'];
    $position=$_POST['position'];
    $size=$_POST['size'];
    $s_time=$_POST['s_time'];
    $e_time=$_POST['e_time'];
    $id =$_POST['id'];
    $price = $_POST['price'];
    $artist = $_POST['artist'];
    $design = $_POST['design'];
    $artist_id = '';
    if ($artist = 'mek'){
        $artist_id = 1;
    }
    if ($artist = 'yok'){
        $artist_id = 2;
    }

    
 
    //ใช้คำสั่ง update เพื่อแก้ไขข้อมูลใน database
    $sql= "INSERT INTO payment( payment_status, payment_amount, order_id) VALUES ('รอการชำระเงิน', '$price', '$id') ";
    mysqli_query($conn, $sql);

    $query = "SELECT MAX(payment_id) FROM `payment` WHERE order_id = '$id';";
    $result = $conn->query($query);
    if ($statement = mysqli_query($conn, $query)) //queryข้อมูลจาก database
    {
        while ($row = mysqli_fetch_array($statement)) //while loop วนรอบเพื่อแสดงข้อมูล
        {
            $order = $row[0];
            $sql2 = "UPDATE book_detail SET date = '$date', time = '$time', order_size = '$size', start_time = '$s_time', end_time = '$e_time', artist_id = '$artist_id', design_pic = '$design' WHERE order_id = $id;";
            mysqli_query($conn, $sql2);
            //  echo $sql;
      
        }
        echo "
            <script>
              alert('แก้ไขสำเร็จ')
              window.location.href = 'admin_book3.php'
            </script>
        ";
    }
}    
   

if(isset($_POST['edit_book5'])){//ถ้ามีการกด submit_editเข้ามาก็จะประกาศตัวแปรของข้อมูลที่จะเก็บ
    $date=$_POST['date'];
    $time=$_POST['time'];
    $id =$_POST['id'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $bank = $_POST['bank'];


    
 
    //ใช้คำสั่ง update เพื่อแก้ไขข้อมูลใน database

    $query = "SELECT payment_id, payment_amount FROM `payment` WHERE order_id = '$id';";
    $result = $conn->query($query);
    if ($statement = mysqli_query($conn, $query)) //queryข้อมูลจาก database
    {
        while ($row = mysqli_fetch_array($statement)) //while loop วนรอบเพื่อแสดงข้อมูล
        {
            $order = $row[0];
            $order2 = $row[2];
            $money = $row['payment_amount'] + $price;
            $sql2 = "UPDATE payment SET payment_date = CAST('$date,$time' AS DATETIME), payment_status = 'เสร็จสมบูรณ์', payment_amount = '$money', payment_bank = '$bank', pay_pic = '$img' WHERE order_id = $id;";
            mysqli_query($conn, $sql2);
            //  echo $sql;
      
        }
        // echo $money;
        echo "
            <script>
              alert('แก้ไขสำเร็จ')
              window.location.href = 'admin_book.php'
            </script>
        ";
    }
} 

//กลับไปยังหน้าเดิม
// "UPDATE book_detail SET date = '$date', time = '$time', position = '$position', order_size = '$size', start_time = '$s_time', end_time = '$e_time' WHERE order_id = $id;"

?>