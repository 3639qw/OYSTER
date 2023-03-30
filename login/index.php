<?php
    session_start(); // 세션
    if($_SESSION['id']==null) { // 로그인 하지 않았다면
?>
    <head>
        <title>Login</title>>
    </head>
    <body>
        <center><br><br><br>
            <head>
            <link rel="stylesheet" type="text/css" href="style.css"/>
    
            </head>
            <body>
                <form name="login_form" action="login_check.php" method="post"> 
                    <div>
                        <label for="id">아이디:</label>
                        <input type="text" name="id"><br> 
                    </div>
                    <div>
                        <label for="pw">비밀번호:</label>
                        <input type="password" name="pw"><br><br>
                    </div>
                <input type="submit" name="login" value="로그인"> 
                <!-- <input type="button" name="register" value="Register" onClick="location.href='/login/register.php'"> -->
                </form> 
            </body>
        </center>
    </body>
<?php
    }else{ // 로그인 했다면

    echo "<center><br><br><br>";
    echo $_SESSION['name']."(".$_SESSION['id'].")님이 로그인 하였습니다.";
    echo "&nbsp;<a href='logout.php'><input type='button' value='Logout'></a>";
    echo "</center>";
    }
?>
