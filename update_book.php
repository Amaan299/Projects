<?php
include "db.php";
$page = $_GET['page'];
$search_text=$_GET['search_text'];
try {

    if(isset($_POST["Edit"])){
        $id=$_POST["id"];
        $bookname=$_POST["name"];
        $publisher=$_POST["publisher"];
        $isbn=$_POST["isbn"];
        $file = $_POST["file"];
        if($file){
            $result = $conn->prepare("UPDATE MyGuests SET bookname='$bookname', publisher='$publisher', isbn='$isbn', file='$file' 
                                                where id = $id");
            $result->bindParam(":bookname", $bookname);
            $result->bindParam(":publisher", $publisher);
            $result->bindParam(":isbn", $isbn);
            $result->bindParam(":file", $file);
            $result->bindParam(":id", $id);
            $ans = $result->execute();
            echo $ans . "yeach";
        }
        else {
            $result = $conn->prepare("UPDATE MyGuests SET bookname='$bookname', publisher='$publisher', isbn='$isbn' 
                                                where id = $id");
            $result->bindParam(":bookname", $bookname);
            $result->bindParam(":publisher", $publisher);
            $result->bindParam(":isbn", $isbn);
            $result->bindParam(":id", $id);
            $ans = $result->execute();

        }

        unset($result);
        header("Location: http://localhost/AssignmentPhp/waste.php?page=$page&search_text=$search_text");

    }
}
catch (PDOException $e){
    echo $e->getMessage();
}

?>