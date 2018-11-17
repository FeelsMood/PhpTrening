<?php
    require_once 'connection.php';

    $link = mysqli_connect($host,$user,$password,$database)
    	or die("Error " . mysqli_error($link));
	// przygotowanie mysql lepiej robić przed właściwą częścią strony, tak żebyś mógł np przekierować użytkownika gdzie indziej,
	// później php nie może już tego zrobić :/

    $query ="SELECT * FROM users";
    $result = mysqli_query($link,$query) or die("Error" . mysqli_error($link));
    if($result)
    {
    	echo "Fuck yea (mysql działa :D)";
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
    <form method="POST" class="login">
        <input name='login' placeholder="Login">
		<input name='password' placeholder="Password" type='password'>
		<input type='submit' value='Login' class="submit">
    </form>
    <?php
    session_start();
    echo $_SESSION['test'] = "Сессия - тест";

        if( !empty($_REQUEST['password']) and !empty($_REQUEST['login']) ) {
            $login = $_REQUEST['login'];
            $password = $_REQUEST['password'];

		// $_POST lepiej zadziała w tym przypadku, a i powinienem trimować, czyli obcinać białe znaki na początku i końcu
	if (isset($_POST['login'],$_POST['password'])) {
		$login = trim($_POST['login']);
		$password = trim($_POST['password']);

        if( !empty($login) and !empty($password) ) {

			$query = 'SELECT*FROM admins WHERE username="'.$login.'" AND password="'.$password.'"';
        	$result = mysqli_query($link, $query);
        	$users = mysqli_fetch_assoc($result);

        	if (!empty($user)) {
        	    echo "FUCK YYEA!";
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
        	} else {
       		    echo "YOU FUCKING LOOSER!";
        	}
        }
        }
	}
    ?>
</body>
</html>
<?php

// zamyka połączenie z mysql
mysqli_close($link);

?>
