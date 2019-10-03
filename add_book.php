<?php
include "db.php";
try {

    if(isset($_POST["submit"])){
        $sql = "INSERT INTO MyGuests (bookname, publisher, isbn,file)
        VALUES ('".$_POST["name"]."','".$_POST["publisher"]."','".$_POST["isbn"]."','".$_POST["file"]."')";
        $conn->exec($sql);
        header("Location: http://localhost/AssignmentPhp/waste.php");
    }
}
catch (PDOException $e){
    echo $e->getMessage();
}

?>