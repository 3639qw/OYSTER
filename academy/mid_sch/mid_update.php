<?php

$prevPage = $_SERVER['HTTP_REFERER'];
// 변수에 이전페이지 정보를 저장

include "../school_db_info.php";

$id = $_GET['id'];

$sql = "select * from mid_sch where id = $id;";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>중학교 정보 수정</title>
    <script src="index.js"></script>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>

<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<div style="height: 375px; width: 500px; margin-left: 30px; margin-top: 30px;">

    <div class="box insert_box" style="height: 100%; width: 100%; font-weight: normal;">

        <form name="mid_insert" action="update_action.php" method="post" id="high_sch">
            <table border="0" align="center" style="border-collapse: collapse;">
                <tr>
                    <td>ID: <input type="text" class="" size="7" style="border: none; background: transparent;" name="id" readonly> </td>
                    <td>설립일<br><input type="date" class="form_field" min="1900-01-01" max="2099-12-31" name="est"></td>
                </tr>
                <tr>
                    <td>
                        학교명: <input type="text" class="form_field" size="25" name="name">
                    </td>
                    <td>
                        관할 교육청<br><select  class="form_field" name="office_edu">
                            <option value="서울특별시교육청">서울특별시교육청</option>
                            <option value="부산광역시교육청">부산광역시교육청</option>
                            <option value="대구광역시교육청">대구광역시교육청</option>
                            <option value="인천광역시교육청">인천광역시교육청</option>
                            <option value="광주광역시교육청">광주광역시교육청</option>
                            <option value="대전광역시교육청">대전광역시교육청</option>
                            <option value="울산광역시교육청">울산광역시교육청</option>
                            <option value="세종특별자치시교육청">세종특별자치시교육청</option>
                            <option value="경기도교육청">경기도교육청</option>
                            <option value="강원도교육청">강원도교육청</option>
                            <option value="충청북도교육청">충청북도교육청</option>
                            <option value="충청남도교육청">충청남도교육청</option>
                            <option value="전라북도교육청">전라북도교육청</option>
                            <option value="전라남도교육청">전라남도교육청</option>
                            <option value="경상북도교육청">경상북도교육청</option>
                            <option value="경상남도교육청">경상남도교육청</option>
                            <option value="제주특별자치도교육청">제주특별자치도교육청</option>
                            <option value="교육부">교육부</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td height="50">
                        성 별 :
                        <input type="radio" name="gender" value="남성">남
                        <input type="radio" name="gender" value="여성">여
                        <input type="radio" name="gender" value="공학" checked="checked">공학

                    </td>
                    <td>
                        설립유형: <select class="form_field" name="founder">
                            <option value="국립">국립</option>
                            <option value="공립">공립</option>
                            <option value="사립">사립</option>
                        </select>
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
                    <td rowspan="2" align="center" style="">
                        <button type="submit" form="high_sch" class="button" style="height: 85px; width: 85px; font-size: 13px;" onclick="return update_check()">수정하기</button><br>
                        <button type="button" class="button" onclick="location.href='mid_delete.php?id=<?=$id?>'" style="height: 30px; width: 85px; margin-top: 15px; font-size: 13px;">삭제</button><br>
                        <button type="button" class="button" onclick="location.href='/academy/mid_sch'" style="height: 30px; width: 85px; margin-top: 15px; font-size: 13px;">뒤로가기</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <script>
        document.mid_insert.id.value="<?=$row['id']?>"
        document.mid_insert.name.value="<?=$row['name']?>"
        document.mid_insert.gender.value="<?=$row['gender']?>"
        document.mid_insert.founder.value="<?=$row['founder']?>"
        document.mid_insert.est.value="<?=$row['est']?>"
        document.mid_insert.office_edu.value="<?=$row['office_edu']?>"
        document.mid_insert.zip.value="<?=$row['zip']?>"
        document.mid_insert.addr1.value="<?=$row['addr1']?>"
        document.mid_insert.addr2.value="<?=$row['addr2']?>"
    </script>
</body>
</html>


