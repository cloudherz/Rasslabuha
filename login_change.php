<?php 

if(isset($_POST['submit_nick'])) {
        $mysql_name = new mysqli('localhost','root','root','register-bd');
        /*$mysql_name = new mysqli('localhost','u1657654_default','n9s6A5mk8NRsxZTm','u1657654_default');*/

        function getName($login) {
            $mysql_name = new mysqli('localhost','root','root','register-bd');
            /*$mysql_name = new mysqli('localhost','u1657654_default','n9s6A5mk8NRsxZTm','u1657654_default');*/
            $result_set_name = $mysql_name->query("SELECT `name` FROM `users` WHERE `login`='$login'");
            $row_name = $result_set_name->fetch_assoc();
            return $row_name["name"];
        }

        $name = getName($_COOKIE['user']);

        $mysql->query("UPDATE `users` SET `name` = '$name' WHERE `login` = '$login'");

        $mysql->close();
        header('Location: ../account.php');
        exit();
    }


?>