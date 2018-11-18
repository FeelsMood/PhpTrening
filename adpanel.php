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

    <!-- users  -->
    <div class="users">
        <h1>Users</h1>
        <?php

            $qid = mysqli_query($link, 'SELECT * FROM users');
            while($row = mysqli_fetch_assoc($qid)) {
                        print($row['username'])." - ";
                        print($row['password']);
                    }
        ?>
    </div>

     <!-- add user  -->
     <div class="adduser">
        <h1>Add User</h1>
        <form method="post" name="form">
            <p><input type="text" name="uname" required placeholder="Username"></p>
            <p><input type="text" name="fname" required placeholder="First Name"></p>
            <p><input type="text" name="lname" required placeholder="Last Name"></p>
            <p><input type="email" name="email" required placeholder="Email"></p>
            <p><input type="password" name="pass" required placeholder="Password"></p>
            <p><input name="add" type="submit" value="add"></p>
        </form>
     </div>

    <!-- wylogować się  -->
    <form method="post" name="form">
        <p><input name="out" type="submit" value="Wylogować się"></p>
    </form>

    <?php
        if (isset($_POST['out'])) {
            unset($_SESSION['login']);
            unset($_SESSION['password']);
            header('Location: index.php');
        }

        if (isset($_POST['add'])) {
            $host = 'localhost';
            $database = 'Admin Panel';
            $user = 'Admin';
            $password = '123';

            $link = mysqli_connect($host,$user,$password,$database) or die("Error " . mysqli_error($link));
            $uname = $_POST['uname'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $query = "INSERT INTO `users`(`user_id`, `username`, `password`, `first_name`, `last_name`, `email`) VALUES (NULL, '$uname', '$pass','$fname', '$lname', '$email')";
            $result = mysqli_query($link, $query);
            if($result) {
                echo 'Done!';
            }
        }
    ?>
</body>
</html>
