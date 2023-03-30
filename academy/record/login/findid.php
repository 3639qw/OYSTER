<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>학번 찾기</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.ico">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../paper/index.css">
    <script src="/antidragclick.js"></script>
</head>
<body>
<div class="first_section">
<?php
    include "../lib/dblib.php";
    session_start(); // 세션
?>
    <div class="second_section" style="width: 750px;">
        <table border="1" class="window">
            <tr align="center">
                <td align="left" class="top" style="letter-spacing: 2px;">
                    학번 찾기
                </td>
            </tr>
            <tr align="center" id="cont_2_ac">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <form name="find_id_form" id="find_id_form" action="stuid_check.php" method="post">
                        <table border="1" class="content">
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
                                            select b.high_sch, c.initial
                                            from score a, student b, high_sch c
                                            where a.stuid = b.stuid and b.high_sch = c.name
                                            group by b.high_sch, c.initial;
                                            ";
                                        $high_name_result = mysqli_query($con, $high_name_sql);
                                        while($high_name = mysqli_fetch_array($high_name_result)){
                                            ?>
                                            <option value="<?=$high_name['high_sch'];?>"><?=$high_name['high_sch'];?></option>
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
            <button style="letter-spacing: 2px;" form="find_id_form" class="accept">
                학번 찾기
            </button>

            <button style="letter-spacing: 2px;" onclick="location.href='../'" class="cancel">
                홈으로
            </button>
        </div>
    </div>
</div>
</body>
</html>