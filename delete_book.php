<?php
include "db.php";
$page = $_GET['page'];
echo $page;
try {
    if(isset($_POST["delete"])){
        $sql = "DELETE FROM MyGuests WHERE id=:id";
        $result = $conn->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $id = $_REQUEST["id"];
        $result->execute();


        unset($result);

        header("Location: http://localhost/AssignmentPhp/showData.php?page=$page");
    }

}
catch (PDOException $e){
    echo $e->getMessage();
}

?>
