<?php
    session_start();

    //Если жетона безопасности (т.е., в нашем случае, 
    //сессионной переменной c названием user) нет, то не пускаем
    if (!isset($_SESSION["user"])) {
        echo('<meta http-equiv="refresh" content="2; URL=../login.php">');
        die("Требуется логин!");
    }
    $user = $_SESSION["user"];
    //echo($user);
    //echo getenv("MYAPP_CONFIG")
    include ('/var/www/html/params.php');
          
            $sql = "SELECT ID, Number1, Number2, Result, UserID,Timestamp
                    FROM log
                    WHERE UserID = '$user'
                    
            ";

            $conn = mysqli_connect($DB_URL,$DB_USER,$DB_PWD,$DB_NAME);
            //Нудная, но необходимая процедура передачи параметров 
            //в sql выражение, что гарантирует защиту от инжекции sql
            $statement = mysqli_prepare($conn, $sql);
            mysqli_stmt_execute($statement);
            echo(mysqli_error($conn));
            $cursor = mysqli_stmt_get_result($statement);
            $result = mysqli_fetch_all($cursor);
            
            echo(mysqli_error($conn));
            mysqli_close($conn);

            //var_dump($result);
            echo(json_encode($result));
  