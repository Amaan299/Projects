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
        <form id="myForm" action="add_book.php" class="col-lg-8" method="POST">
            <h1>My Book Form</h1>
            <input class="form-control" placeholder="Book Name" type="text" name="name" required>
            <br>
            <input class="form-control" placeholder="Publisher" type="text" name="publisher" required>
            <br>
            <input class="form-control" placeholder="ISBN" type="text" name="isbn" required>
            <br>
            <div class="file-field">
                <div class="btn btn-info btn-sm float-left">
                    <span>Choose file</span>
                    <input type="file" name="file" required>
                </div>
            </div>
            <br><br>
            <input type="submit" value="Insert" class="btn btn-lg btn-info" id="btn" name="submit" >


        </form>
        <div class="col-lg-3"></div>

    </div>

</div>

</body>
</html>