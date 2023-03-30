<head>
<title>Stock Insert</title>
</head>
<?php
    $prevPage = $_SERVER['HTTP_REFERER'];
    // 변수에 이전페이지 정보를 저장    
	include "stock_db_info.php";

    $ticker = $_POST['ticker'];
	$name = $_POST['name'];
	$value = $_POST['value'];
	$market = $_POST['market'];

	$sql = "INSERT INTO korea_stock (ticker, name, value, market)";
	$sql.="VALUES('$ticker','$name','$value','$market')";

    echo $sql;

	$result = mysqli_query($con, $sql);

	if($result){
		echo '입력 성공 :<br>'.$result;
        header('Location:'.$prevPage);
	}else{
		echo '입력 실패 :'.mysqli_error($con);
    }

 ?>
