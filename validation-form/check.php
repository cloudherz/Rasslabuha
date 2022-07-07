<?php
	$login = filter_var(trim($_POST['login']),
	FILTER_SANITIZE_STRING);
	$name = filter_var(trim($_POST['name']),
	FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['pass']),
	FILTER_SANITIZE_STRING);
    $email= filter_var(trim($_POST['email']),
        FILTER_SANITIZE_STRING);


    require "connect.php";

    $result = $mysql->query("SELECT `id` FROM `users` WHERE `login`='$login'");
    if (mysqli_num_rows($result) > 0) {

        echo "<script>location.replace('../errors_accepts/error_login_zanyat.php');</script>";

    }else{
        if (mb_strlen($login) < 5 || mb_strlen($login) > 16) {
            echo "<script>location.replace('../errors_accepts/error_login_len.php');</script>";
            exit();
        } else if (mb_strlen($name) < 1 || mb_strlen($name) > 50) {
            echo "<script>location.replace('../errors_accepts/error_nick_len.php');</script>";
            exit();
        } else if (mb_strlen($pass) < 5 || mb_strlen($pass) > 32) {
            echo "<script>location.replace('../errors_accepts/error_password_len.php');</script>";
            exit();
        }

        /*$pass = md5($pass."damn0eto0zhe0xeshirovanie00");*/

        require "connect.php";

        $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`, `email`) 
        VALUES('$login', '$pass', '$name', '$email')");

        $mysql->close();

        echo "<script>location.replace('../account.php');</script>";
        exit();
    }
?>