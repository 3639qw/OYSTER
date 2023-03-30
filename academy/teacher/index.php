<?php
include "../school_db_info.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>교원 관리</title>
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


    <div style="height: 150px; width: 1600px; margin-left: 30px; margin-top: 30px;">

        <!-- 입력창 -->
        <div class="box insert_box" style="height: 100%; width: 1100px; font-weight: normal; float: left;">
            <form name="tea_insert" action="insert_action.php" method="post" id="teacher">
                <table border="0" align="center">
                    <tr>
                        <td>
                            교원번호: <input type="text" class="form_field" size="8" name="tid">
                            <br>성&nbsp;&nbsp;&nbsp;&nbsp;명: <input type="text" class="form_field" size="8" name="name">
                            <br>주 과목: <input type="text" class="form_field" size="15" name="sub">
                            <br>부 과목: <input type="text" class="form_field" size="15" name="sub2">
                            <br>소속학교     : <input type="text" class="form_field" size="15" name="sch">
                        </td>
                        <td align="left" style="padding-left: 90px; padding-right: 60px;">
                            성별 : <input type="radio" name="gender" value="남성" checked="checked">남
                            <input type="radio" name="gender" value="여성">여
                            <br>생년월일 : <input type="date" class="form_field" value="2008-01-01" min="1900-01-01" max="2099-12-31" name="birth">
                            <br>임용연월일 : <input type="date" class="form_field" value="2008-01-01" min="1900-01-01" max="2099-12-31" name="joindate">
                            <br>자격정보 :
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
                            <br>직위: 
                                    <select class="form_field" name="position">
                                        <option value="교사">교사</option>
                                        <option value="교장">교장</option>
                                        <option value="교감">교감</option>
                                    </select>
                        </td>
                        <td>
                            부서: <input type="text" class="form_field" size="10" name="dept">
                            <br>직책: <input type="text" class="form_field" size="10" name="title">
                            <br>호봉: <input type="text" class="form_field" size="10" name="step">

                        </td>
                        <td>
                            
                        </td>
                        <td style="padding-left: 30px;">
                            <button type="submit" form="teacher" class="button" style="width: 80px; height: 80px; font-size: 11px;" onclick="return check_insert()">입력하기</button>
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
                        1. 번호는 최대 5자의 숫자로만 구성하며 동일할 수 없음
                    </td>
                </tr>
                <tr>
                    <td>
                        2. 소속학교는 고등학교 테이블에 등재된 학교명을 사용해야함
                    </td>
                </tr>
            </table>
        </div>
        
        <!-- 검색기능 / 인덱스 버튼 -->
        <div style="height: 50px; width: 1100px; margin-top: 20px; float: left;">
            <div class="box" style="height: 100%; width: 69%; float: left;">
                <table border="0">
                    <tr>
                        <td>
                            <form action="index.php" method="post" id="searchSch">
                                <?php
                                $sch = $_POST['sch'];
                                ?>
                                학교명:
                                <select name="sch" class="form_field" style="width: 200px;">
                                    <option value="">학교 선택</option>
                                    <?php
                                    $high_name_sql="select a.sch from teacher a, high_sch b where a.sch = b.name group by a.sch order by a.sch asc;";
                                    $high_name_result = mysqli_query($con, $high_name_sql);
                                    while($high_name = mysqli_fetch_array($high_name_result)){
                                        ?>
                                        <option value="<?=$high_name['sch'];?>"><?=$high_name['sch'];?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <button type="submit" form="searchSch" class="button" style="margin-left: 10px; display: inline; width: 90px; height: 30px;">입력하기</button>
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
        <div class="db_box" style="width: 1100px; margin-top: 20px; float: left;">
            <table border="0" align="center" style="width: 99%; border-collapse: collapse;">
                <tr align="center">
                    <td width='3%'>번호</td>
                    <td width='7%'>교원 번호</td>
                    <td width='7%'>성명</td>
                    <td width='4%'>성별</td>
                    <td width='9%'>생년월일</td>
                    <td width='20%'>소속 학교<br>임용년월일</td>
                    <td width='20%'>주 과목<br>부 과목</td>
                    <td width='6%'>직위<br>자격정보</td>
                    <td width='14%'>소속 부서<br>직책</td>
                    <td width='4%'>호봉</td>
                    <td width='6%'></td>
                </tr>
            </table>

        </div>

        <!-- DB내용 -->
        <div class="db_box" style="width: 1100px; margin-top: 20px; float: left;">
            <table border="0" align="center" style="width: 99%;">
                <?php
                $sql = "select * from teacher ";
                if($sch != "" && $sch != null){
                    $sql .= "where sch ='".$sch."' order by name;";
                }else{
                    $sql .= "order by name;";
                }
                $result = mysqli_query($con, $sql);

                $count = 1;

                while($row = mysqli_fetch_array($result))
                {
                    $tid = $row['tid'];

                    echo ("<tr align='center'>
                    <td width='3%' height='35px' class='table_cont'> $count </td>
                    <td width='7%' class='table_cont'> $row[tid] </td>
                    <td width='7%' class='table_cont'> $row[name] </td>
                    <td width='4%' class='table_cont'> $row[gender] </td>
                    <td width='9%' class='table_cont'> $row[birth] </td>
                    <td width='20%' class='table_cont'> $row[sch]<br>$row[joindate]</td>
                    <td width='20%' class='table_cont'> $row[sub]<br>$row[sub2]</td>
                    <td width='6%' class='table_cont'> $row[position]<br>$row[lilevel]</td>
                    <td width='14%' class='table_cont'> $row[dept]<br>$row[title]</td>
                    <td width='4%' class='table_cont'> $row[step]</td>
                    <td width='6%'><a href='teacher_update.php?id=$tid'>[수정]</a></td>
                    </tr>
                    ");
                    $count++;
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
