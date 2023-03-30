<?php
$prevPage = $_SERVER['HTTP_REFERER'];
// 변수에 이전페이지 정보를 저장

include "../school_db_info.php";
$tid = $_GET['id'];
$sql = "select * from teacher where tid =".$tid.";";
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
    <title>교원정보 수정</title>
    <script src="index.js"></script>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect"  href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>

    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
    <div style="height: 420px; width: 470px; margin-left: 30px; margin-top: 30px;">

        <div class="box insert_box" style="height: 100%; width: 100%; font-weight: normal;">

            <form name="tea_insert" action="update_action.php" method="post" id="teacher">
                <table border="0" align="center" style="border-collapse: collapse;">
                    <tr>
                        <td>교원번호: <input type="text" class="" size="2" style="border: none; background: transparent;" name="tid" readonly> </td>
                        <td>소속 학교<br><input type="text" class="form_field" size="20" name="sch"> </td>
                    </tr>
                    <tr>
                        <td>
                            이&nbsp;&nbsp;&nbsp;&nbsp;름: <input type="text" class="form_field" size="2" name="name">
                        </td>
                        <td>
                            주 과목<br><input type="text" class="form_field" size="20" name="sub">
                        </td>
                    </tr>
                    <tr>
                        <td height="50">
                            성 별 : 
                                <select class="form_field" name="gender">
                                    <option value="남성">남</option>
                                    <option value="여성">여</option>
                                </select>
                        </td>
                        <td>
                            부 과목<br><input type="text" class="form_field" size="20" name="sub2">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            생년월일: <input type="date" class="form_field" min="1900-01-01" max="2099-12-31" name="birth">
                        </td>
                        <td>
                            호봉<br><input type="text" class="form_field" size="20" name="step">
                        </td>
                    </tr>
                    <tr height="40px">
                        <td>
                            임용년월일: <input type="date" class="form_field" name="joindate"> 
                        </td>
                        <td rowspan="7" align="center">
                            <button type="submit" form="teacher" class="button" style="height: 85px; width: 85px; font-size: 13px;" onclick="return check_insert()">수정하기</button><br>
                            <button type="button" class="button" onclick="location.href='teacher_delete.php?tid=<?=$tid ?>'" style="height: 30px; width: 85px; margin-top: 15px; font-size: 13px;">삭제</button><br>
                            <button type="button" class="button" onclick="location.href='/academy/teacher'" style="height: 30px; width: 85px; margin-top: 15px; font-size: 13px;">뒤로가기</button>
                        </td>
                    </tr>
                    <tr height="40px">
                        <td>
                            직위: 
                                <select class="form_field" name="position">
                                    <option value="교사">교사</option>
                                    <option value="교장">교장</option>
                                    <option value="교감">교감</option>
                                </select>
                        </td>
                    </tr>
                    <tr height="40px">
                        <td>
                            자격정보:
                                    <select class="form_field" name="lilevel">
                                        <option value="1정">1정</option>
                                        <option value="2정">2정</option>
                                        <option value="교장">교장</option>
                                        <option value="교감">교감</option>
                                        <option value="보건">보건</option>
                                        <option value="사서">사서</option>
                                        <option value="영양">영양</option>
                                        <option value="상담">상담</option>
                                    </select>
                        </td>
                    </tr>
                    <tr height="40px">
                        <td>
                            부서: <input type="text" class="form_field" size="18" name="dept">
                        </td>
                    </tr>
                    <tr height="40px">
                        <td>
                            직책: <input type="text" class="form_field" size="18" name="title">
                        </td>
                    </tr>
                </table>
            </form>
        </div>

    <script>
        document.tea_insert.tid.value="<?=$row['tid']?>";
        document.tea_insert.name.value="<?=$row['name']?>";
        document.tea_insert.gender.value="<?=$row['gender']?>";
        document.tea_insert.birth.value = "<?=$row['birth']?>";
        document.tea_insert.sch.value = "<?=$row['sch']?>";
        document.tea_insert.sub.value = "<?=$row['sub']?>";
        document.tea_insert.sub2.value = "<?=$row['sub2']?>";
        document.tea_insert.joindate.value = "<?=$row['joindate']?>";
        document.tea_insert.position.value = "<?=$row['position']?>";
        document.tea_insert.dept.value = "<?=$row['dept']?>";
        document.tea_insert.title.value = "<?=$row['title']?>";
        document.tea_insert.step.value = "<?=$row['step']?>";
    </script>
</body>
</html>
