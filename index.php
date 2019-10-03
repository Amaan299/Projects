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
            <input class="form-control" placeholder="ISBN" type="text" name="isbn" onchange="valisbn(this)" required>
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
<script>
    function valisbn($isbn)
    {
        // length must be 10
        $n = strlen($isbn);
        if ($n != 10)
            return -1;

        // Computing weighted sum
        // of first 9 digits
        $sum = 0;
        for ($i = 0; $i < 9; $i++)
        {
            $digit = $isbn[$i] - '0';
            if (0 > $digit || 9 < $digit)
                return -1;
            $sum += ($digit * (10 - $i));
        }

        // Checking last digit.
        $last = $isbn[9];
        if ($last != 'X' && ($last < '0' ||
            $last > '9'))
            return -1;

        // If last digit is 'X', add 10
        // to sum, else add its value.
        $sum += (($last == 'X')
            ? 10 : ($last - '0'));

        // Return true if weighted sum of
        // digits is divisible by 11.
        return ($sum % 11 == 0);
    }

        ?>
</script>
</body>
</html>