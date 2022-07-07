<?php
if(isset($_POST['submit']) and $_FILES) {
    $user_login = filter_var(trim($_POST['user_login']),FILTER_SANITIZE_STRING);
    $user_nick = filter_var(trim($_POST['user_nice']),FILTER_SANITIZE_STRING);
    $user_avatar = filter_var(trim($_POST['user_avatar']),FILTER_SANITIZE_STRING);

    $post_text = filter_var(trim($_POST['post_text']), FILTER_SANITIZE_STRING);
    $post_image = filter_var(trim($_POST['post_image']), FILTER_SANITIZE_STRING);
    $post_id= filter_var(trim($_POST['post_id']),
        FILTER_SANITIZE_STRING);
}





$target_dir = "../posts_image/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists("../posts_image/".$_FILES['fileToUpload']['name'])) {
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    } elseif ($_FILES["fileToUpload"]["size"] > 52428800){
        echo "Эта аватарка весит слишком много! Лимит - 50 Мегабайт!";
    }else {
        if(isset($_POST['submit']) and $_FILES){

            $original_name = $_FILES["fileToUpload"]["name"];
            $extension = pathinfo($original_name, PATHINFO_EXTENSION);
            $new_name = uniqid().'.'.$extension;

            $avatarka = $new_name;

        }
    };
} else {
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    } elseif ($_FILES["fileToUpload"]["size"] > 52428800){
        echo "Эта аватарка весит слишком много! Лимит - 50 Мегабайт!";
    }else {
        if(isset($_POST['submit']) and $_FILES){
            $avatarka = $_FILES['fileToUpload']['name'];
        }
    };
}




/*ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА */
/*ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА */
/*ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА */
/*ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА */
/*ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА */
/*ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА ПРОВЕРКА НА ДЛИНУ ПОСТА */


if ((mb_strlen($avatarka) < 1 || mb_strlen($avatarka) > 4096) and (mb_strlen($post_text) < 1 || mb_strlen($post_text) > 4096)) {
    echo "<script>location.replace('../errors_accepts/error_post_text_len.php');</script>";
}else {







function getLogin($login) {
    require "../validation-form/connect.php";
    $result_set = $mysql->query("SELECT `login` FROM `users` WHERE `login`='$login'");
    $row = $result_set->fetch_assoc();
    return $row["login"];
}
$login = getLogin($_COOKIE['user']);
$user_login = $login;

function getName($login) {
    require "../validation-form/connect.php";
    $result_set_name = $mysql->query("SELECT `name` FROM `users` WHERE `login`='$login'");
    $row_name = $result_set_name->fetch_assoc();
    return $row_name["name"];
}
$nick = getName($_COOKIE['user']);
$user_nick = $nick;

function getAvatar($login) {
    require "../validation-form/connect.php";
    $result_set = $mysql->query("SELECT `avatar` FROM `users` WHERE `login`='$login'");
    $row = $result_set->fetch_assoc();
    return $row["avatar"];
}
$avatar = getAvatar($_COOKIE['user']);
$user_avatar = $avatar;

function getId($login) {
    require "../validation-form/connect.php";
    $result_set = $mysql->query("SELECT `id` FROM `users` WHERE `login`='$login'");
    $row = $result_set->fetch_assoc();
    return $row["id"];
}
$id = getId($_COOKIE['user']);
$user_id = $id;










    $post_hash = "fuckthisfuckincode";

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

function generate_string($post_hash, $strength = 16) {
    $input_length = strlen($post_hash);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $post_hash[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }

    return $random_string;
}

$post_hash = generate_string($post_hash, 25);


$post_hash = md5($post_hash."damn0eto0zhe0xeshirovanie00");






require "../validation-form/connect.php";

$mysql->query("INSERT INTO `posts` (`user_login`, `post_text`, `post_image`, `post_hash`, `user_nick`, `user_avatar`, `user_id`) 
        VALUES('$user_login', '$post_text', '$post_image', '$post_hash', '$user_nick', '$user_avatar', '$user_id')");

$mysql->close();
echo "<script>location.replace('../account.php');</script>";









$target_dir = "../posts_image/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists("../posts_image/".$_FILES['fileToUpload']['name'])) {
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    } elseif ($_FILES["fileToUpload"]["size"] > 52428800){
        echo "Эта аватарка весит слишком много! Лимит - 50 Мегабайт!";
    }else {
        if(isset($_POST['submit']) and $_FILES){

            $original_name = $_FILES["fileToUpload"]["name"];
            $extension = pathinfo($original_name, PATHINFO_EXTENSION);
            $new_name = uniqid().'.'.$extension;

            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "../posts_image/".$new_name);

            $avatarka = $new_name;

            echo "<script>location.replace('../errors_accepts/accept_ava_updated.php');</script>";

            require "../validation-form/connect.php";

        }

        $mysql->query("UPDATE `posts` SET `post_image` = '$avatarka' WHERE `post_hash` = '$post_hash'");

        $mysql->close();

        exit();

    };
} else {
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    } elseif ($_FILES["fileToUpload"]["size"] > 52428800){
        echo "Эта аватарка весит слишком много! Лимит - 50 Мегабайт!";
    }else {
        if(isset($_POST['submit']) and $_FILES){
            move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "../posts_image/".$_FILES['fileToUpload']['name']);

            $avatarka = $_FILES['fileToUpload']['name'];

            echo "<script>location.replace('../errors_accepts/accept_ava_updated.php');</script>";

            require "../validation-form/connect.php";
        }

        $mysql->query("UPDATE `posts` SET `post_image` = '$avatarka' WHERE `post_hash` = '$post_hash'");


        $mysql->close();

        exit();

    };
}

}

?>