<?php
$servername = "localhost";
$username = "root";
$password = "amans299";
try
{
    $conn=new PDO("mysql:host=$servername;dbname=myDBPDO",$username,$password);
} catch (PDOException $ex) {
    echo 'Exception'.$ex->getMessage();
}
?>