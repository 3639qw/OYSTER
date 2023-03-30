<?php
header("Content-Type: text/html;charset=UTF-8");
$con = mysqli_connect("localhost","selecter","134679qw","student");

if(mysqli_connect_errno($con)){
	echo "DB연결 실패:".mysqli_connect_error();
}else{
	// echo "Student DB연결 성공<br>";
	
	mysqli_query($con, "set session charactor_set_connection=utf8;");
	mysqli_query($con, "set session charactor_set_results=utf8;");
	mysqli_query($con, "set session charactor_set_client=utf8;");
	

}
