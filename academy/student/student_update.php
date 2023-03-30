<?php

$prevPage = $_SERVER['HTTP_REFERER'];
// 변수에 이전페이지 정보를 저장

include "../school_db_info.php";

$stuid = $_GET['stuid'];

$sql = "select * from student where stuid ='$stuid';";

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
    <title>학생정보 수정</title>
    <script src="index.js"></script>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>

    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
    <div style="height: 375px; width: 540px; margin-left: 30px; margin-top: 30px;">

        <div class="box insert_box" style="height: 100%; width: 100%; font-weight: normal;">

            <form name="stu_insert" action="update_action.php" method="post" id="student">
                <table border="0" align="center" style="border-collapse: collapse;">
                    <tr>
                        <td>학&nbsp;&nbsp;&nbsp;&nbsp;번: <input type="text" class="" size="7" style="border: none; background: transparent;" name="stuid" readonly> </td>
                        <td>중&nbsp;학&nbsp;교<br><input type="text" class="form_field" size="20" name="mid_sch"> </td>
                    </tr>
                    <tr>
                        <td>
                            이&nbsp;&nbsp;&nbsp;&nbsp;름: <input type="text" class="form_field" size="2" name="name">
                        </td>
                        <td>
                            고등학교<br><input type="text" class="form_field" size="20" name="high_sch">
                        </td>
                    </tr>
                    <tr>
                        <td height="50">
                            성 별 : <input type="radio" name="gender" value="남성" checked="checked">남
                            <input type="radio" name="gender" value="여성">여
                            
                        </td>
                        <td>
                            학과<br><input type="text" class="form_field" size="20" name="dept">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            생년월일 : <input type="date" class="form_field" min="2003-01-01" max="2008-12-31" name="birth">
                        </td>
                        <td rowspan="2" align="center" style="">
                            <button type="submit" form="student" class="button" style="height: 85px; width: 85px; font-size: 13px;" onclick="return update_check()">수정하기</button><br>
                            <button type="button" class="button" onclick="location.href='student_delete.php?stuid=<?php echo $stuid ?>'" style="height: 30px; width: 85px; margin-top: 15px; font-size: 13px;">삭제</button><br>
                            <button type="button" class="button" onclick="location.href='/academy/student'" style="height: 30px; width: 85px; margin-top: 15px; font-size: 13px;">뒤로가기</button>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 20px;">
                            <table border="0" align="left" style="border-collapse: collapse;">
                                <tr>
                                    <td align="left">
                                        우편번호 : <input type="text" class="form_field" name="zip" style="width: 45px;" readonly>
                                    </td>
                                    <td align="right">
                                        <button type="button" class="button" style="width:60px; height:32px; font-size: 12px;" onclick="openZipSearch()">검색</button>
                                    </td>
                                    <tr>
                                    <td colspan="2" width="150px">
                                        주소<br><input type="text" class="form_field" name="addr1" style="width:300px; height:30px;" readonly><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        상세<br><input type="text" class="form_field" name="addr2" style="width:300px; height:30px;"><br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </form>
        </div>

    <script>
        document.stu_insert.stuid.value = "<?php echo $row['stuid']?>";
        document.stu_insert.mid_sch.value = "<?php echo $row['mid_sch']?>";
        document.stu_insert.name.value = "<?php echo $row['name']?>";
        document.stu_insert.high_sch.value = "<?php echo $row['high_sch']?>";
        document.stu_insert.gender.value = "<?php echo $row['gender']?>";
        document.stu_insert.dept.value = "<?php echo $row['dept']?>";
        document.stu_insert.birth.value = "<?php echo $row['birth']?>";
        document.stu_insert.zip.value = "<?php echo $row['zip']?>";
        document.stu_insert.addr1.value = "<?php echo $row['addr1']?>";
        document.stu_insert.addr2.value = "<?php echo $row['addr2']?>";
        function openZipSearch() {
            new daum.Postcode({
                oncomplete: function (data) {
                    $('[name=zip]').val(data.zonecode); // 우편번호 (5자리)
                    $('[name=addr1]').val(data.address);
                    $('[name=addr2]').val(data.buildingName);
                }
            }).open();
        }
    </script>
</body>
</html>
