<?php
include "../school_db_info.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>학생정보 관리</title>
    <script src="index.js"></script>
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
    <div style="height: 150px; width: 1700px; margin-left: 30px; margin-top: 30px; float: left;">

        <!-- 입력창 -->
        <div class="box insert_box" style="height: 100%; width: 1200px; float: left;">
            <form name="stu_insert" action="insert_action.php" method="post" id="student">
                <table border="0" align="center">
                    <tr>
                        <td>
                            학&nbsp;&nbsp;&nbsp;&nbsp;번: <input type="text" class="form_field" size="8" name="stuid">
                            <br>성&nbsp;&nbsp;&nbsp;&nbsp;명: <input type="text" class="form_field" size="8" name="name">
                            <br>중&nbsp;학&nbsp;교  : <input type="text" class="form_field" size="15" name="mid_sch">
                            <br>고등학교: <input type="text" class="form_field" size="15" name="high_sch">
                            <br>학과 : <input type="text" class="form_field" size="15" name="dept">
                        </td>
                        <td align="left" style="padding-left: 80px; padding-right: 50px;">
                            성별 : <input type="radio" name="gender" value="남성" checked="checked">남
                            <input type="radio" name="gender" value="여성">여
                            <br>
                            <br>생년월일 : <input type="date" class="form_field" value="2008-01-01" min="2000-01-01" max="2021-12-31" name="birth">
                            <!-- <br>교실 : <input type="text" class="form_field" size="15" name="class"> -->
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
                            <button type="submit" form="student" class="button" style="width: 80px; height: 80px; font-size: 11px;" onclick="return check_insert()">입력하기</button>
                        </td>

                    </tr>

                </table>
            </form>
        </div>

        <!-- 작성 규칙 -->
        <div class="box" style="height: 220px; width: 450px; float: right;">
            <table border="0" align="center">
                <tr align="center">
                    <td>
                        작성 규칙
                    </td>
                </tr>
                <tr>
                    <td>
                        1. 학번은 최대 5자의 숫자로만 구성하며 동일할 수 없음
                    </td>
                </tr>
                <tr>
                    <td>
                        2. 중학교, 고등학교는 각 테이블에 등재된 학교명을 사용해야함
                    </td>
                </tr>
                <tr>
                    <td>
                        3. 생년월일은 2000년부터 2021년까지 입력 가능
                    </td>
                </tr>
                <tr>
                    <td>
                        4. 학번, 성명, 중학교, 고등학교는 필수입력 항목임
                    </td>
                </tr>
            </table>
        </div>

        <!-- 검색기능 / 인덱스 버튼 -->
        <div style="height: 50px; width: 1200px; margin-top: 20px; float: left;">
            <div class="box" style="height: 100%; width: 69%; float: left;">
                <table border="0">
                    <tr>
                        <td>
                            <form action="index.php" method="post" id="searchStudent">
                                <?php
                                $sch = $_POST['sch'];
                                ?>
                                학교명:
                                <select name="sch" class="form_field" style="width: 200px;">
                                    <option value="">학교 선택</option>
                                    <?php
                                    $high_name_sql="select a.high_sch from student a, high_sch b where a.high_sch = b.name group by a.high_sch order by a.high_sch asc;";
                                    $high_name_result = mysqli_query($con, $high_name_sql);
                                    while($high_name = mysqli_fetch_array($high_name_result)){
                                        ?>
                                        <option value="<?=$high_name['high_sch'];?>"><?=$high_name['high_sch'];?></option>
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
        <div class="db_box" style="width: 1200px; margin-top: 20px; float: left;">
            <table border="0" align="center" style="width: 99%; border-collapse: collapse;">
                <tr align="center">
                    <td width='3%'>No</td>
                    <td width='9%'>학번</td>
                    <td width='7%'>성명</td>
                    <td width='4%'>성별</td>
                    <td width='9%'>생년월일</td>
                    <td width='15%'>중학교</td>
                    <td width='22%'>고등학교<br />학과</td>
                    <td width='25%'>주소</td>
                    <td width='5%'></td>
                </tr>
            </table>

        </div>

        <!-- DB내용 -->
        <div class="db_box" style="width: 1200px; margin-top: 20px; float: left;">
            <table border="0" align="center" style="width: 99%;">
                <?php
                $sql = "select * from student ";
                if($sch != "" && $sch != null){
                $sql .= "where high_sch ='".$sch."';";
                }else{
                $sql .= "order by stuid;";
                }
                $result = mysqli_query($con, $sql);

                $count = 1; // 출력하기의 번호
                // 데이터베이스 데이터 출력 시작
                while($row = mysqli_fetch_array($result))
                {

                $id = $row['stuid'];


                echo ("
                <tr align='center'>
                    <td width='3%' class='table_cont'> $count </td>
                    <td width='9%' class='table_cont'> $row[stuid] </td>
                    <td width='7%' class='table_cont'> $row[name] </td>
                    <td width='4%' class='table_cont'> $row[gender] </td>
                    <td width='9%' class='table_cont'> $row[birth] </td>
                    <td width='15%' class='table_cont'> $row[mid_sch] </td>
                    <td width='22%' class='table_cont'> $row[high_sch] <br /> $row[dept] </td>
                    <td width='25%' class='table_cont'> $row[addr1] <br /> $row[addr2] </td>
                    <td width='5%'><a href='student_update.php?stuid=$id'>[수정]</a></td>
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
