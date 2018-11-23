<?php
require_once 'connection.php';

/*
*   To najlepiej żeby było na samej górze, żeby header('Location: ..') działało 100% poprawnie
*   header() powinno być za nim zostanie wypisany jakikolwiek tekst
*/

if( !empty($_REQUEST['password']) and !empty($_REQUEST['login']) ) {
    $login = $_REQUEST['login'];
    $password = $_REQUEST['password'];

    // $_POST lepiej zadziała w tym przypadku, a i powinienem trimować, czyli obcinać białe znaki na początku i końcu
    if (isset($_POST['login'],$_POST['password'])) {
        $login = trim($_POST['login']);
        $password = trim($_POST['password']);

        if( !empty($login) and !empty($password) ) {

            $query = 'SELECT*FROM users WHERE username="'.$login.'" AND password="'.$password.'"';
            $result = mysqli_query($link, $query);
            $user = mysqli_fetch_assoc($result);

            if (!empty($user)) {
                header("Location: profile.php");

                /*
                *   Tu sobie zrobimy wpis do sesji
                */
                $_SESSION['login'] = $login;
                $_SESSION['password'] = $password;

                echo "FUCK YYEA!";
            } else {
                echo "YOU FUCKING LOOSER!";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form method="POST" class="login-user">
        <h1>Login</h1>
        <input type="text" name='login' placeholder="Login">
		<input name='password' placeholder="Password" type='password'>
		<input type='submit' value='Login' class="submit">
    </form>
    <a href="reg.php">Nie mam konta</a>
</body>
</html>
<?php

// zamyka połączenie z mysql
mysqli_close($link);

?>
