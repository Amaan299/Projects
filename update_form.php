<?php
include_once './db.php';
$page=$_GET['page'];
$search_text=$_GET['search_text'];

?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-1"></div>
        <?php

        $id=$_REQUEST["id"];
        $sql = "SELECT * FROM MyGuests where id= :id";
        $result = $conn->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_OBJ);
        $result->execute();
        for($i=0;$row=$result->fetch();$i++) {
            ?>
            <form id="myFormUpdate" action='update_book.php?page=<?php echo $page ?>&search_text=<?php echo $search_text ?>' class="col-lg-8" method="POST">
                <h1>My Book Form</h1>

                <input class="form-control"  value="<?php echo $row->bookname ?>" type="text"
                       name="name" required>
                <br>
                <input class="form-control"  value="<?php echo $row->publisher ?>" type="text"
                       name="publisher" required>
                <br>
                <input class="form-control"  type="text" value="<?php echo $row->isbn ?>" name="isbn"
                       required>
                <br>

                <?php $cover= "images/" . $row->file;
                ?>
                <img  src=<?php echo $cover ?> height='40px' width='40px'>
                <br />
                <br />
                <div class="file-field">
                    <div class="btn btn-info btn-sm float-left">
                        <span>Choose file</span>
                        <input type="file" name="file" value="<?php echo $row->file ?>">
                    </div>
                </div>
                <br><br>
                <input type='hidden' name='id' value="<?php echo $id?>">
                <input type="submit" value="Update" class="btn btn-lg btn-info" id="btn" name="Edit">

            </form>
            <?php
            unset($result);
        }
        ?>
        <div class="col-lg-3"></div>

    </div>

</div>

</body>
</html>