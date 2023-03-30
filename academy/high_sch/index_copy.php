<?php
include "../school_db_info.php";
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>고등학교 정보</title>
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <script src="check.js"></script>
    </head>
    <body>
    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
        <div id="post">
            <div id="pnav">
              고교 정보 입력
              <img class="pbuttons" src="../quit.png">
              <img class="pbuttons" src="../full.png">
              <img class="pbuttons" src="../mini.png">
            </div>

                <form name="high_insert" action="insert_action.php" method='post'>
                    <table border="0" align="center" width="895px">
                        <tr>
                            <td width="180px">
                            
                                    학교명 : <input type="text" class="form-02" size="16" id="name" name="name">  
                                <br><br>설립유형 : <select name="founder">
                                                    <option value="국립">국립</option> 
                                                    <option value="공립">공립</option> 
                                                    <option value="사립">사립</option>
                                                </select>
                                <br><br>학교특성 : <select name="type">
                                                    <option value="일반고">일반고</option> 
                                                    <option value="특성화고">특성화고</option> 
                                                    <option value="특목고">특목고</option>
                                                    <option value="자율고">자율고</option>
                                                    <option value="영재학교">영재학교</option>
                                                </select>   
                            </td>
        
                            <td width="230px" align="left">
                                성별 : <input type="radio" name="gender" value="남성">남성
                                       <input type="radio" name="gender" value="여성">여성
                                       <input type="radio" name="gender" value="공학" checked="checked" >공학
                                <br>
                                <br>설립일 : <input type="date" class="form-02" value="2021-01-01" min="1900-01-01" max="2099-12-31" name="est">
                                <br><br>관할 교육청 : <select name="office_edu">
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

                            <td width="340px">

                                <table border="0" align="center">
                                    <tr>
                                        <td width="200" align="left">
                                            우편번호 : <input type="text" class="form-02" name="Hzip" style="width:80px; height:26px;" readonly>
                                        </td>
                                        <td align="right">
                                            <button type="button" class="btn-insert" style="width:60px; height:32px; font-size: 12px;" onclick="HopenZipSearch()">검색</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="150px">
                                            주소 : <input type="text" class="form-02" name="Haddr1" style="width:300px; height:30px;" readonly><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            상세 : <input type="text" class="form-02" name="Haddr2" style="width:300px; height:30px;"><br>
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </table>

                            </td>

                            <td align="left" width="50" style="margin: 0;">
                                <div class="body">
                                    <input type="submit" class="btn-insert" value="입력하기" style="height: 75px; width: 75px; margin: 40px 0px 0px 0px; font-size: 13px;" onclick="return check_insert()">   
                                </div>
                            </td>
                            
                        </tr>
            
            
            
                        
                    </table>
                </form>



            <div id="noter">
              <div class="notebox">Copyright 2021. JUYONGLee. All rights reserved.</div>
            </div>
        </div>


        <p align="center">
            <a href="?mode=office">[교육청별 정렬]</a>
            <a href="?mode=founder">[설립유형별 출력]</a>
            <a href=".">[입력순 출력]</a>
        </p>
        <br> 

        <div id="post">
            <div id="pnav">
              고교 정보 출력
              <img class="pbuttons" src="../quit.png">
              <img class="pbuttons" src="../full.png">
              <img class="pbuttons" src="../mini.png">
            </div>
            
            <table border=1" align="center" id="show" style="margin: 2px 4px 0px 2px; ">
                <tr align="center">
                <td width="30px">No</td>
                <td width="150px">학교명</td>
                <td width="60px">설립유형</td>
                <td width="80px">학교특성</td>
                <td width="50px">성별</td>
                <td width="100px">설립일</td>
                <td width="130px">관할 교육청</td>                
                <td width="250px">주소</td>
                <td width="70px"></td>
                </tr>
                

                <!-- 제목 표시 끝 -->

                <?php
                
                if($_GET['mode'] == "office"){
                    $sql = "select * from high_sch order by office_edu;";
                }else if($_GET['mode'] == "founder"){
                    $sql = "select * from high_sch order by founder;";
                }
                else{
                    $sql = "select * from high_sch;";
                }

                
                $result = mysqli_query($con, $sql);

                $count = 1; // 출력하기의 번호
                // 데이터베이스 데이터 출력 시작
                while($row = mysqli_fetch_array($result))
                {

                    $id = $row['id'];


                    echo ("<tr align='center'>
                    <td> $count </td>
                    <td> $row[name] </td>
                    <td> $row[founder] </td>
                    <td> $row[type] </td>
                    <td> $row[gender] </td>
                    <td> $row[est] </td>
                    <td> $row[office_edu] </td>
                    <td> $row[addr1]<br>$row[addr2] </td>
                    <td><a href='high_update.php?id=$id'>[수정]</a></td>

                    </tr>
                    ");

                    $count++;
                }
                mysqli_close($con);
                ?>

            </table>    

        </div>

        <br>
        <table align="center">
            <tr>
                <td>
                    <button type="button" class="btn-insert" style="width: 60px; height: 32px; " onclick="location.href='../'">인덱스</button>
                </td>
            </tr>
        </table>
        <script>
            function HopenZipSearch() {
                new daum.Postcode({
                    oncomplete: function(data) {
                        $('[name=Hzip]').val(data.zonecode); // 우편번호 (5자리)
                        $('[name=Haddr1]').val(data.address);
                        $('[name=Haddr2]').val(data.buildingName);
                    }
                }).open();
            }
        </script>
    </body>
</html>
