<?php
session_start();
include '../bank_db_info.php';

// 주민등록번호 검증
function PersonalID_Check($resno1, $resno2) {
    // $resno1: 생년월일 6자리
    // $resno2: 뒷자리 7자리

    $resno = $resno1 . $resno2;
    $isResnoCheck = 'Y';

    // 형태 검사: 총 13자리의 숫자, 7번째는 1..4의 값을 가짐
    if (!preg_match('/\d{2}([0]\d|[1][0-2])([0][1-9]|[1-2]\d|[3][0-1])[-]*[1-4]\d{6}/', $resno)) {
        $isResnoCheck = 'N';
    }

    // 날짜 유효성 검사
    $birthYear = ('2' >= $resno[6]) ? '19' : '20';
    $birthYear .= substr($resno, 0, 2);
    $birthMonth = substr($resno, 2, 2);
    $birthDate = substr($resno, 4, 2);
    if (!checkdate($birthMonth, $birthDate, $birthYear)) {
        $isResnoCheck = 'N';
    }

    // Checksum 코드의 유효성 검사
    for ($i = 0; $i < 13; $i++) $buf[$i] = (int) $resno[$i];
    $multipliers = array(2,3,4,5,6,7,8,9,2,3,4,5);
    for ($i = $sum = 0; $i < 12; $i++) $sum += ($buf[$i] *= $multipliers[$i]);
    if ((11 - ($sum % 11)) % 10 != $buf[12]) {
        $isResnoCheck = 'N';
    }

    // 모든 검사를 통과하면 유효한 주민등록번호임
    return $isResnoCheck;
}
// 성명 검증
function Name_Check($_str){
    $pw = $_str;

    // 공백여부 검증
    if(preg_match("/\s/u", $pw) == true)
    {
        if($_POST['level'] == '0'){
            echo '<script>alert("성명은 공백없이 입력해주세요.")</script>';
        }else if($_POST['level'] == '1'){
            echo '<script>alert("법인명은 공백없이 입력해주세요.")</script>';
        }
        return 'N';
    }
    return 'Y';
}
// 아이디 검증
function ID_Check($_str){
    $pw = $_str;
    $num = preg_match('/[0-9]/u', $pw);
    $eng = preg_match('/[a-z]/u', $pw);
    $spe = preg_match("/[\!\@\#\$\%\^\&\*]/u",$pw);

    // 길이 검증
    if(strlen($pw) < 6 || strlen($pw) > 10)
    {
        echo '<script>alert("아이디는 영문 소문자, 숫자를 혼합하여 최소 6자리 ~ 최대 10자리 이내로 입력해주세요.")</script>';
        return 'N';
    }
    // 공백여부 검증
    if(preg_match("/\s/u", $pw) == true)
    {
        echo '<script>alert("아이디는 공백없이 입력해주세요.")</script>';
        return 'N';
    }
    // 영문 소문자, 숫자 포함여부 검증
    if($num == 0 || $eng == 0)
    {
        echo '<script>alert("아이디는 영문 소문자, 숫자를 혼합하여 입력해주세요.")</script>';
        return 'N';
    }
    // 특문 포함되는지 검증
    if($spe > 0){
        echo '<script>alert("아이디에 특수문자는 사용할 수 없습니다")</script>';
        return 'N';
    }
    return 'Y';
}
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

//$_POST['NAME_P'] = Name_Check($_POST['name']);
//$_POST['ID_P'] = ID_Check($_POST['id']);
//$_POST['PW_P'] = PasswordCheck($_POST['pw']);



// 성명, 아이디, 비밀번호 검증
if(Name_Check($_POST['name']) == 'Y' && ID_Check($_POST['id']) == 'Y' && PasswordCheck($_POST['pw']) == 'Y'){
    $_POST['Before_Pass'] = 'Y';
}else{
    echo '<script>history.back()</script>';
}

// 결함 확인 후 데이터베이스와 대조하여 중복 검증
if($_POST['Before_Pass'] == 'Y'){
    // $log_info로 변수 복사
    foreach ($_POST as $key => $value){
        if($key != 'Before_Pass'){
            $log_info[$key] = $value;
        }
    }
    $log_info['PID'] = $log_info['id_1'].$log_info['id_2'];
    $log_info['Pass']['Before_Pass'] = 'Y';
    unset($log_info['id_1']);
    unset($log_info['id_2']);
    if($log_info['level'] == '0'){
        $log_info['level'] = '개인';
    }else if($log_info['level'] == '1'){
        $log_info['level'] = '법인';
    }


    // 신분확인번호, 아이디 중복 검증
    $pid_sql = "
    select
    id
    from member_list
    where
    id = '".$log_info['PID']."';
    ";
    $pid = mysqli_fetch_assoc(mysqli_query($con,$pid_sql));
    if($pid['id'] == $log_info['PID']){
        $log_info['Pass']['PID_Pass'] = 'N';
        echo '<script>alert("이미 가입된 회원입니다")</script>';
        echo '<script>history.back()</script>';
    }else{
        $log_info['Pass']['PID_Pass'] = 'Y';
    }

    $id_sql = "
    select
    login_id
    from member_list
    where
    login_id = '".$log_info['id']."';
    ";
    $id = mysqli_fetch_assoc(mysqli_query($con,$id_sql));
    if($id['login_id'] == $log_info['id']){
        $log_info['Pass']['ID_Pass'] = 'N';
        echo '<script>alert("중복된 아이디입니다")</script>';
        echo '<script>history.back()</script>';
    }else{
        $log_info['Pass']['ID_Pass'] = 'Y';
    }

    // 중복 검사를 통과했을 경우 데이터 입력
    if($log_info['Pass']['PID_Pass'] == 'Y' && $log_info['Pass']['ID_Pass'] == 'Y'){
        $log_info['Pass']['After_Pass'] = 'Y';
        $insert_sql = "INSERT INTO member_list (id, name, reg_date, type, login_id, login_pw) ";
        $insert_sql .= "VALUES ('".$log_info['PID']."','".$log_info['name']."','".date("Y-m-d")."','".$log_info['level']."','".$log_info['id']."','".$log_info['pw']."');";
        $log_info['Pass']['INSERT'] = mysqli_query($con,$insert_sql);
        $welcome = $log_info['name'].'님 반갑습니다';
        echo "<script>alert('$welcome')</script>";
        echo "<script>history.back()</script>";

    }

}

//echo '<pre>';
//print_r($log_info);
//echo '</pre>';





?>