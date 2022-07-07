
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Ошибка! Расслабуха</title>
    <link rel="stylesheet" href="../styles3.css">
    <link rel="shortcut icon" href="../images/domoi.jpg" type="image/jpg">
</head>
<body>
<section class="page page_account">
    <header class="header">
        <div class="subsections_account bashnya">
            <a class='domoi bashnya' href='../%C2%A0.php'>ГЛАВНАЯ</a>
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

                    require "../validation-form/connect.php";

                    function getLogin($login) {
                        require "../validation-form/connect.php";
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
        } else {
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            } elseif ($_FILES["fileToUpload"]["size"] > 52428800){
                echo "Эта аватарка весит слишком много! Лимит - 50 Мегабайт!";
            }else {
                if(isset($_POST['submit']) and $_FILES){
                    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "avatars/".$_FILES['fileToUpload']['name']);

                    $avatarka = $_FILES['fileToUpload']['name'];

                    echo "<script>location.replace('errors_accepts/accept_ava_updated.php');</script>";

                    require "../validation-form/connect.php";

                    function getLogin($login) {
                        require "../validation-form/connect.php";
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
        }


        function getAvatar($login) {
            require "../validation-form/connect.php";
            $result_set = $mysql->query("SELECT `avatar` FROM `users` WHERE `login`='$login'");
            $row = $result_set->fetch_assoc();
            return $row["avatar"];
        }

        /*ВЫВЕДЕНИЕ ЗНАЧЕНИЯ ДЕНЯК ИЗ ДБ*/

        function getMoney($login) {
            require "../validation-form/connect.php";
            $result_set_money = $mysql->query("SELECT `money` FROM `users` WHERE `login`='$login'");
            $row_money = $result_set_money->fetch_assoc();
            return $row_money["money"];
        }

        $money = getMoney($_COOKIE['user']);

        /*ВЫВЕДЕНИЕ ЗНАЧЕНИЯ АЙДИ ИЗ ДБ*/

        function getId($login) {
            require "../validation-form/connect.php";
            $result_set_id = $mysql->query("SELECT `id` FROM `users` WHERE `login`='$login'");
            $row_id = $result_set_id->fetch_assoc();
            return $row_id["id"];
        }

        $id = getId($_COOKIE['user']);

        /*ВЫВЕДЕНИЕ ЗНАЧЕНИЯ НИКА ИЗ ДБ*/

        function getName($login) {
            require "../validation-form/connect.php";
            $result_set_name = $mysql->query("SELECT `name` FROM `users` WHERE `login`='$login'");
            $row_name = $result_set_name->fetch_assoc();
            return $row_name["name"];
        }











        $name = getName($_COOKIE['user']);
        $namenew = $_POST['submit_nick'];


        if(isset($_POST['submit_nick'])){
            function getLogin($login) {
                require "../validation-form/connect.php";

                $result_set = $mysql->query("SELECT `login` FROM `users` WHERE `login`='$login'");
                $row = $result_set->fetch_assoc();
                return $row["login"];
            }
            $namenew = $_POST['submit_nick'];
            $login = getLogin($_COOKIE['user']);

            require "../validation-form/connect.php";

            if (mb_strlen($name) < 1 || mb_strlen($name) > 50) {
                echo "<script>location.replace('../errors_accepts/error_nick_len.php');</script>";
                exit();
            }else{
                $mysql->query("UPDATE `users` SET `name` = '$namenew' WHERE `login` = '$login'");

                $mysql->close();
                echo "<script>location.replace('errors_accepts/accept_nick_updated.php');</script>";


                exit();
            }
        }










        function getStatus_Banned($login) {
            require "../validation-form/connect.php";
            $result_set = $mysql->query("SELECT `banned` FROM `users` WHERE `login`='$login'");
            $row = $result_set->fetch_assoc();
            return $row["banned"];
        }

        $banned = getStatus_Banned($_COOKIE['user']);

        function getStatus_Admin($login) {
            require "../validation-form/connect.php";
            $result_set = $mysql->query("SELECT `admin` FROM `users` WHERE `login`='$login'");
            $row = $result_set->fetch_assoc();
            return $row["admin"];
        }

        $admin = getStatus_Admin($_COOKIE['user']);

        function getStatus_Developer($login) {
            require "../validation-form/connect.php";
            $result_set = $mysql->query("SELECT `developer` FROM `users` WHERE `login`='$login'");
            $row = $result_set->fetch_assoc();
            return $row["developer"];
        }

        $developer = getStatus_Developer($_COOKIE['user']);











        $avatar = getAvatar($_COOKIE['user']);
        if ($avatar == "") $avatar = "default.png";



        if($_COOKIE['user'] == ''):
            ?>
            <h1 class="errors">Вы не вошли в аккаунт!</h1>

            <button class='toggle-theme btn_theme' style='margin-top: 18em;'>Тема</button>
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
        <?php else:?>
            <div class="ets_card_div">
                <!--<p class='profile_text_nick' style="margin-left: 1em; font-size: 2.2em; margin-top: 0em;">Кристаллов: <?=$money?></p>-->
            </div>
            <div class="profile_avatarka_exit">
                <button class="btn_theme_exit" style="margin-bottom: 0"><a style="text-decoration: none; color: white;" href="ets_card_bank_choose.php">Создать карту</a></button>
            </div>

            <button class='toggle-theme btn_theme' style='margin-top: 8em;'>Тема</button>
            <div class='nobody_hears_u_div'>
                <p class='grey59_down'><a class='sh1ft' href="https://vk.com/sh1ft_yt"> &#169; by Sh1ft 2022</a></p>
            </div>
        <?php endif;?>
    </main>

    <footer class="footer">
        <div class="footer_basement footer_account">
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