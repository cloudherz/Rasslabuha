<?php
    function getLogin($email) {
        require "connect.php";
        $result_set = $mysql->query("SELECT `login` FROM `users` WHERE `email`='$email'");
        $row = $result_set->fetch_assoc();
        return $row["login"];
    }

    if (isset($_POST["submit"])) {
        require "connect.php";
        $email = $_POST['email'];
        $login = getLogin($email);
        $new_password = substr(md5(time()),0, 9);
        $mysql->query("UPDATE `users` SET `pass` = '$new_password' WHERE `login` = '$login'");

        $to = $email;
        $from = "rasslabuha@rasslabuha.xyz";
        $subject = "Смена пароля!";
        $headers = "From: $from\r\nContent-type: text/plain; charset=utf-8;";
        $message = "Ваш новый пароль: $new_password";
        mail($to, $subject, $message, $headers);
        $success = true;
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Расслабуха</title>
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
        <div class="container">
            <div class="row">
                <div class="col" style="margin-bottom: 1em">
                    <?php
                        if($success) {
                            echo "<h2 class='errors' style='font-size: 2em;'>Пароль отправлен на вашу почту!</h2>";
                            echo "<h2 class='errors' style='font-size: 1.3em; margin-top: 0.1em; margin-bottom: 3em'>Если пароль не пришёл, то либо вы ошиблись в почте, либо вы не регистрировали почту. В таком случае пишите<a href='https://vk.com/sh1ft_yt' class='aerrors' title='Написать Шифту'> мне</a></h2>";
                        }
                    ?>
                    <h2 style="margin-bottom: 0.7em; padding-top: 0.2em;">Введите вашу почту для восстановления пароля</h2>
                    <form action="reset.php" method="post" class="regauth" id="form1">
                        <input type="text" class="form-control regauth" name="email" placeholder="Ваша почта">
                        <button class="btn_regauth_email" name="submit" type="submit">Получить пароль на почту</button>
                    </form>
                </div>
            </div>
        </div>
        <button class='toggle-theme btn_theme' style='margin-top: 10em;'>Тема</button>
        <div class='nobody_hears_u_div'>
            <p class='grey59_down'><a class='sh1ft' href="https://vk.com/sh1ft_yt"> &#169; by Sh1ft 2022</a></p>
        </div>
    </main>
    <footer class="footer">
        <div class="footer_basement footer_account">
            <a class='footer_youtube basement youtube_img' href='https://vk.cc/cd3Ffb'><img src='../images/social_credits/youtube_white_40px.png'></a>
            <a class="footer_discord basement discord_img" href='https://vk.cc/cd3Fvm'><img src='../images/social_credits/discord_white_40px.png'></a>
            <a class="footer_vk basement vk_img" href='https://vk.com/anti_toxic_toxic_club'><img src='../images/social_credits/vk_white_40px.png'></a>
        </div>
    </footer>
    <script type="text/javascript" src="../theme.js"></script>
    <script type="text/javascript" src="../errors_accepts/rasslabuha_randoms.js"></script>
    </div>
</section>
</body>
</html>