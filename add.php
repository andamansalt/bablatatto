<?php

//รับข้อมูลจากหน้า index เพื่อแก้ไข
if(isset($_POST['submit_edit'])){//ถ้ามีการกด submit_editเข้ามาก็จะประกาศตัวแปรของข้อมูลที่จะเก็บ
    $id=$_POST['id'];
    $name=$_POST['name'];
    $image=$_POST['image'];
    $color=$_POST['color'];
    $time=$_POST['time'];
    $detail=$_POST['detail'];
 
    
    include 'db_connect.php';
    //ใช้คำสั่ง insert into เพื่อเพิ่มข้อมูลลงไปใน database
    $sql= "INSERT INTO tatto (tatto_id,tatto_name, tatto_color,tatto_pic, tatto_time, tatto_detail, category_id) VALUES ('$id', '$name', '$color', '$image', '$time', '$detail' , 0)";
    $result=$conn->query($sql);
    if($result)header("Location:addmin.php?msg=เพิ่มข้อมูลสำเร็จ");
    else header("Location:addmin.php?msg=ไม่สามารถเพิ่มข้อมูลได้_ผิดปกติบางอย่าง");

}
?>