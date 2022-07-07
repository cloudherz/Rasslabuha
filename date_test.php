<?php

date_default_timezone_set("Europe/Moscow");

// Вывод даты на русском
$monthes = array(
    1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
    5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
    9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
);


// Вывод дня недели
echo('<br />');
$days = array(
    'Воскресенье', 'Понедельник', 'Вторник', 'Среда',
    'Четверг', 'Пятница', 'Суббота'
);
echo(date('d ') . $monthes[(date('n'))] . date(' Y, H:i'));
echo '<br>';
echo($days[(date('w'))]),' (МСК)';
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>Тайтл</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
<header>

</header>
<main>

</main>
<footer>

</footer>
</body>
</html>
