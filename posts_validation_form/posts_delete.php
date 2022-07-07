<?php
if(isset($_POST['submit_delete'])) {
    $post_id= filter_var(trim($_POST['post_id']),
        FILTER_SANITIZE_STRING);
}


require "../validation-form/connect.php";

$mysql->query("DELETE FROM `posts` WHERE `post_id` = '$post_id'");


$mysql->close();
echo "<script>location.replace('../account.php');</script>";






?>