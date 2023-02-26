
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
        *{margin: 0;
        padding: 0;}
        body {background-color:darkseagreen}
        h1 {background-color:wheat}
        p {background-color:wheat}
        label {font-size: x-large;}
        form {position: relative;left: 20%;}
    </style>
    
</head>
<body> 
<h1>login</h1>
<p>ยินดีต้อนรับ</p>
<form method="post">
    <label for="email">อีเมลลล!</label><br>
    <input type="email" name="mail"><br>
    <label for="password">รหัส</label><br>
    <input type="password" name="password"><br>
    <input type="submit" value="login"><br>
    <a href="http://localhost/kpsit/singup.php">Singin
        </a><br>
<?php
if (isset($_POST ["mail"])&&isset($_POST ["password"])){
$m=$_POST["mail"] ;
$p=$_POST["password"] ;


$statement = $pdo->prepare("SELECT * 
FROM member
WHERE email = :m");
$statement->bindParam(':m', $m, PDO::PARAM_INT);
$statement->execute();
$sage = $statement->fetchAll(PDO::FETCH_ASSOC);

if (empty($sage[0])){echo"หารหัสไม่เจออ่ะพี่(กรุณาสมัครรหัสก่อนนะครับ)";exit(0);}
if (!password_verify($p,$sage[0]['password'])){echo"รหัสผิด";exit(0);}
$_SESSION["username"] = $sage[0]["name"];
$_SESSION["email"] = $sage[0]["email"];
header("Location: number5.php");
} 
?>
</form>

</body>
</html>