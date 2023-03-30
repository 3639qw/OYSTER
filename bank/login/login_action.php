<?php
session_start();
include "../bank_db_info.php";

if(!isset($_SESSION['PID'])){
    // 입력한 아이디와 비밀번호를 검증한다
    // 활성된 사용자여야한다
    $login_sql = "
    select
    type, name, login_id id, id PID, concat(substr(id,1,6),'-',substr(id,7,7)) PID_Dash, reg_date
    from member_list
    where
    login_id = '".$_POST['id']."'
    and login_pw = '".$_POST['pw']."'
    and active = 'Y';
    ";
    $login = mysqli_fetch_assoc(mysqli_query($con,$login_sql));


    if($login['id'] == '' || $login['id'] == null){
        $pass = 'N';
        $welcome = '사용자 정보가 일치하지 않습니다';
        echo "<script>alert('$welcome')</script>";
        echo "<script>history.back()</script>";
    }else{
        if($login['id'] == $_POST['id']){
            foreach ($login as $key => $value){
                $_SESSION[$key] = $value;
            }
            $pass = 'Y';
            $welcome = $login['name'].'님 반갑습니다';
            echo "<script>alert('$welcome')</script>";
            echo "<script>location.href='/bank'</script>";
        }else{
            $pass = 'N';
            $welcome = '사용자 정보가 일치하지 않습니다';
            echo "<script>alert('$welcome')</script>";
            echo "<script>history.back()</script>";
        }
    }
}else{
    echo "<script>location.href='/bank'</script>";
}

?>