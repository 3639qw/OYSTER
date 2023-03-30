<?php
session_start();
include "../bank_db_info.php";

// 비밀번호 검증
function PasswordCheck($_str)
{
    $pw = $_str;
    $num = preg_match('/[0-9]/u', $pw);
    $eng = preg_match('/[a-z]/u', $pw);
    $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);

    // 길이 검증
    if(strlen($pw) < 8 || strlen($pw) > 20)
    {
        echo '<script>alert("비밀번호는 영문 소문자, 숫자를 혼합하여 최소 8자리 ~ 최대 20자리 이내로 입력해주세요.")</script>';
        return 'N';
    }
    // 공백여부 검증
    if(preg_match("/\s/u", $pw) == true)
    {
        echo '<script>alert("비밀번호는 공백없이 입력해주세요.")</script>';
        return 'N';
    }
    // 영문 소문자, 숫자 포함여부 검증
    if($num == 0 || $eng == 0)
    {
        echo '<script>alert("비밀번호는 영문 소문자, 숫자를 혼합하여 입력해주세요.")</script>';
        return 'N';
    }
    // 특문 포함되는지 검증
    if($spe > 0){
        echo '<script>alert("비밀번호에 특수문자는 사용할 수 없습니다")</script>';
        return 'N';
    }
    return 'Y';
}

$pw_info['id'] = $_POST['id'];
$pw_info['pw'] = $_POST['pw'];
$pw_info['Pass'] = PasswordCheck($_POST['pw']);


if($pw_info['id'] == '' || $pw_info['id'] == null){
    echo "<script>alert('일치하는 정보가 없습니다')</script>";
    echo "<script>history.back()</script>";
}else{
    $p_sql = "select id, name from member_list where id = '".$pw_info['id']."'; ";
    $p_row = mysqli_fetch_assoc(mysqli_query($con,$p_sql));


    if($p_row['id'] == $_POST['id'] && $p_row['name'] == $_POST['name']){
        if($pw_info['Pass'] == 'N'){
            echo "<script>location.href='/bank/login/reset_pw.php'</script>";
        }else if($pw_info['Pass'] == 'Y'){
            $sql = "
            UPDATE member_list SET login_pw = '".$pw_info['pw']."' where login_id = '".$pw_info['id']."';
            ";
            $result = mysqli_query($con,$sql);
            echo "<script>alert('비밀번호가 재설정 되었습니다')</script>";
            echo "<script>location.href='/bank'</script>";
        }
    }else{
        echo "<script>alert('일치하는 정보가 없습니다')</script>";
        echo "<script>history.back()</script>";
    }
}


?>