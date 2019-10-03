<?php
include "db.php";



try {
    if(isset($_GET["delete"])){
        $id = $_GET['delete'];
        $sql = "DELETE FROM MyGuests WHERE id=:id";
        $result = $conn->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();

        $page = $_GET['page'];
        $search_text = $_GET['search_text'];
        unset($result);
        if($search_text!=''){
        header("Location: http://localhost/AssignmentPhp/waste.php?page=$page&search_text=$search_text");
    }
        else{
            header("Location: http://localhost/AssignmentPhp/waste.php?page=$page");
        }
    }

}
catch (PDOException $e){
    echo $e->getMessage();
}

?>
