<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>회원가입</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.ico">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/standard/dialog.css">
    <script src="/antidrag.js"></script>
    <script>
        $(document).ready(function (){
            $("#headerContent").load("/main_menu/main_header.html");

            $("input[name='level']").change(function (){
                if($("input[name='level']:checked").val() == '0'){
                    $("#id_type").text('주민등록번호');
                }else if($("input[name='level']:checked").val() == '1'){
                    $("#id_type").text('법인등록번호');
                }
            });
            $("input[name='level']").change(function (){
                if($("input[name='level']:checked").val() == '0'){
                    $("#name_type").text('성명');
                }else if($("input[name='level']:checked").val() == '1'){
                    $("#name_type").text('법인명');
                }
            });


        });

        function Login(){
            // 성명 검증
            if($("input[name=name]").val() == '' || $("input[name=name]").val() == ''){
                if($("input[name='level']:checked").val() == '0'){
                    alert('성명을 입력해주세요');
                }else if($("input[name='level']:checked").val() == '1'){
                    alert('법인명을 입력해주세요');
                }
                $("input[name=name]").focus();
                return false;
            }
            // 신분확인번호 검증
            if($("input[name=id_1]").val() == '' || $("input[name=id_1]").val() == null || $("input[name=id_2]").val() == '' || $("input[name=id_2]").val() == null){
                if($("input[name='level']:checked").val() == '0'){
                    alert('주민등록번호를 입력해주세요');
                }else if($("input[name='level']:checked").val() == '1'){
                    alert('법인등록번호를 입력해주세요');
                }
                if($("input[name=id_1]").val() == '' || $("input[name=id_1]").val() == null){
                    $("input[name=id_1]").focus();
                }else if($("input[name=id_2]").val() == '' || $("input[name=id_2]").val() == null){
                    $("input[name=id_2]").focus();
                }
                return false;
            }
            // 아이디 검증
            if($("input[name=id]").val() == '' || $("input[name=id]").val() == ''){
                alert('아이디를 입력해주세요');
                $("input[name=id]").focus();
                return false;
            }
            // 비밀번호 검증
            if($("input[name=pw]").val() == '' || $("input[name=pw]").val() == ''){
                alert('비밀번호를 입력해주세요');
                $("input[name=pw]").focus();
                return false;
            }
            return true;
        }

        function chkCharCode(event) {
            const regExp = /[^0-9a-z]/g;
            const ele = event.target;
            if (regExp.test(ele.value)) {
                ele.value = ele.value.replace(regExp, '');
            }
        };
    </script>
</head>
<body>

<div id="headerContent" style="margin-bottom: 20px;"></div>

<div class="first_section">
    <?php
    if($_SESSION['id'] == null || $_SESSION['id'] == '') { // 로그인 하지 않았다면
    ?>
    <div class="second_section" style="width: 750px;">
        <table border="1" class="window">
            <tr align="center">
                <td align="left" class="top" style="letter-spacing: 2px;">
                    회원가입
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <form name="login_form" id="login_form" method="post" action="./reg_action.php">
                        <table border="1" class="content">
                            <tr>
                                <td style="width: 25%; height: 60px; border-right: hidden;">
                                    자격
                                </td>
                                <td style="width: 75%;">
                                    <input type="radio" name="level" id="level" value="0" checked>개인
                                    <input type="radio" name="level" id="level" value="1" style="margin-left: 20px;">법인
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; height: 60px; border-right: hidden;">
                                    <a id="name_type">성명</a>
                                </td>
                                <td style="width: 75%;">
                                    <input type="text" style="height: 30px; letter-spacing: 2px;" class="input" name="name" maxlength="10">
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; height: 60px; border-right: hidden;">
                                    <a id="id_type">주민등록번호</a>
                                </td>
                                <td style="width: 75%;">
                                    <input type="text" style="height: 30px; letter-spacing: 2px; width: 15%;" class="input" name="id_1" maxlength="6" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                    -
                                    <input type="text" style="height: 30px; letter-spacing: 2px; width: 16%;" class="input" name="id_2" maxlength="7" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; height: 60px; border-right: hidden;">
                                    아이디
                                </td>
                                <td style="width: 75%;">
                                    <input type="text" style="height: 30px; letter-spacing: 2px;" class="input" name="id" maxlength="10" oninput="chkCharCode(event)">
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; height: 60px; border-right: hidden;">
                                    비밀번호
                                </td>
                                <td style="width: 75%;">
                                    <input type="password" style="height: 30px; letter-spacing: 2px;" class="input" name="pw" maxlength="20" oninput="chkCharCode(event)">
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
        </table>
        <!-- 버튼 -->
        <div style="height: 50px; width: 50%; margin: auto; margin-top: 30px; margin-bottom: 30px;">
            <button style="letter-spacing: 2px;" onclick="return Login()" form="login_form" class="accept">
                회원가입
            </button>

            <button style="letter-spacing: 2px;" onclick="location.href='/bank'" class="cancel">
                홈으로
            </button>
        </div>
    </div>
    <?php
    }else{
        echo '<script>location.href="/bank"</script>';
    }
    ?>
</div>
</body>
</html>