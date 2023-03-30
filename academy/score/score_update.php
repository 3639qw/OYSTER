<?php

$prevPage = $_SERVER['HTTP_REFERER'];
// 변수에 이전페이지 정보를 저장

include "../school_db_info.php";

$stuid = $_GET['stuid'];


$sql = "select * from score where stuid = '$stuid';";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        * {
            font-family: 'Noto Sans KR', sans-serif;
            font-weight: bold;
        }

        .item_box {
            border-radius: 5px;
            background: #ffffff;
            box-shadow: 2px 2px 4px 2px #bebebe;
        }

        .item_box:hover {
            box-shadow: 0 8px 16px 0 #7bbcde;
            transition: all 0.6s;
        }

        .box {
            border-radius: 5px;
            background: #ffffff;
            box-shadow: 2px 2px 4px 2px #bebebe;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .db_box{
            border-radius: 5px;
            background: #ffffff;
            box-shadow: 2px 2px 4px 2px #bebebe;
            height: auto;
        }

        .table_cont{
            border-bottom: 1px solid black;
        }

        .insert_box {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .button {
                    background: #efefef;
                    border: none;
                    border-radius: .5rem;
                    color: #444;
                    letter-spacing: .2rem;
                    text-align: center;
                    outline: none;
                    cursor: pointer;
                    transition: .2s ease-in-out;
                    box-shadow: -6px -6px 14px rgba(255, 255, 255, .7),
                                -6px -6px 10px rgba(255, 255, 255, .5),
                                6px 6px 8px rgba(255, 255, 255, .075),
                                6px 6px 10px rgba(0, 0, 0, .15);
        }
        .button:hover {
                        box-shadow: -2px -2px 6px rgba(255, 255, 255, .6),
                                    -2px -2px 4px rgba(255, 255, 255, .4),
                                    2px 2px 2px rgba(255, 255, 255, .05),
                                    2px 2px 4px rgba(0, 0, 0, .1);
        }
        .button:active {
                            box-shadow: inset -2px -2px 6px rgba(255, 255, 255, .7),
                                        inset -2px -2px 4px rgba(255, 255, 255, .5),
                                        inset 2px 2px 2px rgba(255, 255, 255, .075),
                                        inset 2px 2px 4px rgba(0, 0, 0, .15);
        }

        .addrSearch{
            background: #f0f0f0;
            border: none;
            border-radius: .5rem;
            color: #444;
            letter-spacing: .2rem;
            text-align: center;
            outline: none;
            cursor: pointer;
            transition: .2s ease-in-out;
            box-shadow: -6px -6px 14px rgba(255, 255, 255, .7),
                        -6px -6px 10px rgba(255, 255, 255, .5),
                        6px 6px 8px rgba(255, 255, 255, .075),
                        6px 6px 10px rgba(0, 0, 0, .15);

        }
        .addrSearch:hover {
            box-shadow: -2px -2px 6px rgba(255, 255, 255, .6),
                        -2px -2px 4px rgba(255, 255, 255, .4),
                        2px 2px 2px rgba(255, 255, 255, .05),
                        2px 2px 4px rgba(0, 0, 0, .1);
        }
        .addrSearch:active {
            box-shadow: inset -2px -2px 6px rgba(255, 255, 255, .7),
                        inset -2px -2px 4px rgba(255, 255, 255, .5),
                        inset 2px 2px 2px rgba(255, 255, 255, .075),
                        inset 2px 2px 4px rgba(0, 0, 0, .15);
        }

        .form_field{
            /*-webkit-box-shadow : 0!important;*/
            box-shadow: none !important;
            -webkit-border-radius: 0!important;
            border: 0!important;
            border-bottom: 1px solid #9b9b9b!important;
            outline: 0!important;
            color: black!important;
            background: transparent!important;
            /*transition: border-color 0.2s!important;*/
        }

    </style>
    <meta charset="utf-8">
    <title>성적정보 수정</title>
    <script src="check.js"></script>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>

    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
    <div style="height: 530px; width: 400px; margin-left: 30px; margin-top: 30px;">


        <div style="height: 100%; width: 100%; float:left">

            <!-- 입력창 -->
            <div class="box insert_box" style="height: 45%; width: 100%;">
                <form name="score_insert" action="update_action.php" method="post" id="stu_score">
                    <table border="0" align="center" style="border-collapse: collapse;" width="330">
                        <tr align="left" style="height: 60px;">
                            <td>
                                학번 : <input type="text" style="border: none; background: transparent;" size="7" name="stuid" id="stuid" readonly>    
                            </td>
                            <td>
                                <button type="submit" form="stu_score" class="button" style="width: 80%; height: 40px; float: left; font-size: 13px; " onclick="return check_insert()">입력하기</button>
                            </td>
                        </tr>
                        <tr style="height: 35px;">
                            <td>
                                국어 : <input type="text" class="form_field" size="3" name="sub1" id="sub1" onchange='scoreup()'>
                            </td>
                            <td>
                                영어 : <input type="text" class="form_field" size="3" name="sub2" id="sub2" onchange='scoreup()'>
                            </td>
                        </tr>
                        <tr style="height: 35px;">
                            <td>
                                수학 : <input type="text" class="form_field" size="3" name="sub3" id="sub3" onchange='scoreup()'>
                            </td>
                            <td>
                                사회 : <input type="text" class="form_field" size="3" name="sub4" id="sub4" onchange='scoreup()'>
                            </td>
                        </tr>
                        <tr style="height: 35px;">
                            <td>
                                과학 : <input type="text" class="form_field" size="3" name="sub5" id="sub5" onchange='scoreup()'>
                            </td>
                        </tr>
                        <tr align="left" style="width: 100%; height: 50px;">
                            <td>
                                <button type="button" class="button" onclick="location.href='/academy/score'" style="width: 45%; height: 40px; float: left; font-size: 12px;">뒤로<br>가기</button>
                                <button type="button" class="button" onclick="location.href='score_delete.php?stuid=<?php echo $stuid ?>'" style="width: 45%; height: 40px; float: right; font-size: 13px;">삭제</button>
                            </td>
                            <td style="padding-left: 20px;">
                                평균 : <a id="result"></a>&nbsp;<a id="result_gpa"></a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.score_insert.stuid.value="<?php echo $row['stuid']?>"
        document.score_insert.sub1.value="<?php echo $row['sub1']?>"
        document.score_insert.sub2.value="<?php echo $row['sub2']?>"
        document.score_insert.sub3.value="<?php echo $row['sub3']?>"
        document.score_insert.sub4.value="<?php echo $row['sub4']?>"
        document.score_insert.sub5.value="<?php echo $row['sub5']?>"
    </script>
    </body>
</html>
