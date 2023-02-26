
<?php
include_once 'database.php' ;
$stmt = $pdo->prepare("SELECT* FROM post");
$stmt->execute();
$r = $stmt->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {background-color:wheat;}
        h1 {color: #086100;}
        p {background-color: yellowgreen;}
        label {background-color:skyblue;}
        .arming {border: 5px solid black;}
     </style>

</head>
<body>
<h1>สวัสดีวัยรุ่นเขียวเหลือง</h1>
   
    <form method="post">
    <label for="post">แปะความรู้</label><br>
        <input type="text" id="post" name="post">
        <input type="submit">
</form>
<?php 
foreach($r as $a){echo "<p class=\"arming\">". $a[0]."</p>".'<br>';}
;

if (isset($_POST ["post"])) {
    $x=$_POST ["post"] ;
    $stmt = $pdo->prepare("INSERT INTO post (post)
                        VALUES (:x);
    ");


    
    $stmt->bindParam(':x', $x , PDO::PARAM_STR);
    $result = $stmt->execute();}




?>



</body>
</html>
