<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>사용자가 원하는 구구단 출력하기</h1>
    <form method="POST" action="gugudan.php">
        <li>구구단을 보고 싶은 숫자를 입력하고 제출을 누르세요.</li>
        <input type="text" name="input"/><br/>
        <input type="submit" name="answer">
    </form>
<?php
if (isset($_POST['input'])){
    $num = (int)($_POST['input']);
    echo $num."단 입니다.<br><br>";
    for($j=1;$j<=9;$j++){
        echo $num." X ".$j." = ".($num*$j)."<br/>";
    }
    echo "<br/>";
}




 
?>
</body>
</html>