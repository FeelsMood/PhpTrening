<?php
    require_once 'connection.php';

    /*
    *   Sprawdzimy czy w sesji zapisane są dane, jeśli nie to przekierowujemy do index.php
    */
    if (!isset($_SESSION['login'],$_SESSION['password'])) {
        header('Location: ./');
    } else {
        //
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your'e Profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    Your'e Profile <br /><br />

</body>
</html>
