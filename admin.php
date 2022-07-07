<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Расслабуха</title>
    <link rel="stylesheet" href="/styles3.css">
    <link rel="shortcut icon" href="/images/domoi.jpg" type="image/jpg">
</head>
<body>
<section class="page page_rules">
    <header class="header">
        <div class="subsections_rules bashnya">
            <a class='domoi bashnya' href='../index.html'>ГЛАВНАЯ</a>
            <a class="rules bashnya" href='../rules.html'>ПРАВИЛА</a>
            <a class="news bashnya" href='../news.html'>НОВОСТИ</a>
            <a class="trading bashnya" href='../trading.html'>ТРЕЙДИНГ</a>
            <a class="account bashnya" href='../account.php'>АККАУНТ</a>
        </div>
    </header>
    <main class="main">
<?php
        $target_dir = "avatars/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        } elseif ($_FILES["fileToUpload"]["size"] > 52428800){
            echo "Эта аватарка весит слишком много! Лимит - 50 Мегабайт!";
        }else {
            if(isset($_POST['submit']) and $_FILES){
                move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "avatars/".$_FILES['fileToUpload']['name']);

                $avatarka = $_FILES['fileToUpload']['name'];

                echo "<script>location.replace('errors_accepts/accept_ava_updated.php');</script>";

                require "validation-form/connect.php";

                function getLogin($login) {
                    require "validation-form/connect.php";
                    $result_set = $mysql->query("SELECT `login` FROM `users` WHERE `login`='$login'");
                    $row = $result_set->fetch_assoc();
                    return $row["login"];
                }
            }
            $login = getLogin($_COOKIE['user']);

            $mysql->query("UPDATE `users` SET `avatar` = '$avatarka' WHERE `login` = '$login'");

            $mysql->close();

            exit();
        };

        function getAvatar($login) {
            require "validation-form/connect.php";
            $result_set = $mysql->query("SELECT `avatar` FROM `users` WHERE `login`='$login'");
            $row = $result_set->fetch_assoc();
            return $row["avatar"];
        }

        /*ВЫВЕДЕНИЕ ЗНАЧЕНИЯ ДЕНЯК ИЗ ДБ*/

        function getMoney($login) {
            require "validation-form/connect.php";
            $result_set_money = $mysql->query("SELECT `money` FROM `users` WHERE `login`='$login'");
            $row_money = $result_set_money->fetch_assoc();
            return $row_money["money"];
        }

        $money = getMoney($_COOKIE['user']);

        /*ВЫВЕДЕНИЕ ЗНАЧЕНИЯ АЙДИ ИЗ ДБ*/

        function getId($login) {
            require "validation-form/connect.php";
            $result_set_id = $mysql->query("SELECT `id` FROM `users` WHERE `login`='$login'");
            $row_id = $result_set_id->fetch_assoc();
            return $row_id["id"];
        }



        /*ВЫВЕДЕНИЕ ЗНАЧЕНИЯ НИКА ИЗ ДБ*/

        function getName($login) {
            require "validation-form/connect.php";
            $result_set_name = $mysql->query("SELECT `name` FROM `users` WHERE `login`='$login'");
            $row_name = $result_set_name->fetch_assoc();
            return $row_name["name"];
        }













        function getBanned($login) {
            require "validation-form/connect.php";
            $result_set_name = $mysql->query("SELECT `banned` FROM `users` WHERE `login`='$login'");
            $row_name = $result_set_name->fetch_assoc();
            return $row_name["banned"];
        }


        $bannew = $_POST['submit_ban'];


        if(isset($_POST['submit_ban'])){

            $bannew = $_POST['submit_ban'];

            require "validation-form/connect.php";

            $banned = ' Banned ';
            $mysql->query("UPDATE `users` SET `banned` = '$banned' WHERE `login` = '$bannew'");

            $mysql->close();

            echo "<script>location.replace('errors_accepts/accept_user_banned.php');</script>";

            exit();
        }

        $pardonnew = $_POST['submit_pardon'];


        if(isset($_POST['submit_pardon'])){

            $pardonnew = $_POST['submit_pardon'];

            require "validation-form/connect.php";

            $pardon = '';
            $mysql->query("UPDATE `users` SET `banned` = '$pardon' WHERE `login` = '$pardonnew'");

            $mysql->close();

            echo "<script>location.replace('errors_accepts/accept_user_banned.php');</script>";

            exit();
        }











        $avatar = getAvatar($_COOKIE['user']);
        if ($avatar == "") $avatar = "default.png";


        function getStatus_Admin($login) {
            require "validation-form/connect.php";
            $result_set = $mysql->query("SELECT `admin` FROM `users` WHERE `login`='$login'");
            $row = $result_set->fetch_assoc();
            return $row["admin"];
        }

        $admin = getStatus_Admin($_COOKIE['user']);

        function getStatus_Developer($login) {
            require "validation-form/connect.php";
            $result_set = $mysql->query("SELECT `developer` FROM `users` WHERE `login`='$login'");
            $row = $result_set->fetch_assoc();
            return $row["developer"];
        }

        $developer = getStatus_Developer($_COOKIE['user']);




        if(($admin == '') and ($developer == '')):
