<?php
    require_once 'connection.php';

    $link = mysqli_connect($host,$user,$password,$database)
    	or die("Error " . mysqli_error($link));
	// przygotowanie mysql lepiej robić przed właściwą częścią strony, tak żebyś mógł np przekierować użytkownika gdzie indziej,
	// później php nie może już tego zrobić :/

    $query ="SELECT * FROM users";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    Admin Panel <br /><br />

    <?php

        $qid = mysqli_query($link, 'SELECT * FROM admins');
        while($row = mysqli_fetch_assoc($qid)) {
                    print($row['username'] . "<br>");
                    // if($row['username'] == 'name') {
                    //     print "Done";
                    // }
                    // else {
                    //     print "Error";
                    // }
                }
    ?>
</body>
</html>