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
    <div class="profile">
        Your'e Profile <br /><br />
        <img name="profimg" src="<?php echo $img;?>" alt="">
    </div>


    <?php
        $img = $_POST['profimg'];
        $query = 'SELECT*FROM `users` WHERE `prof`="'.$img.'"';
        $result = mysqli_query($link, $query);
        $user = mysqli_fetch_assoc($result);
     ?>


</body>
</html>
