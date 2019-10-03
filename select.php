<?php
include "db.php";
$limit = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;
$search_text = $_GET['search_text'];

try {
    $stmt = $conn->prepare("select   id , bookname , publisher , isbn , file from myDBPDO.MyGuests
where (bookname like '%" . $search_text . "%' or
publisher like '%" . $search_text . "%' or
isbn like '%" . $search_text . "%') order by id DESC LIMIT $start , $limit ");
    $arr = $stmt->execute();  //to execute query
    $data = $stmt->fetchAll();
    unset($stmt);// to fetch all data from database
    //to get the total of record
    $stmt1 = $conn->prepare("SELECT count(*) FROM MyGuests where (bookname like '%" . $search_text . "%' or
publisher like '%" . $search_text . "%' or
isbn like '%" . $search_text . "%') ");
     $stmt1->execute();
    $result = $stmt1->fetchColumn();

    $pages = ceil($result / $limit);
    //to get the number of pages
} catch (PDOException $e) {
    echo "select not executed" . "<br>" . $e;
}