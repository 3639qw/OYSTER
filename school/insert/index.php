<?php
include "../school_db_info.php";
?>
<html>
    <head>
        <title>학적사항 입력</title>
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <!-- <script src="index.js"></script> -->
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
        <div id="post">
            <div id="pnav">
              학생정보 입력
              <img class="pbuttons" src="../quit.png">
              <img class="pbuttons" src="../full.png">
              <img class="pbuttons" src="../mini.png">
            </div>

                <form name="stu_insert" action="../student/insert_action.php" method='post'>
                    <table border="0" align="center">
                        <tr>
                            <td width="190">
                            
                                    학&nbsp;&nbsp;&nbsp;&nbsp;번: <input type="text" class="form-02" size="6" name="stuid">  
                                <br>이&nbsp;&nbsp;&nbsp;&nbsp;름: <input type="text" class="form-02" size="6" name="name"> 
                                <br>중&nbsp;학&nbsp;교  : <input type="text" class="form-02" size="9" name="mid_sch"><input type="checkbox" name="checkmid" value="isMid" onClick="checkDisable(this.form)">중딩
                                <br>고등학교: <input type="text" class="form-02" size="17" name="high_sch">
                                <br>학과 : <input type="text" class="form-02" size="15" name="dept">
                            </td>
        
                            <td width="200" align="left">
                                성별 : <input type="radio" name="gender" value="남성" checked="checked">남
                                       <input type="radio" name="gender" value="여성">여
                                <br>
                                <br>생년월일 : <input type="date" class="form-02" value="2008-01-01" min="2003-01-01" max="2008-12-31" name="birth">
                                
                                
                             </td>

                            <td>

                                <table>
                                    <tr>
                                        <td width="200" align="left">
                                            우편번호 : <input type="text" class="form-02" name="Pzip" style="width:80px; height:26px;" readonly>
                                        </td>
                                        <td align="right">
                                            <button type="button" class="btn-insert" style="width:60px; height:32px; font-size: 12px;" onclick="PopenZipSearch()">검색</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="150px">
                                            주소 : <input type="text" class="form-02" name="Paddr1" style="width:300px; height:30px;" readonly><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            상세 : <input type="text" class="form-02" name="Paddr2" style="width:300px; height:30px;"><br>
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </table>

                            </td>

                            <td align="center" width="50" style="margin: 0;">
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
        <br>

        <div id="post">
            <div id="pnav">
              학생성적 입력
              <img class="pbuttons" src="../quit.png">
              <img class="pbuttons" src="../full.png">
              <img class="pbuttons" src="../mini.png">
            </div>

                <form action="../scorelist/score_insert.php" method='post'>
                    <table align="center" border="0" cellpadding="5">
                        <tr align="center">
                            <td width="100">
                                <!-- 이름 : <input type="text" size="3" name="name">&nbsp; -->
                                <br>학번 : <input type="text" size="3" name="stuid">&nbsp;    
                            </td>
                            <td width="100">
                                수학 : <input type="text" size="3" name="sub1" style="margin: 5px 0px;">&nbsp;
                                <br>국어 : <input type="text" size="3" name="sub2" style="margin: 5px 0px;">&nbsp;
                            </td>
                            <td width="100">
                                영어 : <input type="text" size="3" name="sub3" style="margin: 5px 0px;">&nbsp;
                                <br>과학 : <input type="text" size="3" name="sub4" style="margin: 5px 0px;">&nbsp;
                            </td>
                            <td width="100">
                                사회 : <input type="text" size="3" name="sub5" style="margin: 5px 0px;">&nbsp;
                                <br>정보 : <input type="text" size="3" name="sub6" style="margin: 5px 0px;">&nbsp;
                                <br>
                            </td>
                            <td align="center" width="50">
                                <input type="submit" class="btn-insert" value="입력하기" style="height: 65px; width: 65px;">
                            </td>
                        </tr>
                    </table>
                </form>



            <div id="noter">
              <div class="notebox">Copyright 2021. JUYONGLee. All rights reserved.</div>
            </div>
        </div>
        <br>

        <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
        <div id="post">
            <div id="pnav">
              고교 정보 입력
              <img class="pbuttons" src="../quit.png">
              <img class="pbuttons" src="../full.png">
              <img class="pbuttons" src="../mini.png">
            </div>

                <form action="../high_sch/high_insert.php" method='post'>
                    <table border="0" align="center" width="895px">
                        <tr>
                            <td width="180px">
                            
                                    학교명 : <input type="text" class="form-02" size="16" name="name">  
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
                                    <input type="submit" class="btn-insert" value="입력하기" style="height: 75px; width: 75px; margin: 40px 0px 0px 0px; font-size: 13px;">   
                                </div>
                            </td>
                            
                        </tr>
            
            
            
                        
                    </table>
                </form>



            <div id="noter">
              <div class="notebox">Copyright 2021. JUYONGLee. All rights reserved.</div>
            </div>
        </div>
        <br>

        <div id="post">
            <div id="pnav">
              중학교 정보 입력
              <img class="pbuttons" src="../quit.png">
              <img class="pbuttons" src="../full.png">
              <img class="pbuttons" src="../mini.png">
            </div>

                <form action="../mid_sch/mid_insert.php" method='post'>
                    <table border="0" align="center" width="895px">
                        <tr>
                            <td width="180px">
                            
                                    학교명 : <input type="text" class="form-02" size="16" name="name">  
                                <br><br>설립유형 : <select name="founder">
                                                    <option value="국립">국립</option> 
                                                    <option value="공립">공립</option> 
                                                    <option value="사립">사립</option>
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
                                            우편번호 : <input type="text" class="form-02" name="Mzip" style="width:80px; height:26px;" readonly>
                                        </td>
                                        <td align="right">
                                            <button type="button" class="btn-insert" style="width:60px; height:32px; font-size: 12px;" onclick="MopenZipSearch()">검색</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="150px">
                                            주소 : <input type="text" class="form-02" name="Maddr1" style="width:300px; height:30px;" readonly><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            상세 : <input type="text" class="form-02" name="Maddr2" style="width:300px; height:30px;"><br>
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </table>

                            </td>

                            <td align="left" width="50" style="margin: 0;">
                                <div class="body">
                                    <input type="submit" class="btn-insert" value="입력하기" style="height: 75px; width: 75px; margin: 40px 0px 0px 0px; font-size: 13px;">   
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
        function MopenZipSearch() {
            new daum.Postcode({
                oncomplete: function(data) {
                    $('[name=Mzip]').val(data.zonecode); // 우편번호 (5자리)
                    $('[name=Maddr1]').val(data.address);
                    $('[name=Maddr2]').val(data.buildingName);
                }
            }).open();
        }
        function HopenZipSearch() {
            new daum.Postcode({
                oncomplete: function(data) {
                    $('[name=Hzip]').val(data.zonecode); // 우편번호 (5자리)
                    $('[name=Haddr1]').val(data.address);
                    $('[name=Haddr2]').val(data.buildingName);
                }
            }).open();
        }
        function PopenZipSearch() {
            new daum.Postcode({
                oncomplete: function(data) {
                    $('[name=Pzip]').val(data.zonecode); // 우편번호 (5자리)
                    $('[name=Paddr1]').val(data.address);
                    $('[name=Paddr2]').val(data.buildingName);
                }
            }).open();
        }
        </script>
    </body>
</html>

