<?php
    include 'db_connect.php';
//รับข้อมูลจากหน้า index เพื่อแก้ไข
if(isset($_POST['delete'])){//ถ้ามีการกด submit_editเข้ามาก็จะประกาศตัวแปรของข้อมูลที่จะเก็บ
    $id = $_POST['idxx'];

    //ใช้คำสั่ง insert into เพื่อเพิ่มข้อมูลลงไปใน database
    $sql= "UPDATE `tatto` SET status_tatt = 0  WHERE tatto_id = $id";
    $result=$conn->query($sql);
    if($result)header("Location:index.php?msg=สำเร็จ");
    else echo $id;

}
?>