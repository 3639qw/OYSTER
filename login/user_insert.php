<?php
	include "connect.php";


    $id = $_POST['id'];
    $pw = $_POST['pw'];

	$sql = "INSERT INTO users (id, pw)";
	$sql.="VALUES('$id','$pw')";

	$result = mysqli_query($con, $sql);




	if($result){
		echo '입력 성공 :<br>'.$result;


	}else{
		echo '입력 실패 :<br>'.mysqli_error($con);

	}
    header("Location: http://juyong.pw/login/login.php");
    


 ?>
