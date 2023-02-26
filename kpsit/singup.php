<?php 
include_once 'database.php' ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {background-color: rgb(164, 197, 212);}
        h1 {color: #086100;}
        p {background-color: lemonchiffon center;}
        
     </style>
</head>
<body><h1>สมัครบัญชี</h1>
       <h2>{{email}}</h2>
    <form method="post">  
          <label for="fname">ชื่อ</label><br>
            <input type="fname" id="fname" name="fname"><br>
        <label for="email">อีเมลลล!</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="password">รหัส</label><br>
        <input type="password" id="password" name="password"><br><br>
        <label for="password">ยืนยันรหัส</label><br>
        <input type="password" id="password" name="repassword"><br>
        <input type="submit" value="ยืนยัน"><br>
    </form>
    <?php
    if(isset($_POST["email"])&&isset($_POST["password"])&&isset($_POST["repassword"])&&isset($_POST["fname"])){
        $phai=$_POST["email"];$korphai=$_POST["password"];$fah=$_POST["repassword"];$fang=$_POST["fname"];
        if($korphai!=$fah){
            echo"<script>alert(\"มันไม่ได้เว้ยย(-_-)!!รหัสมันไม่เหมือนกัน\")</script>";  exit(0);
        }
        if(!filter_var($phai, FILTER_VALIDATE_EMAIL)){
            echo"<script>alert(\"บอกให้ใช่อีเมลลว้อยย(-_-)\")</script>";  exit(0);
        }
        $statement = $pdo->prepare("SELECT * 
        FROM member
        WHERE email = :phai");
$statement->bindParam(':phai', $phai, PDO::PARAM_INT);
$statement->execute();
$sage = $statement->fetchAll(PDO::FETCH_ASSOC);

if (isset($sage[0])){
    echo"อีเมลนี้มันใช้ไปแล้ววโว้ยย!!";exit(0);
}
        $aim=password_hash($korphai,PASSWORD_DEFAULT);
        $statement = $pdo->prepare('INSERT INTO member(name,email,password) VALUES(:fang,:phai,:aim)');
        $statement->execute([
            ':fang' => $fang,
            ':phai' => $phai,
            ':aim' => $aim ,
        ]);
    }
    
    ?>
</body>
</html>