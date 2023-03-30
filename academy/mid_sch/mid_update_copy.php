<?php

$prevPage = $_SERVER['HTTP_REFERER'];
// 변수에 이전페이지 정보를 저장

include "../school_db_info.php";

$id = $_GET['id'];


$sql = "select * from mid_sch where id = $id;";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>중학교 정보 수정</title>
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <script src="index.js"></script>
    </head>
    <body>
        <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
        <div id="post" style="width: 500px;">
            <div id="pnav">
              중학교 정보 입력
              <img class="pbuttons" src="../quit.png">
              <img class="pbuttons" src="../full.png">
              <img class="pbuttons" src="../mini.png">
            </div>

            <form name="mid_insert" action="update_action.php" method='post'>
                        <table border="0" align="center">
                            <tr>
                                <td width="80">
                                    학교명: <input type="text" class="form-02" size="30" id="name" name="name"> 
                                    <input type="text" class="form-02" name="id" value="<?php echo $row['id']?>" hidden>
                                </td>
                                <td>
                                    설립일 <input type="date" class="form-02" min="1900-01-01" max="2099-12-31" name="est">
                                </td>
                            </tr>
                            <tr>
                                <td width="250">
                                    설립유형: <select name="founder">
                                                    <option value="국립">국립</option> 
                                                    <option value="공립">공립</option> 
                                                    <option value="사립">사립</option>
                                                </select>
                                </td>
                                <td>
                                    관할 교육청<br><select name="office_edu">
                                                        <option value="서울특별시교육청">서울특별시교육청</option>
                                                        <option value="부산광역시교육청">부산광역시교육청</option>
                                                        <option value="대구광역시교육청">대구광역시교육청</option>
                                                        <option value="인천광역시교육청">인천광역시교육청</option>
                                                        <option value="광주광역시교육청">광주광역시교육청</option>
                                                        <option value="대전광역시교육청">대전광역시교육청</option>
                                                        <option value="울산광역시교육청">울산광역시교육청</option>
                                                        <option value="세종특별차지시교육청">세종특별차지시교육청</option>
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
                                <td width="230">
                                    성 별 : <select name="gender">
                                                    <option value="남성">남</option>
                                                    <option value="여성">여</option>
                                                    <option value="공학">공학</option>
                                                </select>
                                </td>
                            </tr>
                            <tr>
                            <td rowspan="4">
                                <table border="0">
                                    <tr>
                                        <td align="left">
                                            우편번호 : <input type="text" class="form-02" name="zip" style="width:80px; height:26px;" readonly>
                                        </td>
                                        <td align="right">
                                            <button type="button" class="btn-insert" style="width:60px; height:32px; font-size: 12px;" onclick="openZipSearch()">검색</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="150px">
                                            주소 <input type="text" class="form-02" id="addr1" name="addr1" style="width:300px; height:30px;" readonly><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            상세 <input type="text" class="form-02" name="addr2" style="width:300px; height:30px;"><br>
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </table>
                            </td>
                                <td rowspan="4" align="center" width="50" style="margin: 0;">
                                    <div class="body">
                                        <button type="button" class="btn-insert" onclick="location.href='/academy/mid_sch'" style="height: 30px; width: 75px; margin : 0px; font-size: 13px;">뒤로가기</button>
                                        <input type="submit" class="btn-insert" value="수정하기" style="height: 75px; width: 75px; margin: 15px 0px 0px 0px; font-size: 13px;" onclick="return check_insert()"><br>
                                        <button type="button" class="btn-insert" onclick="location.href='mid_delete.php?id=<?php echo $id ?>'" style="height: 30px; width: 75px; margin : 0px; font-size: 13px;">삭제</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
            <div id="noter">
            <div class="notebox"><?php echo 'School ID: '.$row['id']?></div>
            </div>
        </div>

        <script>
            document.mid_insert.office_edu.value="<?php echo $row['office_edu']?>"
            document.mid_insert.name.value="<?php echo $row['name']?>"
            document.mid_insert.est.value="<?php echo $row['est']?>"
            document.mid_insert.founder.value="<?php echo $row['founder']?>"
            document.mid_insert.gender.value="<?php echo $row['gender']?>"
            document.mid_insert.zip.value="<?php echo $row['zip']?>"
            document.mid_insert.addr1.value="<?php echo $row['addr1']?>"
            document.mid_insert.addr2.value="<?php echo $row['addr2']?>"
            function openZipSearch() {
                new daum.Postcode({
                    oncomplete: function(data) {
                        $('[name=zip]').val(data.zonecode); // 우편번호 (5자리)
                        $('[name=addr1]').val(data.address);
                        $('[name=addr2]').val(data.buildingName);
                    }
                }).open();
            }
        </script>



    </body>
</html>


