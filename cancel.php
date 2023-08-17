<?php
    include 'db_connect.php';
//รับข้อมูลจากหน้า index เพื่อแก้ไข
if(isset($_POST['cancel'])){//ถ้ามีการกด submit_editเข้ามาก็จะประกาศตัวแปรของข้อมูลที่จะเก็บ
    $id = $_POST['idxx'];

    //ใช้คำสั่ง insert into เพื่อเพิ่มข้อมูลลงไปใน database
    $sql= "UPDATE book_detail SET status = 'ยกเลิกการจอง' WHERE order_id = $id";
    $result=$conn->query($sql);
    if($result)header("Location: ./noticfication.php");
    else echo $id;

}
?>