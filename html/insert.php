<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1>데이터 입력받아 화면에 출력하기</h1>
    <form method="POST" action="index.php">
        이름: <input type="text" name="name"/><br/>
        나이: <input type="text" name="age"/><br/>
        주소: <input type="text" name="addr"/><br/>
        직업: <input type="text" name="job"/><br/>
        <input type="submit" name="submit"/>
    </form>
    <h4>입력된 데이터는 아래와 같습니다.</h4>
    <?php 
        echo "이름: ".$_POST['name']."<br/>";
        echo "나이: ".$_POST['age']."<br/>";
        echo "주소: ".$_POST['addr']."<br/>";
        echo "직업: ".$_POST['job'];
    ?>
</body>

<!-- https://doorbw.tistory.com/41 -->


</html>

