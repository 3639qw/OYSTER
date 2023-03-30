<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>로그인</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.ico">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../paper/index.css">
    <script src="/antidragclick.js"></script>
    <script>
        function Login(){
            switch ($("input[name='level']:checked").val()){
                case '0':
                    $("#login_form").attr("action", "login_check.php");
                    break;

                case '1':
                    $("#login_form").attr("action", "exec_check.php");
                    break;
            }
            return true;
        }
    </script>
</head>
<body>
<div class="first_section">
<?php
    include "../lib/dblib.php"; // DB접속
    session_start(); // 세션
    if($_SESSION['id']==null) { // 로그인 하지 않았다면
?>
    <div class="second_section" style="width: 750px;">

        <table border="1" class="window">
            <tr align="center">
                <td align="left" class="top" style="letter-spacing: 2px;">
                    로그인
                </td>
            </tr>
            <tr align="center" id="cont_2_ac">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <form name="login_form" id="login_form" method="post">
                        <table border="1" class="content">
                            <tr>
                                <td style="width: 25%; height: 60px; border-right: hidden;">
                                    자격
                                </td>
                                <td style="width: 75%;">
                                    <input type="radio" name="level" id="level" value="0" checked>학생
                                    <input type="radio" name="level" id="level" value="1" style="margin-left: 20px;">교원
<!--                                    <select name="level" id="level" class="input" style="height: 30px; width: 365px; letter-spacing: 2px;">-->
<!--                                        <option value="0">학생</option>-->
<!--                                        <option value="1">교원</option>-->
<!--                                    </select>-->
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; height: 60px; border-right: hidden;">
                                    성명
                                </td>
                                <td style="width: 75%;">
                                    <input type="text" style="height: 30px; letter-spacing: 2px;" class="input" name="name">
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; height: 60px; border-right: hidden;">
                                    번호
                                </td>
                                <td style="width: 75%;">
                                    <input type="text" style="height: 30px; letter-spacing: 2px;" class="input" name="id">
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; height: 60px; border-right: hidden;">
                                    생년월일
                                </td>
                                <td style="width: 75%;">
                                    <input type="date" class="input" style="width: 352px; height: 30px; letter-spacing: 2px;" min="1900-01-01" max="<?php echo date('Y-m-d'); ?>" name="birth">
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; height: 60px; border-right: hidden;">
                                    소속 학교
                                </td>
                                <td style="width: 75%;">
                                    <select name="sch" id="sch" class="input" style="height: 30px; width: 365px; letter-spacing: 2px;">
                                        <option value="">--학교 선택--</option>
                                        <?php
                                        $high_name_sql="
                                            select initial, name from high_sch group by initial, name order by name;
                                            ";
                                        $high_name_result = mysqli_query($con, $high_name_sql);
                                        while($high_name = mysqli_fetch_array($high_name_result)){
                                        ?>
                                            <option value="<?=$high_name['initial'];?>"><?=$high_name['name'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
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
                로그인
            </button>

            <button style="letter-spacing: 2px;" onclick="location.href='../'" class="cancel">
                홈으로
            </button>
        </div>
    </div>
<?php
    }else{ // 로그인 했다면
        echo '<script>location.href="../"</script>';
?>
    <div class="second_section" style="width: 750px;">
        <form name="person">
            <table border="1" class="window">
                <tr align="center">
                    <td align="left" class="top" style="letter-spacing: 2px;">
                        인적사항
                    </td>
                </tr>
                <tr align="center" id="cont_2_ac">
                    <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                        <table border="1" class="content">
                            <tr>
                                <td style="width: 25%; height: 60px; border-right: hidden;">
                                    성명
                                </td>
                                <td style="width: 75%;">
                                    <input type="text" style="height: 30px; letter-spacing: 2px;" class="input" name="name" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; height: 60px; border-right: hidden;">
                                    학번
                                </td>
                                <td style="width: 75%;">
                                    <input type="text" style="height: 30px; letter-spacing: 2px;" class="input" name="id" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; height: 60px; border-right: hidden;">
                                    생년월일
                                </td>
                                <td style="width: 75%;">
                                    <input type="text" style="height: 30px; letter-spacing: 2px;" class="input" name="birth" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; height: 60px; border-right: hidden;">
                                    소속 학교
                                </td>
                                <td style="width: 75%;">
                                    <input type="text" style="height: 30px; letter-spacing: 2px;" class="input" name="sch" readonly>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </form>

        <!-- 버튼 -->
        <div style="height: 50px; width: 50%; margin: auto; margin-top: 30px; margin-bottom: 30px; letter-spacing: 2px;">
            <button style="letter-spacing: 2px;" onclick="location.href='logout.php'" class="accept">
                로그아웃
            </button>

            <button style="letter-spacing: 2px;" onclick="location.href='../'" class="cancel">
                홈으로
            </button>
        </div>
    </div>
    <script>
        document.person.name.value = "<?=$_SESSION['name']?>";
        document.person.id.value = "<?=$_SESSION['id']?>";
        document.person.birth.value = "<?=$_SESSION['birth']?>";
        document.person.sch.value = "<?=$_SESSION['sch']?>";
    </script>
<?php
    }
?>
</div>
</body>
</html>