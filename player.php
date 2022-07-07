<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Расслабуха</title>
  <link rel="stylesheet" href="styles3.css">
    <link rel="shortcut icon" href="/images/domoi.jpg" type="image/jpg">
</head>
<body>
    <div class="page page_trading">
        <header class="header">
            <div class="subsections_trading bashnya">
                <a class='domoi bashnya' href='index.php'>ГЛАВНАЯ</a>
                <a class="rules bashnya" href='rules.html'>ПРАВИЛА</a>
                <a class="news bashnya" href='news.html'>НОВОСТИ</a>
                <a class="trading bashnya" href='trading.html'>ТРЕЙДИНГ</a>
                <a class="account bashnya" href='account.php'>АККАУНТ</a>
            </div>  
        </header>
        <main class="main">
        <?php
            $user_id = $_GET['id'];
            require "validation-form/connect.php";
            $query = mysqli_query($mysql, "SELECT * FROM `users` WHERE `id`='{$user_id}'");
            $array = mysqli_fetch_array($query);

            function getAvatar($login) {
                require "validation-form/connect.php";
                $result_set = $mysql->query("SELECT `avatar` FROM `users` WHERE `login`='$login'");
                $row = $result_set->fetch_assoc();
                return $row["avatar"];
            }

            $avatar = getAvatar($_COOKIE['user']);
            if ($avatar == "") $avatar = "default.png";

            if($array['id'] == ''):
        ?>
            <div class="div_trading">
                <h2 style='line-height: 0.8em;'>Страница с таким айди еще не создана! </h2>
                <h2>(Либо удалена Sh1ft'ом)</h2>

            </div>
                <button class='toggle-theme btn_theme' style='margin-top: 21em;'>Тема</button>
                <div class='nobody_hears_u_div'>
                    <p class='grey59_down'><a class='sh1ft' href="https://vk.com/sh1ft_yt"> &#169; by Sh1ft 2022</a></p>
                </div>
            <?php elseif($array['banned'] != ''):?>
                <div class="container">
                    <div class="profile_avatarka">
                        <div class="profile_avatarka_ava">
                            <img src='avatars/banned.png'  style="
                        width: 400px;
                        max-height: 1000px;
                        border-radius: 40px;
                        border: 8px solid rgba(0,0,0,.4);;
                        " class="avatarka">
                        </div>
                        <button class='toggle-theme btn_theme' style='margin-top: 30em;'>Тема</button>
                        <div class='nobody_hears_u_div'>
                            <p class='grey59_down'><a class='sh1ft' href="https://vk.com/sh1ft_yt"> &#169; by Sh1ft 2022</a></p>
                        </div>
                    </div>
                    <div class="profile_text">
                        <p class='profile_text_nick' style="margin-left: 0.6em; font-size: 3.7em; margin-top: 0em;"><?=$array['name']?>
                            <a class='profile_text_nick' style=" margin-left: 0.1em; font-size: 0.8em; margin-top: 0em; background-color: #ff213b; border-radius:20px;" class="status_verif"><?=$array['banned']?></a>
                        </p>
                        <p class='profile_text_nick' style="margin-left: 1em; font-size: 2.2em; margin-top: 0em;">Кристаллов: <?=$array['money']?></p>
                    </div>
                </div>
            <?php elseif($array['verified'] != ''):?>
            <div class="container">
                <div class="profile_avatarka">
                    <div class="profile_avatarka_ava">
                        <img src='avatars/<?=$array['avatar']?>'  style="
                        width: 400px; 
                        max-height: 1000px;
                        border-radius: 40px; 
                        border: 8px solid rgba(0,0,0,.4);;
                        " class="avatarka">
                    </div>
                    <button class='toggle-theme btn_theme' style='margin-top: 30em;'>Тема</button>
                    <div class='nobody_hears_u_div'>
                        <p class='grey59_down'><a class='sh1ft' href="https://vk.com/sh1ft_yt"> &#169; by Sh1ft 2022</a></p>
                    </div>
                </div>
                <div class="profile_text">
                    <p class='profile_text_nick' style="margin-left: 0.6em; font-size: 3.7em; margin-top: 0;"><?=$array['name']?>
                        <img src="images/<?=$array['verified']?>" style="width: 62px; height: 62px; background-color: #99dfe5; border-radius: 17px" title="☑Оффициально!☑">
                        <a class='profile_text_nick' style=" margin-left: 0.1em; font-size: 0.8em;  background-color: #99dfe5; border-radius:20px;" class="status_verif"><?=$array['moderator']?></a>
                        <a class='profile_text_nick' style=" margin-left: 0.1em; font-size: 0.8em;  background-color: #ff70cf; border-radius:20px;" class="status_verif"><?=$array['admin']?></a>
                        <a class='profile_text_nick' style=" margin-left: 0.1em; font-size: 0.8em;  background-color: #ffc021; border-radius:20px;" class="status_verif"><?=$array['developer']?></a>
                    </p>
                    <p class='profile_text_nick' style="margin-left: 1em; font-size: 2.2em; margin-top: 0em;">Кристаллов: <?=$array['money']?></p>
                </div>                    
            </div>




            <?php else:?>
                <div class="container">
                    <div class="profile_avatarka">
                        <div class="profile_avatarka_ava">
                            <img src='avatars/<?=$array['avatar']?>'  style="
                        width: 400px;
                        max-height: 1000px;
                        border-radius: 40px;
                        border: 8px solid rgba(0,0,0,.4);;
                        " class="avatarka">
                        </div>
                        <button class='toggle-theme btn_theme' style='margin-top: 30em;'>Тема</button>
                        <div class='nobody_hears_u_div'>
                            <p class='grey59_down'><a class='sh1ft' href="https://vk.com/sh1ft_yt"> &#169; by Sh1ft 2022</a></p>
                        </div>
                    </div>
                    <div class="profile_text">
                        <p class='profile_text_nick' style="margin-left: 0.6em; font-size: 3.7em; margin-top: 0em;"><?=$array['name']?>
                            <a class='profile_text_nick' style=" margin-left: 0.1em; font-size: 0.75em; margin-top: 0; background-color: #99dfe5; border-radius:15px;" class="status_verif"><?=$array['moderator']?></a>
                            <a class='profile_text_nick' style=" margin-left: 0.1em; font-size: 0.75em; margin-top: 0; background-color: #ff70cf; border-radius:20px;" class="status_verif"><?=$array['admin']?></a>
                            <a class='profile_text_nick' style=" margin-left: 0.1em; font-size: 0.75em; margin-top: 0; background-color: #ffc021; border-radius:20px;" class="status_verif"><?=$array['developer']?></a>
                        </p>
                        <p class='profile_text_nick' style="margin-left: 1em; font-size: 2.2em; margin-top: 0em;">Кристаллов: <?=$array['money']?></p>
                    </div>
                </div>
        <?php endif;?>
        </main>
        <footer class="footer">
            <div class="footer_basement  footer_trading">
                <a class='footer_youtube basement youtube_img' href='https://vk.cc/cd3Ffb'><img src='images/social_credits/youtube_white_40px.png'></img></a>
                <a class="footer_discord basement discord_img" href='https://vk.cc/cd3Fvm'><img src='images/social_credits/discord_white_40px.png'></img></a>
                <a class="footer_vk basement vk_img" href='https://vk.com/anti_toxic_toxic_club'><img src='images/social_credits/vk_white_40px.png'></img></a>
            </div>            
        </footer>
    </div>
    <script type="text/javascript" src="main.js"></script>
    <script type="text/javascript" src="theme.js"></script>
</body>
</html>