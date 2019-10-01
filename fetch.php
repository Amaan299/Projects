<?php
include "db.php";
$search = $_POST['search'];
$limit = 10;
if (!isset($_GET['page'])) {
    $page = 1;
} else{
    $page = $_GET['page'];

}
$starting_limit = ($page-1)*$limit;
$sql = "SELECT id, bookname,publisher,isbn,file FROM MyGuests WHERE bookname LIKE '%$search%' or publisher LIKE '%$search%' or isbn LIKE '%$search%' LIMIT $starting_limit, $limit";
$stmt =$conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(isset($data['0'])){
    echo "<table>";
    echo "<tr><th><h2>Id</h2></th><th><h2>Book Name</h2></th><th><h2>Publisher</h2></th><th><h2>ISBN</h2></th><th><h2>File</h2></th><th><h2>Action</h2></th></tr>";

    foreach ($data as $row){
        echo "<tr><td>".$row["id"]."</td><td>".$row["bookname"]."</td><td>".$row["publisher"]."</td><td>".$row["isbn"]."</td><td>".$row["file"]."</td>
    <td><form  id='inFrom' action='delete_book.php' method='POST'><input type='hidden' name='id' value=".$row["id"]."><input style='color: red;height: 30px' type='submit' name='delete' value='Delete'></form>
    <form id='inFrom' action='update_form.php' method='post'><input type='hidden' name='id' value=".$row["id"]."><input style='color: green;height: 30px' type='submit' value='Edit'></form></td></tr>";
    }
    echo "</table>";
}
else{
    echo "Data Not Found";
}

?>