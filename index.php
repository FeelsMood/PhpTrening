<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
    <?php
        require_once 'connection.php';

        $link = mysqli_connect($host,$user,$password,$database)
            or die("Error " . mysqli_error($link));

        $query ="SELECT * FROM users";
        $result = mysqli_query($link,$query) or die("Error" . mysqli_error($link));
        if($result)
        {
            echo "Fuck yea";
        }

        mysqli_close($link);
    ?>
</head>
<body>

</body>
</html>