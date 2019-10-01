<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<div>
<?php
include "db.php";


echo "<h1>My Books Collection</h1>";

echo "<form style='display: inline' action='index.php' method='post'>
<input  style='float: right;padding:3px;text-align: center' type='text' id='search'   name='search' placeholder='Search' onkeyup='search_data()'>
<button id='addbtn' style='color: blue;margin-bottom: 5px;height: 35px;float:right'><b>Add Book</b></button></form>";
echo "<div id='result'>";
echo "<table>";
echo "<tr><th><h2>Id</h2></th><th><h2>Book Name</h2></th><th><h2>Publisher</h2></th><th><h2>ISBN</h2></th><th><h2>File</h2></th><th><h2>Action</h2></th></tr>";
$limit =10;
$query = "SELECT * FROM MyGuests";

$s = $conn->prepare($query);
$s->execute();
$total_results = $s->rowCount();
$total_pages = ceil($total_results/$limit);

if (!isset($_GET['page'])) {
    $page = 1;
} else{
    $page = $_GET['page'];

}

$starting_limit = ($page-1)*$limit;
$show  = "SELECT * FROM MyGuests ORDER BY id DESC LIMIT $starting_limit, $limit";

$r = $conn->prepare($show);
$r->execute();
while ($row =$r->fetch(PDO::FETCH_ASSOC)){
    $cover= "images/" . $row["file"];
    echo "<tr><td>".$row["id"]."</td><td>".$row["bookname"]."</td><td>".$row["publisher"]."</td><td>".$row["isbn"]."</td><td><img src=".$cover." height='40px' width='40px'></td>
    <td><form  id='demo' action=delete_book.php?page=$page  method='POST'><input type='hidden' name='id' value=".$row["id"]."><input style='color: red;height: 30px' type='submit' name='delete' value='Delete'  ></form>
    <form id='inFrom' action='update_form.php?page=$page' method='post'><input type='hidden' name='id' value=".$row["id"]."><input style='color: green;height: 30px' type='submit' value='Edit'></form></td></tr>";
}
$conn = null;
echo "</table>";
echo "</div>";
echo "<div id='page'>";
$prev_page = $page = $_GET['page'] - 1;

    if ($page != 0) {
        echo '<a style="color:red" href="showData.php?page=' . $prev_page . '">Previous</a>';
    }
    for ($page = 1; $page <= $total_pages; $page++) {
        ?>

        <a style="text-decoration: underline" href='<?php echo "?page=$page"; ?>' class="links"><?php echo $page; ?>
        </a>

    <?php }
    $check = $starting_limit + $limit;
    if ($total_results > $check) {
        $next_page = $page = $_GET['page'] + 1;
        echo '<a style="color:red" href="showData.php?page=' . $next_page . '">Next</a>';
    }
?>

</div>
<script>
    function search_data(){
        var search=jQuery('#search').val();
        if(search!=''){
            jQuery.ajax({
                method:'post',
                url: 'fetch.php',
                data:'search='+search,
                success:function (data) {
                    jQuery('#result').html(data);
                }
            });
        }
        else {

        }
    }

</script>
</body>

</html>

