<html>
    <head>
        <meta charset="utf-8" />
        <title>Register</title>
    </head>
    <body>
    <?php
        if (isset($_REQUEST["user"])) {
            $user = $_REQUEST["user"];
            $pwd = $_REQUEST["pwd"];
            $hash = hash('sha256',$pwd);
            $sql = "INSERT INTO USERS(UserName, PwdHash)
                    VALUES(?,?)
            ";

            include(getenv("MYAPP_CONFIG"));
            $conn = mysqli_connect($DB_URL,$DB_USER,$DB_PWD,$DB_NAME);
            // Нудная, но необходимая процедура передачи параметров 
            // в sql выражение, что гарантирует защиту от инжекции sql
            $statement = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($statement,"ss",$user,$hash);
            // Часто применяемая в PHP конструкции "... or die..." 
            // позволяет прекратить исполнение кода, если первая часть 
            // выражения вернула что-то "нехорошее":
            mysqli_stmt_execute($statement) or die(mysqli_error($conn));
            mysqli_close($conn);
            echo('<meta http-equiv="refresh" content="2; URL=login.php">');
            die("Новый пользователь $user зарегистрирован");
        }
        
    ?>
    </body>
        <h1>Register, please!</h1>
        <form method="post">
            <input name="user" /> <br />
            <input name="pwd" type="password" /> <br />
            <button id="btn1">Go!</button>
        </form>
    </body>
</html>