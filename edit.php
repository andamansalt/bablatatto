<?php

//รับข้อมูลจากหน้า addmin เพื่อแก้ไข
if(isset($_POST['submit_edit'])){//ถ้ามีการกด submit_editเข้ามาก็จะประกาศตัวแปรของข้อมูลที่จะเก็บ
    $id=$_POST['id'];
    $name=$_POST['name'];
    $image=$_POST['image'];
    $color=$_POST['color'];
    $time=$_POST['time'];
    $detail=$_POST['detail'];


    
    include 'db_connect.php';
    //ใช้คำสั่ง update เพื่อแก้ไขข้อมูลใน database
    $sql="UPDATE tatto SET tatto_id = '$id', tatto_name = '$name', tatto_pic = '$image', tatto_color = '$color', tatto_time = '$time', tatto_detail = '$detail' WHERE $id=tatto.tatto_id;";
    $result=$conn->query($sql);
    
    if($result)header("Location:addmin.php?msg=สำเร็จ");
    else header("Location:addmin.php?msg=ผิดปกติบางอย่าง");

//กลับไปยังหน้าเดิม

}
?>