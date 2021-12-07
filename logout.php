<?php

session_start();

unset($_SESSION["user"]);
echo('<meta http-equiv="refresh" content="2; URL=index_.html">');
die("Вы вышли из системы!");