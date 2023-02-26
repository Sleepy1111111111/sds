<?php
$host = 'localhost:3307';
$username = 'root';
$password = '';
$database = 'kpsit';


// PDO
$pdo = new PDO( "mysql:host={$host}; dbname={$database}", $username, $password, [ PDO::ATTR_EMULATE_PREPARES => false ] );
// OOP mysqli
$mysqli = new mysqli( $host, $username, $password, $database );
// Procedural mysqli
$mysqli_p = mysqli_connect( $host, $username, $password, $database );

?>