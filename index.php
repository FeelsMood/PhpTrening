<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
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
    <form method="POST" class="login">
        <input name='login' placeholder="Login">
		<input name='password' placeholder="Password" type='password'>
		<input type='submit' value='Login' class="submit">
    </form>
    <?php
        if( !empty($_REQUEST['password']) and !empty($_REQUEST['login']) ) {
            $login = $_REQUEST['login'];
            $password = $_REQUEST['password'];
        }

        $query = 'SELECT*FROM admins WHERE username="'.$login.'" AND password="'.$password.'"';
        $result = mysqli_query($link, $query);
        $users = mysqli_fetch_assoc($result);

        if (!empty($user)) {
            echo "FUCK YYEA!";
        } else {
            echo "YOU FUCKING LOOSER!";
        }
    ?>
</body>
</html>