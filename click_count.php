<?php
    session_start();
            $i = 0;
                    //Вспомним переменную счетчика
            //(если она существует):
            // if (isset($_SESSION["clicks"]))
            //     $i = $_SESSION["clicks"] ;

            // $i += 1;
            // //Запомним текущее значение счетчика щелчков 
            // // в сессионной переменной cliks
            // $_SESSION["clicks"] = $i;
            if (isset($_COOKIE['clicks']))
            $i = $_COOKIE['clicks'];
            $i += 1;
            setcookie("clicks",$i, time() + 20);

            echo("Всего щелчков: $i");
        ?>
<html>
 
    <head>
        <!-- Это комментарий HTML -->
        <meta charset="utf-8" />
        <link  href="styles/main.css" rel="stylesheet" type="text/css"/>
    
    </head>
    <body>
       <h1>Считаем щелчки</h1>
        <form>
            <button id="btn1">Щелкни здесь</button>
        </form>
        <div>
        <a href="index_.html">Оглавление сайта</a> 
         </div>
       
    </body>
</html>