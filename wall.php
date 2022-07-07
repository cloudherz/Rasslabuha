<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Аккаунт Расслабуха</title>
    <link rel="stylesheet" href="styles3.css" type="text/css">
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
            <a class="trading bashnya" href='trading.html'>ТРЕЙДИНГ</a>
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

                $mysql_two->query("UPDATE `posts` SET `user_avatar` = '$avatarka' WHERE `user_id` = '$login'");
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

                $mysql_two->query("UPDATE `posts` SET `user_avatar` = '$avatarka' WHERE `user_id` = '$login'");
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

                $mysql_two->query("UPDATE `posts` SET `user_nick` = '$namenew' WHERE `user_id` = '$login'");
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

                    <button class='toggle-theme btn_theme' style='margin-top: 1em;'>Тема</button>
                    <div class='nobody_hears_u_div'>
                        <p class='grey59_down'><a class='sh1ft' href="https://vk.com/sh1ft_yt"> &#169; by Sh1ft 2022</a></p>
                    </div>





                    <div style="margin: 0 0; padding-left: 0px">
                        <?

                        require "validation-form/connect.php";
                        $limit = 3;
                        $page = intval(@$_GET['page']);
                        $page = (empty($page)) ? 1 : $page;
                        $start = ($page != 1) ? $page * $limit - $limit : 0;
                        $sth = $dbh->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM `posts` LIMIT {$start}, {$limit}");
                        $sth->execute();
                        $items = $sth->fetchAll(PDO::FETCH_ASSOC);

                        $sth = $dbh->prepare("SELECT FOUND_ROWS()");
                        $sth->execute();
                        $total = $sth->fetch(PDO::FETCH_COLUMN);
                        $amt = ceil($total / $limit);

                        ?>
                        <div id="showmore-list">
                            <div class="prod-list">
                                <?php foreach ($items as $row): ?>
                                    <div class="prod-item">
                                        <div class="prod-item-img">
                                            <img src="/images/<?php echo $row['post_image']; ?>" alt="">
                                        </div>
                                        <div class="prod-item-name">
                                            <?php echo $row['post_id']; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="showmore-bottom">
                            <a data-page="1" data-max="<?php echo $amt; ?>" id="showmore-button" href="#">Показать еще</a>
                        </div>

                        <script>
                            $(function(){
                                $('#showmore-button').click(function (){
                                    var $target = $(this);
                                    var page = $target.attr('data-page');
                                    page++;

                                    $.ajax({
                                        url: '/ajax.php?page=' + page,
                                        dataType: 'html',
                                        success: function(data){
                                            $('#showmore-list .prod-list').append(data);
                                        }
                                    });

                                    $target.attr('data-page', page);
                                    if (page ==  $target.attr('data-max')) {
                                        $target.hide();
                                    }

                                    return false;
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>


        <?php elseif($admin != ''):?>
            <div class="container">

                <button class='toggle-theme btn_theme' style='margin-top: 1em;'>Тема</button>
                <div class='nobody_hears_u_div'>
                    <p class='grey59_down'><a class='sh1ft' href="https://vk.com/sh1ft_yt"> &#169; by Sh1ft 2022</a></p>
                </div>





                <div style="margin: 0 0; padding-left: 0px">
                    <?

                    require "validation-form/connect.php";





                    $result = mysqli_query($mysql, 'SELECT * FROM `posts` ORDER BY `post_id` DESC');

                    while ($row = mysqli_fetch_assoc($result))// получаем все строки в цикле по одной
                    {

                        echo '<div style="margin-left: 0px;margin-right: 0px;" class="posts_div">';
                        echo '<div style="margin: 0 0; display: flex;">';
                        echo '<div src="avаtars/'.$row['user_avatar'].'" href="id'.$id.'"  style="background-image: url(avatars/'.$row['user_avatar']. ');
                                background-size: 120px; background-position: center; background-repeat: no-repeat;
                                width: 100px; height:100px; max-height: 1000px;border-radius: 23px;border: 8px solid #2E2E2E;margin-bottom: 10px;display: flex;)"
                                 class="avatarka posts_avatarka"></div>
                                 <p class="posts_nick"><a style="margin-left: 0;width: 300px;margin-right: 0px;display: flex;" class="user_nick_adress_id" href="id'.$row['user_id'].'">'.$row['user_nick'].'</a></p>';
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

                <button class='toggle-theme btn_theme' style='margin-top: 1em;'>Тема</button>
                <div class='nobody_hears_u_div'>
                    <p class='grey59_down'><a class='sh1ft' href="https://vk.com/sh1ft_yt"> &#169; by Sh1ft 2022</a></p>
                </div>





                <div style="margin: 0 0; padding-left: 0px">
                    <?

                    require "validation-form/connect.php";





                    $result = mysqli_query($mysql, 'SELECT * FROM `posts` ORDER BY `post_id` DESC');

                    while ($row = mysqli_fetch_assoc($result))// получаем все строки в цикле по одной
                    {

                        echo '<div style="margin-left: 0px;margin-right: 0px;" class="posts_div">';
                        echo '<div style="margin: 0 0; display: flex;">';
                        echo '<div src="avаtars/'.$row['user_avatar'].'" href="id'.$id.'"  style="background-image: url(avatars/'.$row['user_avatar']. ');
                                background-size: 120px; background-position: center; background-repeat: no-repeat;
                                width: 100px; height:100px; max-height: 1000px;border-radius: 23px;border: 8px solid #2E2E2E;margin-bottom: 10px;display: flex;)"
                                 class="avatarka posts_avatarka"></div>
                                 <p class="posts_nick"><a style="margin-left: 0;width: 300px;margin-right: 0px;display: flex;" class="user_nick_adress_id" href="id'.$row['user_id'].'">'.$row['user_nick'].'</a></p>';
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
<script type="text/javascript" src="main.js"></script>
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