<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>제곱수 출력</h1>
    <form method="POST" action="square.php">
        <li>수의 범위를 지정하세요.</li>
        <input type="text" name="one"/><br/>
        <input type="text" name="two"/><br/>
        <input type="submit" name="answer">
    </form>
<?php
if (isset($_POST['one']) && isset($_POST['two'])){
    $on = (int)($_POST['input']);
    $tw = (int)($_POST['two']);
    for($j=on;$j<=tw;$j++){
        echo $j;
    }
    echo "<br/>";
}




 
?>
</body>
</html>