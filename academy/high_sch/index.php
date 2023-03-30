<?php
include "../school_db_info.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>고등학교 정보</title>
    <script src="check.js"></script>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script>
        $(function(){
        $("#headerContent").load("/main_menu/main_header.html"); 
        });
    </script> 
</head>
<body>
    <div id="headerContent"></div>
    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<div style="height: 150px; width: 1800px; margin-left: 30px; margin-top: 30px; float: left;">

    <!-- 입력창 -->
    <div class="box insert_box" style="height: 100%; width: 1300px; float: left;">
        <form name="high_insert" action="insert_action.php" method="post" id="high_insert">
            <table border="0" align="center">
                <tr>
                    <td>
                        학교명 : <input type="text" class="form_field" size="20" id="name" name="name">
                        <br>이니셜 : <input type="text" class="form_field" size="3" id="initial" name="initial">
                        <br>설립유형 : <select class="form_field" name="founder">
                            <option value="국립">국립</option>
                            <option value="공립">공립</option>
                            <option value="사립">사립</option>
                        </select>
                        <br>학교특성 : <select class="form_field" name="type">
                            <option value="일반고">일반고</option>
                            <option value="특성화고">특성화고</option>
                            <option value="특목고">특목고</option>
                            <option value="자율고">자율고</option>
                            <option value="영재학교">영재학교</option>
                        </select>
                    </td>
                    <td align="left" style="padding-left: 70px; padding-right: 50px;">
                        성별 :
                        <input type="radio" name="gender" value="남성">남
                        <input type="radio" name="gender" value="여성">여
                        <input type="radio" name="gender" value="공학" checked="checked" >공학
                        <br>
                        <br>설립일 : <input type="date" class="form_field" value="2021-01-01" min="1900-01-01" max="2099-12-31" name="est">
                        <br>관할 교육청 : <select class="form_field" name="office_edu">
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
                    <td>
                        <table>
                            <tr>
                                <td width="200" align="left">
                                    우편번호 : <input type="text" class="form_field" name="zip" style="width:80px; height:26px;" readonly>
                                </td>
                                <td align="right">
                                    <button type="button" class="addrSearch" style="width:60px; height:32px; font-size: 12px;" onclick="openZipSearch()">검색</button>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" width="150px">
                                    주소 : <input type="text" class="form_field" name="addr1" style="width:300px; height:30px;" readonly><br>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    상세 : <input type="text" class="form_field" name="addr2" style="width:300px; height:30px;"><br>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="padding-left: 30px;">
                        <button type="submit" form="high_insert" class="button" style="width: 80px; height: 80px; font-size: 11px;" onclick="return check_insert()">입력하기</button>
                    </td>

                </tr>

            </table>
        </form>
    </div>

    <!-- 작성 규칙 -->
    <div class="box" style="height: 150px; width: 450px; float: right;">
        <table border="0" align="center">
            <tr align="center">
                <td>
                    작성 규칙
                </td>
            </tr>
            <tr>
                <td>
                    1. 이니셜은 5자이내 영문으로 구성
                </td>
            </tr>
            <tr>
                <td>
                    2. 학교명, 이니셜, 주소는 필수입력 항목임
                </td>
            </tr>
        </table>
    </div>

    <!-- 검색기능 / 인덱스 버튼 -->
    <div style="height: 50px; width: 1300px; margin-top: 20px; float: left;">
        <div class="box" style="height: 100%; width: 69%; float: left;">
            <table border="0">
                <tr>
                    <td>
                        <form action="index.php" method="post" id="searchStudent">
                            <?php
                            $office_edu = $_POST['office_edu'];
                            ?>
                            관할 교육청:
                            <select class="form_field" name="office_edu">
                                <option value="">교육청 선택</option>
                                <?php
                                $office_name_sql="select office_edu from high_sch group by office_edu order by office_edu asc;";
                                $office_name_result = mysqli_query($con, $office_name_sql);
                                while($office = mysqli_fetch_array($office_name_result)){
                                    ?>
                                    <option value="<?=$office['office_edu'];?>"><?=$office['office_edu'];?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <button type="submit" form="searchStudent" class="button" style="margin-left: 10px; display: inline; width: 90px; height: 30px;">입력하기</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <div class="item_box" onclick="location.href = '/academy'" style="height: 100%; width: 29%; float: right;">
            <table style="width: 100%; height: 100%;">
                <tr align="center">
                    <td class="title">
                        ACADEMY
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- 컬럼명 -->
    <div class="db_box" style="width: 1300px; margin-top: 20px; float: left;">
        <table border="0" align="center" style="width: 99%; border-collapse: collapse;">
            <tr align="center" height="40">
                <td width='3%'>No</td>
                <td width='22%'>학교명</td>
                <td width='5%'>이니셜</td>
                <td width='6%'>설립유형</td>
                <td width='6%'>학교특성</td>
                <td width='4%'>성별</td>
                <td width='9%'>설립일</td>
                <td width='14%'>관할 교육청</td>
                <td width='26%'>주소</td>
                <td width='5%'></td>
            </tr>
        </table>

    </div>

    <!-- DB내용 -->
    <div class="db_box" style="width: 1300px; margin-top: 20px; float: left;">
        <table border="0" align="center" style="width: 99%;">
            <?php
            $sql = "select * from high_sch ";
            if($office_edu != "" && $office_edu != null){
                $sql .= "where office_edu ='".$office_edu."';";
            }else{
                $sql .= "order by name;";
            }
            $result = mysqli_query($con, $sql);

            $count = 1; // 출력하기의 번호
            // 데이터베이스 데이터 출력 시작
            while($row = mysqli_fetch_array($result))
            {
                $id = $row['initial'];

                echo ("
                <tr align='center'>
                    <td width='3%' class='table_cont'> $count </td>
                    <td width='22%' class='table_cont'> $row[name] </td>
                    <td width='5%' class='table_cont'> $row[initial] </td>
                    <td width='6%' class='table_cont'> $row[founder] </td>
                    <td width='6%' class='table_cont'> $row[type] </td>
                    <td width='4%' class='table_cont'> $row[gender] </td>
                    <td width='9%' class='table_cont'> $row[est]</td>
                    <td width='14%' class='table_cont'> $row[office_edu]</td>
                    <td width='26%' class='table_cont'> $row[addr1] <br /> $row[addr2] </td>
                    <td width='5%'><a href='high_update.php?id=$id'>[수정]</a></td>
                </tr>
                ");
                $count++;
            }
            mysqli_close($con);
            ?>
        </table>
    </div>
</div>

</body>
</html>
