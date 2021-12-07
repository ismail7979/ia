<?php

$pwd = "123456";
$hashed_pwd = hash('sha256',$pwd);
echo($hashed_pwd);