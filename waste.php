<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<div>
    <?php
   // include "db.php";
    include "select.php";


    echo "<h1>My Books Collection</h1>";
?>
    <input  style='float: right;padding:3px;text-align: center' type='text' id='search' value="<?php echo isset($_GET['search_text']) ? $_GET['search_text'] : ''; ?>"  name='search' placeholder='Search' onkeyup="setTimeout('chk_me();',3000);">
    <?php
    echo "<form style='display: inline' action='index.php' method='post'>
<button id='addbtn' style='color: blue;margin-bottom: 5px;height: 35px;float:right'><b>Add Book</b></button></form>";
    echo "<div id='result'>";
    echo "<table>";
    echo "<tr><th><h2>Id</h2></th><th><h2>Book Name</h2></th><th><h2>Publisher</h2></th><th><h2>ISBN</h2></th><th><h2>File</h2></th><th><h2>Action</h2></th></tr>";



    foreach ($data as $row) {
        $cover= "images/" . $row["file"];
        echo "<tr><td>".$row["id"]."</td><td>".$row["bookname"]."</td><td>".$row["publisher"]."</td><td>".$row["isbn"]."</td><td><img src=".$cover." height='40px' width='40px'></td>
    <td><button value=".$row["id"]." style='color: red;height: 30px' type='submit' name='delete'  onclick='removeParents(this.value, $page)' >Delete</button>
    <form id='inFrom' action='update_form.php?page=$page&search_text=$search_text' method='post'><input type='hidden' name='id' value=".$row["id"]."><input style='color: green;height: 30px' type='submit' value='Edit'></form></td></tr>";
    }
    $conn = null;
    echo "</table>";
    echo "</div>";
        $end = (($page!=$pages)?$start+10: $result);
        ?>
    <label for="pageNumber" style="color: #1d2124;margin-left: 35rem" ><?php echo "Showing " . ($start+1) . " to " . $end . " of " . $result?></label>
    <div class="d-inline ml-5  ">
        <button id="btnPrevious"  class="btn btn-outline-dark" onclick="previous();">&laquo; Previous</button>
        <button id="btnNext" class="btn btn-outline-success" onclick="next();">Next &raquo;</button>
    </div>

</div>
<?php
if ($page >= $pages) {
    echo "<script> $('#btnNext').attr('disabled' , true); </script>";
} else {
    echo "<script> $('#btnNext').removeAttr('disabled' , true); </script>";
}
if ($page == 1) {
    echo "<script> $('#btnPrevious').attr('disabled' , true); </script>";
} else {
    echo "<script> $('#btnPrevious').removeAttr('disabled' , true); </script>";
}
?>
</div>


</div>
<script>


    function removeParents(r,page) {

        let ans = confirm("Are you sure you want to delete this row?");

        if (ans) {
            window.location.replace('delete_book.php?page=' + page + '& delete=' + r);
        } else {
            return;
        }

    }
    function previous() {
        let pre = <?php echo $page - 1; ?>;
        let val = $("#search").val();

        window.location.replace("waste.php?page=" + pre + "&search_text=" + val);
    }
    function next() {
        let n = <?php echo $page + 1; ?>;
        let val = $("#search").val();
        window.location.replace("waste.php?page=" + n + "&search_text=" + val);
    }
    function chk_me() {
        let v = $("#search").val();
        console.log("value", v);
        let page = <?php echo  $page ?>
        //if (v!="") {
        console.log("inside if");
        window.location.replace("waste.php?page="  + page +"&search_text=" + v );
        // }
        // alert("hello");
    }



</script>
</body>

</html>

