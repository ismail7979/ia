<?php
    session_start();

    //Если жетона безопасности (т.е., в нашем случае, 
    //сессионной переменной c названием user) нет, "не пущаем"
    if (!isset($_SESSION["user"])) {
        echo('<meta http-equiv="refresh" content="2; URL=login.php">');
        die("Требуется логин!");
    }

?>

<html>
    <head>
     
    <link  href="styles/main.css" rel="stylesheet" type="text/css"/>
    <span style="word-spacing: 10px"></span></code>
       
        <!-- Это комментарий HTML -->
        <meta charset="utf-8" />

        <script>
            function getLog() {
                             
                var url = "api/get_log.php";
                var xhr = new XMLHttpRequest();
                xhr.open("GET",url,false);
                xhr.send();
                var text = xhr.responseText;
                var results = JSON.parse(text);
                console.log(results);
                var out = "";
                var counter = 0;
                for(var i=0; i < results.length; i++) {
                    var calc = results[i];
                    console.log(calc);
                    var x = calc[1];
                    var y = calc[2];
                    var result = calc[3];
                    var user = calc[4];
                    var Timestamp = calc[5];
                    out += "X:" + x + " Y:" + y + " Итог:" + result + "    Пользователь: " + user +  " Время совершения покупки " + Timestamp +"<br />";
                    counter += 1;
                }
                document.getElementById("display").innerHTML = out;
                document.getElementById("amount").innerText =
                    "С вас, сударь, $" + counter;
            }
          
        </script>
        
    </head>
    <body onload="getLog();">
    
        <a href="index_.html">Оглавление сайта</a>

        <a href="calc.php">Калькулятор</a>
        <h1>Ваши вычисления</h1>
        <div id="display"></div>
        <h2 id="amount"></h2>
    </body>
</html>