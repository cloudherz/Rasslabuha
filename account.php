<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Аккаунт Расслабуха</title>
    <link rel="stylesheet" href="styles4.css" type="text/css">
    <link rel="stylesheet" href="layer.css" type="text/css">
    <link rel="shortcut icon" href="/images/domoi.jpg" type="image/jpg">
</head>
<body>
<div class="page page_account">
    <header class="header">
        <div class="subsections_account bashnya">
            <a class='domoi bashnya' href='index.php'>ГЛАВНАЯ</a>
            <a class="rules bashnya" href='rules.html'>ПРАВИЛА</a>
            <a class="news bashnya" href='news.html'>НОВОСТИ</a>
            <a class="trading bashnya" href='community.php'>СООБЩЕСТВО</a>
            <a class="account bashnya" href='account.php'>АККАУНТ</a>
        </div>
    </header>
    <main class="main">
        <?php
        $target_dir = "avatars/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if (file_exists("avatars/".$_FILES['fileToUpload']['name'])) {
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            } elseif ($_FILES["fileToUpload"]["size"] > 52428800){
                echo "Эта аватарка весит слишком много! Лимит - 50 Мегабайт!";
            }else {
                if(isset($_POST['submit']) and $_FILES){

                    $original_name = $_FILES["fileToUpload"]["name"];
                    $extension = pathinfo($original_name, PATHINFO_EXTENSION);
                    $new_name = uniqid().'.'.$extension;

                    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "avatars/".$new_name);

                    $avatarka = $new_name;

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

                $mysql_two->query("UPDATE `posts` SET `user_avatar` = '$avatarka' WHERE `user_login` = '$login'");
                $mysql_two->close();

                exit();
            };
        } else {
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

                $mysql_two->query("UPDATE `posts` SET `user_avatar` = '$avatarka' WHERE `user_login` = '$login'");
                $mysql_two->close();

                exit();
            };
        }


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

        $id = getId($_COOKIE['user']);

        /*ВЫВЕДЕНИЕ ЗНАЧЕНИЯ НИКА ИЗ ДБ*/

        function getName($login) {
            require "validation-form/connect.php";
            $result_set_name = $mysql->query("SELECT `name` FROM `users` WHERE `login`='$login'");
            $row_name = $result_set_name->fetch_assoc();
            return $row_name["name"];
        }

        function getStatus($login) {
            require "validation-form/connect.php";
            $result_set_status = $mysql->query("SELECT `status` FROM `users` WHERE `login`='$login'");
            $row_status = $result_set_status->fetch_assoc();
            return $row_status["status"];
        }










        $name = getName($_COOKIE['user']);
        $namenew = $_POST['submit_nick'];


        if(isset($_POST['submit_nick'])){
            function getLogin($login) {
                require "validation-form/connect.php";

                $result_set = $mysql->query("SELECT `login` FROM `users` WHERE `login`='$login'");
                $row = $result_set->fetch_assoc();
                return $row["login"];
            }
            $namenew = $_POST['submit_nick'];
            $login = getLogin($_COOKIE['user']);

            require "validation-form/connect.php";

            if (mb_strlen($namenew) < 1 || mb_strlen($namenew) > 12) {
                echo "<script>location.replace('../errors_accepts/error_nick_len.php');</script>";
                exit();
            }else{
                $mysql->query("UPDATE `users` SET `name` = '$namenew' WHERE `login` = '$login'");
                $mysql->close();

                $mysql_two->query("UPDATE `posts` SET `user_nick` = '$namenew' WHERE `user_login` = '$login'");
                $mysql_two->close();
                echo "<script>location.replace('errors_accepts/accept_nick_updated.php');</script>";


                exit();
            }
        }









        $status = getStatus($_COOKIE['user']);
        $statusnew = $_POST['submit_status'];


        if(isset($_POST['submit_status'])){
            function getLogin($login) {
                require "validation-form/connect.php";

                $result_set = $mysql->query("SELECT `login` FROM `users` WHERE `login`='$login'");
                $row = $result_set->fetch_assoc();
                return $row["login"];
            }
            $statusnew = $_POST['submit_status'];
            $login = getLogin($_COOKIE['user']);

            require "validation-form/connect.php";

            if (mb_strlen($statusnew) < 1 || mb_strlen($statusnew) > 24) {
                echo "<script>location.replace('../errors_accepts/error_status_len.php');</script>";
                exit();
            }else{
                $mysql->query("UPDATE `users` SET `status` = '$statusnew' WHERE `login` = '$login'");

                $mysql->close();
                echo "<script>location.replace('errors_accepts/accept_status_updated.php');</script>";


                exit();
            }
        }










        function getStatus_Banned($login) {
            require "validation-form/connect.php";
            $result_set = $mysql->query("SELECT `banned` FROM `users` WHERE `login`='$login'");
            $row = $result_set->fetch_assoc();
            return $row["banned"];
        }

        $banned = getStatus_Banned($_COOKIE['user']);

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










        $avatar = getAvatar($_COOKIE['user']);
        if ($avatar == "") $avatar = "default.png";



        if($_COOKIE['user'] == ''):
            ?>
            <div class="container">
                <div class="row">
                    <div class="col" style="margin-bottom: 1em;">
                        <h2 style="margin-bottom: 0.7em; margin-top: 0.2em;">Регистрация</h2>
                        <form action="validation-form/check.php" method="post" class="regauth">
                            <input type="text" class="form-control regauth" name="login" id="login" placeholder="Введдите логин">
                            <input type="email" class="form-control regauth" name="email" id="email" placeholder="Введдите почту (Опционально, даёт возможность смены пароля)">
                            <input type="text" class="form-control regauth" name="name" id="name" placeholder="Введдите ник">
                            <input type="password" class="form-control regauth" name="pass" id="pass" placeholder="Введдите пароль">
                            <button class="btn_regauth">Зарегаться</button>
                        </form>
                    </div>
                    <div class="col" style="margin-bottom: 1em">
                        <h2 style="margin-bottom: 0.7em; padding-top: 0.2em;">Вход</h2>
                        <form action="validation-form/auth.php" method="post" class="regauth">
                            <input type="text" class="form-control regauth" name="login" id="login" placeholder="Введдите логин">
                            <input type="password" class="form-control regauth" name="pass" id="pass" placeholder="Введдите пароль">
                            <button class="btn_regauth">Войти</button>
                            <a href="validation-form/reset.php" class="forgot_pass_a""><p class="forgot_pass_p">Забыли пароль?</p></a>
                        </form>
                    </div>
                </div>
            </div>
            <button class='toggle-theme btn_theme' style='margin-top: 8em;'>Тема</button>
            <div class='nobody_hears_u_div'>
                <p class='grey59_down'><a class='sh1ft' href="https://vk.com/sh1ft_yt"> &#169; by Sh1ft 2022</a></p>
            </div>
        <?php elseif($banned != ''):?>
            <section class="section" id="section">
                <h1 class="errors">ТЫ ЗАБАНЕН!</h1>
                <h2 class="errors">Неоправданный бан? Пиши</h2>
            </section>
            <button class='toggle-theme btn_theme' style='margin-top: 8em;'>Тема</button>
            <div class='nobody_hears_u_div'>
                <p class='grey59_down'><a class='sh1ft' href="https://vk.com/sh1ft_yt"> &#169; by Sh1ft 2022</a></p>
            </div>
        <?php elseif($developer != ''):?>
            <div class="container">
                <div class="profile_avatarka">
                    <div class="profile_avatarka_ava">
                        <img src="avatars/<?=$avatar?>"  style="width: 416px;max-height: 650px;border-radius: 23px;border: 8px solid rgba(0,0,0,.4);margin-bottom: 10px;" class="avatarka">
                    </div>
                    <div class="profile_avatarka_upload">
                        <form method="post" action="" enctype="multipart/form-data" class="regauth_in input_submit_ava_upload" style="padding-top:0.5em; padding-left: 15px; padding-right: 15px">
                            <input type="file" name="fileToUpload" id="fileToUpload" class="regauth_in" style="color:black;width:80%; margin-top:0; margin-left: 0">
                            <input class="input_submit" type="submit" value="✔" name="submit" class="input_submit_ava_upload_button" style="border-radius: 12px;width:13%; margin-left: 11px; margin-top:0; margin-bottom; font-size: 1em; padding-left:13px">
                        </form>
                    </div>
                    <div class="profile_avatarka_exit">
                        <button class="btn_theme_exit"><a style="text-decoration: none; color: white;" href="validation-form/exit.php">Выйти</a></button>
                    </div>
                    <button class='toggle-theme btn_theme' style='margin-top: 1em;'>Тема</button>
                    <div class='nobody_hears_u_div'>
                        <p class='grey59_down'><a class='sh1ft' href="https://vk.com/sh1ft_yt"> &#169; by Sh1ft 2022</a></p>
                    </div>
                </div>


                <div class="profile_text">
                    <form action="" method="post" class=" regauth2" style="margin-left:14px;">
                        <input type="text" class="form-control regauth2 change_nickname" name="submit_nick" placeholder="<?=$name?>" value="<?=$name?>" style="border-radius: 16px; padding-left: 9px">
                    </form>
                    <form action="" method="post" class=" regauth2" style="margin-left:14px; margin-top: 14px">
                        <input type="text" class="form-control regauth3 change_nickname" name="submit_status" placeholder="<?=$status?>" value="<?=$status?>" style="border-radius: 16px; padding-left: 10px">
                    </form>


                    <div class="achiv_and_money">
                        <div style="margin-left: 0px; margin-top: 14px;" class="account_achiv">
                                <img href="images/domoi.jpg" style="">
                        </div>
                        <div style=" margin-top: 14px; margin-right: 0em;" class="regauth2 form-control account_money change_nickname">
                                <p class='profile_text_nick' style="margin-left: 1em; font-size: 2.2em; margin-top: 0em;"><a href="ets/ets.php"></a></p>
                        </div>
                    </div>



                    <div style="background-color: #c7c7c7; border: 7px solid rgba(0,0,0,.4); border-radius: 20px; margin-top: 9.5em; margin-left: 20px; margin-right: 0; margin-bottom: 0; font-size:1em " class="posts_br">
                         
                    </div>
                    <div class="post_upload">
                        <form  action="posts_validation_form/posts_check.php" method="post" class="" enctype="multipart/form-data">
                            <textarea type="text" class="form-control regauth_post" name="post_text" id="post_text" placeholder="Расскажите что-нибудь" style="margin-bottom: 10px;padding-left: 8px"></textarea>
                            <p style="margin-left: 20px; font-size: 0.9em; margin-top: 0"><a style="color:rgba(255,255,255,0.45); text-decoration: none;" href="terms_and_conditions.html">Пользовательское соглашение</a></p>
                            <input type="file" name="fileToUpload" id="post_image" class="regauth_in file_post">
                            <input class="input_submit_post" type="submit" value="ОПУБЛИКОВАТЬ ЗАПИСЬ" name="submit" class="input_submit_post_upload">
                        </form>
                    </div>
                    <div style="margin: 0 0; padding-left: 14px">
                        <?

                        require "validation-form/connect.php";





                        $result = mysqli_query($mysql, 'SELECT * FROM `posts` ORDER BY `post_id` DESC');

                        while ($row = mysqli_fetch_assoc($result))// получаем все строки в цикле по одной
                        {
                            if ($_COOKIE['user'] == $row['user_login']) {
                                echo '<div style="margin-left: 0px;margin-right: 0px;" class="posts_div">';
                                echo '<div style="margin: 0 0; display: flex;">';
                                echo '<div src="avаtars/'.$row['user_avatar'].'" href="id'.$id.'"  style="background-image: url(avatars/'.$row['user_avatar']. ');
                                background-size: 120px; background-position: center; background-repeat: no-repeat;
                                width: 100px; height:100px; max-height: 1000px;border-radius: 23px;border: 8px solid #2E2E2E;margin-bottom: 10px;display: flex;)"
                                 class="avatarka posts_avatarka"></div>
                                 <p class="posts_nick"><a style="margin-left: 0;width: 300px;margin-right: 0px;display: flex;" class="user_nick_adress_id" href="id' .$id.'">'.$row['user_nick'].'</a></p>';
                                echo '<form action="posts_validation_form/posts_delete.php" method="post" class="" enctype="multipart/form-data" style="display: flex;align-items: center; width: 1em;">';
                                $post_id_to_delete = $row["post_id"];
                                echo '<input type="text" class="form-control regauth_post" name="post_id" id="post_id" value="'.$post_id_to_delete.'" style="display: none;margin-bottom: 10px;padding-left: 8px">';
                                echo '<input class="input_submit_post" type="submit" value="🗑" name="submit_delete" class="input_submit_post_upload">';
                                echo '</form>';
                                echo '</div>';
                                if ($row['post_image'] != ''){
                                    echo '<div style="margin: 0 0">';
                                    echo '<p class="posts_text_two">'.$row['post_text'].'</p>';
                                    echo '</div>';
                                    echo '<img src="posts_image/'.$row['post_image'].'" class="avatarka posts_image">';
                                }else{
                                    echo '<div style="margin: 0 0">';
                                    echo '<p class="posts_text">'.$row['post_text'].'</p>';
                                    echo '</div>';
                                }
                                echo '</div>';
                                /*
                                echo '<p>Айди поста - '.$row['post_id'].'</p>';// выводим данные
                                echo '<p>Логин опубликовавшего - '.$row['user_id'].'</p>';
                                echo '<p>Ник опубликовавшего - '.$row['user_nick'].'</p>';
                                echo '<p>Ава опубликовавшего текстом- '.$row['user_avatar'].'</p>';
                                echo '<p>Ник опубликовавшего - '.$row['post_hash'].'</p>';
                                echo '<p>Текст публикации - '.$row['post_text'].'</p>';
                                echo '<p>Картинка публикации текстом - '.$row['post_image'].'</p>';
                                echo '<p>Хэш публикации - '.$row['post_hash'].'</p>';
                                echo '<img src="posts_image/'.$row['post_image'].'"  style="width: 416px;max-height: 1000px;border-radius: 23px;border: 8px solid rgba(0,0,0,.4);margin-bottom: 10px;" class="avatarka">';
                                echo '<img src="avatars/'.$row['user_avatar'].'"  style="width: 100px;max-height: 1000px;border-radius: 23px;border: 8px solid rgba(0,0,0,.4);margin-bottom: 10px;" class="avatarka">';
                                echo '<br>';
                                 */

                            }
                        }
                        echo '<p style="color: #646464">Создайте пост! Напишите что-нибудь в поле для ввода текста! Ах да, и не забудьте прикрепить картонку =--)</p>';
                        /*
                         echo '<p>ТЕКСТ'.$row['ЯЧЕЙКА СТРОКИ В БД'].'</p>'; --- ОБЩИЙ ПРИМЕР

                        echo --- ВЫВОДИМ

                        '<p> --- ОТКРЫВАЕМ ТЕГ

                        ТЕКСТ --- ЛЮБОЙ ВАЩЕ ТЕКСТ

                        '.$row['ЯЧЕЙКА СТРОКИ В БД'].' --- УКАЗЫВАЕМ КАКАЯ ЯЧЕЙКА ИЗ БД НАМ НУЖНА

                        </p>' --- ЗАКРЫВАЕМ ТЕГ

                        ; --- КОНЕЦ ВЫВОДА
                         */
                        ?>
                    </div>
                </div>
            </div>


        <?php elseif($admin != ''):?>
            <div class="container">
                <div class="profile_avatarka">
                    <div class="profile_avatarka_ava">
                        <img src="avatars/<?=$avatar?>"  style="width: 416px;max-height: 650px;border-radius: 23px;border: 8px solid rgba(0,0,0,.4);margin-bottom: 10px;" class="avatarka">
                    </div>
                    <div class="profile_avatarka_upload">
                        <form method="post" action="" enctype="multipart/form-data" class="regauth_in input_submit_ava_upload" style="padding-top:0.5em; padding-left: 15px; padding-right: 15px">
                            <input type="file" name="fileToUpload" id="fileToUpload" class="regauth_in" style="color:black;width:80%; margin-top:0; margin-left: 0">
                            <input class="input_submit" type="submit" value="✔" name="submit" class="input_submit_ava_upload_button" style="border-radius: 12px;width:13%; margin-left: 11px; margin-top:0; margin-bottom; font-size: 1em; padding-left:13px">
                        </form>
                    </div>
                    <div class="profile_avatarka_exit">
                        <button class="btn_theme_exit"><a style="text-decoration: none; color: white;" href="validation-form/exit.php">Выйти</a></button>
                    </div>
                    <button class='toggle-theme btn_theme' style='margin-top: 1em;'>Тема</button>
                    <div class='nobody_hears_u_div'>
                        <p class='grey59_down'><a class='sh1ft' href="https://vk.com/sh1ft_yt"> &#169; by Sh1ft 2022</a></p>
                    </div>
                </div>


                <div class="profile_text">
                    <form action="" method="post" class=" regauth2" style="margin-left:14px;">
                        <input type="text" class="form-control regauth2 change_nickname" name="submit_nick" placeholder="<?=$name?>" value="<?=$name?>" style="border-radius: 16px; padding-left: 9px">
                    </form>
                    <form action="" method="post" class=" regauth2" style="margin-left:14px; margin-top: 14px">
                        <input type="text" class="form-control regauth3 change_nickname" name="submit_status" placeholder="<?=$status?>" value="<?=$status?>" style="border-radius: 16px; padding-left: 10px">
                    </form>


                    <div class="achiv_and_money">
                        <div style="margin-left: 0px; margin-top: 14px;" class="account_achiv">
                            <img href="images/domoi.jpg" style="">
                        </div>
                        <div style=" margin-top: 14px; margin-right: 0em;" class="regauth2 form-control account_money change_nickname">
                            <p class='profile_text_nick' style="margin-left: 1em; font-size: 2.2em; margin-top: 0em;"><a href="ets/ets.php"></a></p>
                        </div>
                    </div>



                    <div style="background-color: #c7c7c7; border: 7px solid rgba(0,0,0,.4); border-radius: 20px; margin-top: 9.5em; margin-left: 20px; margin-right: 0; margin-bottom: 0; font-size:1em " class="posts_br">
                         
                    </div>
                    <div class="post_upload">
                        <form  action="posts_validation_form/posts_check.php" method="post" class="" enctype="multipart/form-data">
                            <textarea type="text" class="form-control regauth_post" name="post_text" id="post_text" placeholder="Расскажите что-нибудь" style="margin-bottom: 10px;padding-left: 8px"></textarea>
                            <p style="margin-left: 20px; font-size: 0.9em; margin-top: 0"><a style="color:rgba(255,255,255,0.45); text-decoration: none;" href="terms_and_conditions.html">Пользовательское соглашение</a></p>
                            <input type="file" name="fileToUpload" id="post_image" class="regauth_in file_post">
                            <input class="input_submit_post" type="submit" value="ОПУБЛИКОВАТЬ ЗАПИСЬ" name="submit" class="input_submit_post_upload">
                        </form>
                    </div>
                    <div style="margin: 0 0; padding-left: 14px">
                        <?

                        require "validation-form/connect.php";





                        $result = mysqli_query($mysql, 'SELECT * FROM `posts` ORDER BY `post_id` DESC');

                        while ($row = mysqli_fetch_assoc($result))// получаем все строки в цикле по одной
                        {
                            if ($_COOKIE['user'] == $row['user_login']) {
                                echo '<div style="margin-left: 0px;margin-right: 0px;" class="posts_div">';
                                echo '<div style="margin: 0 0; display: flex;">';
                                echo '<div src="avаtars/'.$row['user_avatar'].'" href="id'.$id.'"  style="background-image: url(avatars/'.$row['user_avatar']. ');
                                background-size: 120px; background-position: center; background-repeat: no-repeat;
                                width: 100px; height:100px; max-height: 1000px;border-radius: 23px;border: 8px solid #2E2E2E;margin-bottom: 10px;display: flex;)"
                                 class="avatarka posts_avatarka"></div>
                                 <p class="posts_nick"><a style="margin-left: 0;width: 300px;margin-right: 0px;display: flex;" class="user_nick_adress_id" href="id' .$id.'">'.$row['user_nick'].'</a></p>';
                                echo '<form action="posts_validation_form/posts_delete.php" method="post" class="" enctype="multipart/form-data" style="display: flex;align-items: center; width: 1em;">';
                                $post_id_to_delete = $row["post_id"];
                                echo '<input type="text" class="form-control regauth_post" name="post_id" id="post_id" value="'.$post_id_to_delete.'" style="display: none;margin-bottom: 10px;padding-left: 8px">';
                                echo '<input class="input_submit_post" type="submit" value="🗑" name="submit_delete" class="input_submit_post_upload">';
                                echo '</form>';
                                echo '</div>';
                                if ($row['post_image'] != ''){
                                    echo '<div style="margin: 0 0">';
                                    echo '<p class="posts_text_two">'.$row['post_text'].'</p>';
                                    echo '</div>';
                                    echo '<img src="posts_image/'.$row['post_image'].'" class="avatarka posts_image">';
                                }else{
                                    echo '<div style="margin: 0 0">';
                                    echo '<p class="posts_text">'.$row['post_text'].'</p>';
                                    echo '</div>';
                                }
                                echo '</div>';
                                /*
                                echo '<p>Айди поста - '.$row['post_id'].'</p>';// выводим данные
                                echo '<p>Логин опубликовавшего - '.$row['user_id'].'</p>';
                                echo '<p>Ник опубликовавшего - '.$row['user_nick'].'</p>';
                                echo '<p>Ава опубликовавшего текстом- '.$row['user_avatar'].'</p>';
                                echo '<p>Ник опубликовавшего - '.$row['post_hash'].'</p>';
                                echo '<p>Текст публикации - '.$row['post_text'].'</p>';
                                echo '<p>Картинка публикации текстом - '.$row['post_image'].'</p>';
                                echo '<p>Хэш публикации - '.$row['post_hash'].'</p>';
                                echo '<img src="posts_image/'.$row['post_image'].'"  style="width: 416px;max-height: 1000px;border-radius: 23px;border: 8px solid rgba(0,0,0,.4);margin-bottom: 10px;" class="avatarka">';
                                echo '<img src="avatars/'.$row['user_avatar'].'"  style="width: 100px;max-height: 1000px;border-radius: 23px;border: 8px solid rgba(0,0,0,.4);margin-bottom: 10px;" class="avatarka">';
                                echo '<br>';
                                 */

                            }
                        }
                        echo '<p style="color: #646464">Создайте пост! Напишите что-нибудь в поле для ввода текста! Ах да, и не забудьте прикрепить картонку =--)</p>';
                        /*
                         echo '<p>ТЕКСТ'.$row['ЯЧЕЙКА СТРОКИ В БД'].'</p>'; --- ОБЩИЙ ПРИМЕР

                        echo --- ВЫВОДИМ

                        '<p> --- ОТКРЫВАЕМ ТЕГ

                        ТЕКСТ --- ЛЮБОЙ ВАЩЕ ТЕКСТ

                        '.$row['ЯЧЕЙКА СТРОКИ В БД'].' --- УКАЗЫВАЕМ КАКАЯ ЯЧЕЙКА ИЗ БД НАМ НУЖНА

                        </p>' --- ЗАКРЫВАЕМ ТЕГ

                        ; --- КОНЕЦ ВЫВОДА
                         */
                        ?>
                    </div>
                </div>
            </div>


        <?php else:?>
            <div class="container">
                <div class="profile_avatarka">
                    <div class="profile_avatarka_ava">
                        <img src="avatars/<?=$avatar?>"  style="width: 416px;max-height: 650px;border-radius: 23px;border: 8px solid rgba(0,0,0,.4);margin-bottom: 10px;" class="avatarka">
                    </div>
                    <div class="profile_avatarka_upload">
                        <form method="post" action="" enctype="multipart/form-data" class="regauth_in input_submit_ava_upload" style="padding-top:0.5em; padding-left: 15px; padding-right: 15px">
                            <input type="file" name="fileToUpload" id="fileToUpload" class="regauth_in" style="color:black;width:80%; margin-top:0; margin-left: 0">
                            <input class="input_submit" type="submit" value="✔" name="submit" class="input_submit_ava_upload_button" style="border-radius: 12px;width:13%; margin-left: 11px; margin-top:0; margin-bottom; font-size: 1em; padding-left:13px">
                        </form>
                    </div>
                    <div class="profile_avatarka_exit">
                        <button class="btn_theme_exit"><a style="text-decoration: none; color: white;" href="validation-form/exit.php">Выйти</a></button>
                    </div>
                    <button class='toggle-theme btn_theme' style='margin-top: 1em;'>Тема</button>
                    <div class='nobody_hears_u_div'>
                        <p class='grey59_down'><a class='sh1ft' href="https://vk.com/sh1ft_yt"> &#169; by Sh1ft 2022</a></p>
                    </div>
                </div>


                <div class="profile_text">
                    <form action="" method="post" class=" regauth2" style="margin-left:14px;">
                        <input type="text" class="form-control regauth2 change_nickname" name="submit_nick" placeholder="<?=$name?>" value="<?=$name?>" style="border-radius: 16px; padding-left: 9px">
                    </form>
                    <form action="" method="post" class=" regauth2" style="margin-left:14px; margin-top: 14px">
                        <input type="text" class="form-control regauth3 change_nickname" name="submit_status" placeholder="<?=$status?>" value="<?=$status?>" style="border-radius: 16px; padding-left: 10px">
                    </form>


                    <div class="achiv_and_money">
                        <div style="margin-left: 0px; margin-top: 14px;" class="account_achiv">
                            <img href="images/domoi.jpg" style="">
                        </div>
                        <div style=" margin-top: 14px; margin-right: 0em;" class="regauth2 form-control account_money change_nickname">
                            <p class='profile_text_nick' style="margin-left: 1em; font-size: 2.2em; margin-top: 0em;"><a href="ets/ets.php"></a></p>
                        </div>
                    </div>



                    <div style="background-color: #c7c7c7; border: 7px solid rgba(0,0,0,.4); border-radius: 20px; margin-top: 9.5em; margin-left: 20px; margin-right: 0; margin-bottom: 0; font-size:1em " class="posts_br">
                         
                    </div>
                    <div class="post_upload">
                        <form  action="posts_validation_form/posts_check.php" method="post" class="" enctype="multipart/form-data">
                            <textarea type="text" class="form-control regauth_post" name="post_text" id="post_text" placeholder="Расскажите что-нибудь" style="margin-bottom: 10px;padding-left: 8px"></textarea>
                            <p style="margin-left: 20px; font-size: 0.9em; margin-top: 0"><a style="color:rgba(255,255,255,0.45); text-decoration: none;" href="terms_and_conditions.html">Пользовательское соглашение</a></p>
                            <input type="file" name="fileToUpload" id="post_image" class="regauth_in file_post">
                            <input class="input_submit_post" type="submit" value="ОПУБЛИКОВАТЬ ЗАПИСЬ" name="submit" class="input_submit_post_upload">
                        </form>
                    </div>
                    <div style="margin: 0 0; padding-left: 14px">
                        <?

                        require "validation-form/connect.php";





                        $result = mysqli_query($mysql, 'SELECT * FROM `posts` ORDER BY `post_id` DESC');

                        while ($row = mysqli_fetch_assoc($result))// получаем все строки в цикле по одной
                        {
                            if ($_COOKIE['user'] == $row['user_login']) {
                                echo '<div style="margin-left: 0px;margin-right: 0px;" class="posts_div">';
                                echo '<div style="margin: 0 0; display: flex;">';
                                echo '<div src="avаtars/'.$row['user_avatar'].'" href="id'.$id.'"  style="background-image: url(avatars/'.$row['user_avatar']. ');
                                background-size: 120px; background-position: center; background-repeat: no-repeat;
                                width: 100px; height:100px; max-height: 1000px;border-radius: 23px;border: 8px solid #2E2E2E;margin-bottom: 10px;display: flex;)"
                                 class="avatarka posts_avatarka"></div>
                                 <p class="posts_nick"><a style="margin-left: 0;width: 300px;margin-right: 0px;display: flex;" class="user_nick_adress_id" href="id' .$id.'">'.$row['user_nick'].'</a></p>';
                                echo '<form action="posts_validation_form/posts_delete.php" method="post" class="" enctype="multipart/form-data" style="display: flex;align-items: center; width: 1em;">';
                                $post_id_to_delete = $row["post_id"];
                                echo '<input type="text" class="form-control regauth_post" name="post_id" id="post_id" value="'.$post_id_to_delete.'" style="display: none;margin-bottom: 10px;padding-left: 8px">';
                                echo '<input class="input_submit_post" type="submit" value="🗑" name="submit_delete" class="input_submit_post_upload">';
                                echo '</form>';
                                echo '</div>';
                                if ($row['post_image'] != ''){
                                    echo '<div style="margin: 0 0">';
                                    echo '<p class="posts_text_two">'.$row['post_text'].'</p>';
                                    echo '</div>';
                                    echo '<img src="posts_image/'.$row['post_image'].'" class="avatarka posts_image">';
                                }else{
                                    echo '<div style="margin: 0 0">';
                                    echo '<p class="posts_text">'.$row['post_text'].'</p>';
                                    echo '</div>';
                                }
                                echo '</div>';
                                /*
                                echo '<p>Айди поста - '.$row['post_id'].'</p>';// выводим данные
                                echo '<p>Логин опубликовавшего - '.$row['user_id'].'</p>';
                                echo '<p>Ник опубликовавшего - '.$row['user_nick'].'</p>';
                                echo '<p>Ава опубликовавшего текстом- '.$row['user_avatar'].'</p>';
                                echo '<p>Ник опубликовавшего - '.$row['post_hash'].'</p>';
                                echo '<p>Текст публикации - '.$row['post_text'].'</p>';
                                echo '<p>Картинка публикации текстом - '.$row['post_image'].'</p>';
                                echo '<p>Хэш публикации - '.$row['post_hash'].'</p>';
                                echo '<img src="posts_image/'.$row['post_image'].'"  style="width: 416px;max-height: 1000px;border-radius: 23px;border: 8px solid rgba(0,0,0,.4);margin-bottom: 10px;" class="avatarka">';
                                echo '<img src="avatars/'.$row['user_avatar'].'"  style="width: 100px;max-height: 1000px;border-radius: 23px;border: 8px solid rgba(0,0,0,.4);margin-bottom: 10px;" class="avatarka">';
                                echo '<br>';
                                 */

                            }
                        }
                        echo '<p style="color: #646464">Создайте пост! Напишите что-нибудь в поле для ввода текста! Ах да, и не забудьте прикрепить картонку =--)</p>';
                        /*
                         echo '<p>ТЕКСТ'.$row['ЯЧЕЙКА СТРОКИ В БД'].'</p>'; --- ОБЩИЙ ПРИМЕР

                        echo --- ВЫВОДИМ

                        '<p> --- ОТКРЫВАЕМ ТЕГ

                        ТЕКСТ --- ЛЮБОЙ ВАЩЕ ТЕКСТ

                        '.$row['ЯЧЕЙКА СТРОКИ В БД'].' --- УКАЗЫВАЕМ КАКАЯ ЯЧЕЙКА ИЗ БД НАМ НУЖНА

                        </p>' --- ЗАКРЫВАЕМ ТЕГ

                        ; --- КОНЕЦ ВЫВОДА
                         */
                        ?>
                    </div>
                </div>
            </div>


        <?php endif;?>
    </main>
    <footer class="footer">
        <div class="footer_basement footer_account">
            <a class='footer_youtube basement youtube_img' href='https://vk.cc/cd3Ffb'><img src='images/social_credits/youtube_white_40px.png'></img></a>
            <a class="footer_discord basement discord_img" href='https://vk.cc/cd3Fvm'><img src='images/social_credits/discord_white_40px.png'></img></a>
            <a class="footer_vk basement vk_img" href='https://vk.com/anti_toxic_toxic_club'><img src='images/social_credits/vk_white_40px.png'></img></a>
        </div>
    </footer>
</div>
<script type="text/javascript" src="main1.js"></script>
<script type="text/javascript" src="theme.js"></script>
<script>
    var body = document.body,
        overlay = document.querySelector('.overlay'),
        overlayBtts = document.querySelectorAll('button[class$="overlay"]');

    [].forEach.call(overlayBtts, function(btt) {

        btt.addEventListener('click', function() {


            var overlayOpen = this.className === 'open-overlay';


            overlay.setAttribute('aria-hidden', !overlayOpen);
            body.classList.toggle('noscroll', overlayOpen);


            overlay.scrollTop = 0;

        }, false);

    });

</script>
</body>
</html>