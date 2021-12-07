<h1>Hello from PHP!</h1>

<?php

$x = 2;
$y = 2;
$z = $x * $y;
echo "<h2>Результат вычислений: $z</h2>";

date_default_timezone_set("Europe/Moscow");
$now = date("H:i:s");
echo("<h1>Страница открыта в $now</h1>");

?>