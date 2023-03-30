<?php

$prevPage = $_SERVER['HTTP_REFERER'];
// 변수에 이전페이지 정보를 저장

include "../school_db_info.php";

$id = $_GET['id'];


$sql = "select * from high_sch where id = $id;";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>고등학교 정보</title>
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
        <div id="post" style="width: 500px;">
            <div id="pnav">
              고교 정보 입력
              <img class="pbuttons" src="../quit.png">
              <img class="pbuttons" src="../full.png">
              <img class="pbuttons" src="../mini.png">
            </div>

            <form name="update" action="update_action.php" method='post'>
                        <table border="0" align="center">
                            <tr>
                                <td width="80">
                                    학교명: <input type="text" class="form-02" size="30" name="name" value="<?php echo $row['name']?>"> 
                                </td>
                                <td>
                                    설립일 <input type="date" class="form-02" value="<?php echo $row['est']?>" min="1900-01-01" max="2099-12-31" name="est">
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
                                <td>
                                    학교특성<br><select name="type">
                                                    <option value="일반고">일반고</option> 
                                                    <option value="특성화고">특성화고</option> 
                                                    <option value="특목고">특목고</option>
                                                    <option value="자율고">자율고</option>
                                                    <option value="영재학교">영재학교</option>
                                                </select> 
                                </td>
                            </tr>
                            <tr>
                            <td rowspan="4">
                                <table border="0">
                                    <tr>
                                        <td align="left">
                                            우편번호 : <input type="text" class="form-02" name="zip" style="width:80px; height:26px;" readonly value="<?php echo $row['zip']?>">
                                        </td>
                                        <td align="right">
                                            <button type="button" class="btn-insert" style="width:60px; height:32px; font-size: 12px;" onclick="openZipSearch()">검색</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="150px">
                                            주소 <input type="text" class="form-02" name="addr1" style="width:300px; height:30px;" readonly value="<?php echo $row['addr1']?>"><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            상세 <input type="text" class="form-02" name="addr2" style="width:300px; height:30px;" value="<?php echo $row['addr2']?>"><br>
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </table>
                            </td>
                            <td rowspan="4" align="center" width="50" style="margin: 0;">
                                <div class="body">
                                    <button type="button" class="btn-insert" onclick="location.href='/academy/student'" style="height: 30px; width: 75px; margin : 0px; font-size: 13px;">뒤로가기</button>
                                    <input type="submit" class="btn-insert" value="수정하기" style="height: 75px; width: 75px; margin: 15px 0px 0px 0px; font-size: 13px;"><br>
                                    <button type="button" class="btn-insert" onclick="location.href='high_delete.php?id=<?php echo $id ?>'" style="height: 30px; width: 75px; margin : 0px; font-size: 13px;">삭제</button>

                                    
                                    
                                </div>
                            </td>


                            </tr>


                                
                                

                
                
                
                        </table>
                    </form>



            <div id="noter">
              <div class="notebox">Copyright 2021. JUYONGLee. All rights reserved.</div>
            </div>
        </div>

        
        <script>
        document.update.office_edu.value="<?php echo $row['office_edu']?>"
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


