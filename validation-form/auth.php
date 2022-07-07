<?php
	$login = filter_var(trim($_POST['login']),
	FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['pass']),
	FILTER_SANITIZE_STRING);


    /*$pass = md5($pass."damn0eto0zhe0xeshirovanie00");*/

	require "connect.php";

    $result = $mysql->query("SELECT `id` FROM `users` WHERE `login`='$login'");
    if (mysqli_num_rows($result) == 0) {
        echo "<script>location.replace('../errors_accepts/error_account_does_not_exist.php');</script>";
        exit();
    }else {
        $result = $mysql->query("SELECT `id` FROM `users` WHERE `pass`='$pass'");
        if (mysqli_num_rows($result) == 0) {
            echo "<script>location.replace('../errors_accepts/error_password_incorrect.php');</script>";
            exit();
        }else {
            $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
            $user = $result->fetch_assoc();
            setcookie('user', $user['login'], time() + 3600 * 60, "/");

            $mysql->close();

            echo "<script>location.replace('../account.php');</script>";

            exit();
        }
    }

    /*
    $result = $mysql->query("SELECT `id` FROM `users` WHERE `login`='$login'");
    if (mysqli_num_rows($result) == 0) {
        echo "<script>location.replace('../errors_accepts/error_account_does_not_exist.html');</script>";
		exit();
	}else {
        $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
        $user = $result->fetch_assoc();
            setcookie('user', $user['login'], time() + 3600, "/");

	$mysql->close();

    echo "<script>location.replace('../account.php');</script>";

	exit();
    }
	*/
?>