?>
            <h1>У тебя нету доступа в админку!</h1>
            <button class='toggle-theme btn_theme' style='margin-top: 5em;'>Тема</button>
            <div class='nobody_hears_u_div'>
                <p class='grey59_down'><a class='sh1ft' href="https://vk.com/sh1ft_yt"> &#169; by Sh1ft 2022</a></p>
            </div>
    <?php
        else:
            require "validation-form/connect.php";
            $query = $mysql->query("SELECT `login` FROM `users`;");
            $array = Array();
            while($result = $query->fetch_assoc()){
                $array[] = $result['login'];
            }

            array_unshift($array, NULL);
            unset($array[0]);

            /*echo '<pre>';
            print_r($array);
            echo '</pre>';*/
            ?>
            <div class="container">
                <p class='profile_text_nick' style="text-align:center; margin-left: 0; font-size: 2.4em; margin-top: 1em; margin-bottom: 1.7em;"><a title="Админка" style=" text-decoration: none;  background-color: #ff213b; color:white; border:0.1em solid black; border-radius: 2em; padding-bottom:10px;" href='/account.php'> Вернуться в профиль </a>
                <div class="admin_ban">
                    <div class="profile_avatarka_upload">
                        <form action="" method="post" class="regauth">
                            <input type="text" class="regauth" name="submit_ban" placeholder="Введдите логин кого забанить" s>
                            <input class="input_submit regauth_in" type="submit" value="Забанить" name="submit">
                        </form>
                    </div>
                    <div class="profile_avatarka_exit">
                        <button class="btn_users_logins" style="background-color: #ff213b"><a style="text-decoration: none; color: white; " href="/admin_users.php">Список логинов</a></button>
                    </div>
                </div>

                <div class="admin_pardon">
                    <div class="profile_avatarka_upload">
                        <form action="" method="post" class="regauth">
                            <input type="text" class="regauth" name="submit_pardon" placeholder="Введдите логин кого забанить" s>
                            <input class="input_submit regauth_in" type="submit" value="Разбанить" name="submit">
                        </form>
                    </div>
                    <div class="profile_avatarka_exit">
                        <button class="btn_users_logins" style="background-color: #ff213b"><a style="text-decoration: none; color: white; " href="/admin_users.php">Список логинов</a></button>
                    </div>


                </div>
                <div class="admin_money">
                    <div class="profile_avatarka_upload">
                        <form action="" method="post" class="regauth">
                            <input type="text" class="regauth" name="submit_ban" placeholder="Введдите логин кого забанить" s>
                            <input class="input_submit regauth_in" type="submit" value="Забанить" name="submit">
                        </form>
                    </div>
                    <div class="profile_avatarka_exit">
                        <button class="btn_users_logins" style="background-color: #ff213b"><a style="text-decoration: none; color: white; " href="/admin_users.php">Список логинов</a></button>
                    </div>


                </div>



                <button class='toggle-theme btn_theme' style='margin-top: 20em;'>Тема</button>
                <div class='nobody_hears_u_div'>
                    <p class='grey59_down'><a class='sh1ft' href="https://vk.com/sh1ft_yt"> &#169; by Sh1ft 2022</a></p>
                </div>
            </div>
    <?php endif;?>
    </main>

    <footer class="footer">
        <div class="footer_basement footer_rules">
            <a class='footer_youtube basement youtube_img' href='https://vk.cc/cd3Ffb'><img src='../images/social_credits/youtube_white_40px.png'></a>
            <a class="footer_discord basement discord_img" href='https://vk.cc/cd3Fvm'><img src='../images/social_credits/discord_white_40px.png'></a>
            <a class="footer_vk basement vk_img" href='https://vk.com/anti_toxic_toxic_club'><img src='../images/social_credits/vk_white_40px.png'></a>
        </div>
    </footer>
    <script type="text/javascript" src="../theme.js"></script>
    <script type="text/javascript" src="rasslabuha_random.js"></script>
    </div>
</section>
</body>
</html>