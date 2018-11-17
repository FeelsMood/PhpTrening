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
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    Admin Panel <br /><br />

    <?php

        $qid = mysqli_query($link, 'SELECT * FROM admins');
        while($row = mysqli_fetch_assoc($qid)) {
                    print($row['username'] . "<br>");
                }
    ?>

    <p class="logout" style="color: red;">wylogować się</p>

    <script type="text/javascript">
        var logout = document.querySelectorAll('.logout');
        logout.click(function() {
            <?php unset($_SESSION); ?>
        });
    </script>
</body>
</html>