<?php
include "../school_db_info.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>학생성적 관리</title>
    <script src="check.js"></script>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
    <script>
        $(function(){
        $("#headerContent").load("/main_menu/main_header.html"); 
        });
        
        function scoreup_1st() {
            const sub1 = document.getElementById('sub1').value;
            const sub2 = document.getElementById('sub2').value;
            const sub3 = document.getElementById('sub3').value;
            const sub4 = document.getElementById('sub4').value;
            const sub5 = document.getElementById('sub5').value;
            let sum = (parseFloat(sub1) + parseFloat(sub2) + parseFloat(sub3) + parseFloat(sub4) + parseFloat(sub5)) / 5;
            let avg = Math.round(sum * 10) / 10;
            // let gpa;

            // if (avg >= 90) {
            //     gpa = 'A'
            // } else if (avg >= 80) {
            //     gpa = 'B'
            // } else if (avg >= 70) {
            //     gpa = 'C'
            // } else if (avg >= 60) {
            //     gpa = 'D'
            // } else if (avg < 60) {
            //     gpa = 'E'
            // } else {
            //     gpa = '';
            // }

            if (avg !== 'NaN') {
                document.getElementById("1st_result").innerText = avg;
                // document.getElementById("1st_gpa").innerText = gpa;
            }else{
                document.getElementById("1st_result").innerText = '';
                // document.getElementById("1st_gpa").innerText = '';
            }
        };

        function scoreup_2nd() {
            const sub1_2 = document.getElementById('sub1_2').value;
            const sub2_2 = document.getElementById('sub2_2').value;
            const sub3_2 = document.getElementById('sub3_2').value;
            const sub4_2 = document.getElementById('sub4_2').value;
            const sub5_2 = document.getElementById('sub5_2').value;
            let sum = (parseFloat(sub1_2) + parseFloat(sub2_2) + parseFloat(sub3_2) + parseFloat(sub4_2) + parseFloat(sub5_2)) / 5;
            sum = Math.round(sum * 10) / 10;
            // let gpa;

            // if (sum >= 90) {
            //     gpa = 'A'
            // } else if (sum >= 80) {
            //     gpa = 'B'
            // } else if (sum >= 70) {
            //     gpa = 'C'
            // } else if (sum >= 60) {
            //     gpa = 'D'
            // } else if (sum < 60) {
            //     gpa = 'E'
            // } else {
            //     gpa = '';
            // }

            if (sum !== 'NaN') {
                document.getElementById("2nd_result").innerText = sum;
                // document.getElementById("2nd_gpa").innerText = gpa;
            }else{
                document.getElementById("2nd_result").innerText = '';
                // document.getElementById("2nd_gpa").innerText = '';
            }
        };
    </script> 
</head>
<body>
    <div id="headerContent"></div>
    <div style="height: 500px; width: 1500px; margin-left: 30px; margin-top: 30px;">
        <div style="height: 100%; width: 392px; float:left;">

            <!-- 입력창 -->
            <div class="box insert_box" style="height: 77%; width: 100%;">
                <form name="score_insert" action="score_insert.php" method="post" id="stu_score">
                    <table border="0" align="center" style="border-collapse: collapse;" width="300">
                        <tr align="left" style="height: 35px;">
                            <td>
                                학번 : <input type="text" class="form_field" size="6" maxlength="11" name="stuid" id="stuid">
                            </td>
                            <td>
                                계열 : 
                                <select name="type" id="type" class="form_field" style="width: 60px;">
                                    <option value="1" checked>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                </select>
                            </td>
                        </tr>
                        <tr align="left">
                            <td colspan="2" style="padding-top: 5px; padding-bottom: 5px">
                            1학기    
                            </td>
                        </tr>
                        <tr style="height: 35px;">
                            <td>
                                국어 : <input type="text" class="form_field" size="3" name="sub1" id="sub1" onchange='scoreup_1st()'>
                            </td>
                            <td>
                                영어 : <input type="text" class="form_field" size="3" name="sub2" id="sub2" onchange='scoreup_1st()'>
                            </td>
                        </tr>
                        <tr style="height: 35px;">
                            <td>
                                수학 : <input type="text" class="form_field" size="3" name="sub3" id="sub3" onchange='scoreup_1st()'>
                            </td>
                            <td>
                                사회 : <input type="text" class="form_field" size="3" name="sub4" id="sub4" onchange='scoreup_1st()'>
                            </td>
                        </tr>
                        <tr style="height: 35px;">
                            <td>
                                과학 : <input type="text" class="form_field" size="3" name="sub5" id="sub5" onchange='scoreup_1st()'>
                            </td>
                            <td>
                                평균 : <a id="1st_result"></a>&nbsp;<a id="1st_gpa"></a>
                            </td>
                        </tr>
                        <tr align="left">
                            <td colspan="2" style="padding-top: 5px; padding-bottom: 5px">
                            2학기    
                            </td>
                        </tr>
                        <tr style="height: 35px;">
                            <td>
                                국어 : <input type="text" class="form_field" size="3" name="sub1_2" id="sub1_2" onchange='scoreup_2nd()'>
                            </td>
                            <td>
                                영어 : <input type="text" class="form_field" size="3" name="sub2_2" id="sub2_2" onchange='scoreup_2nd()'>
                            </td>
                        </tr>
                        <tr style="height: 35px;">
                            <td>
                                수학 : <input type="text" class="form_field" size="3" name="sub3_2" id="sub3_2" onchange='scoreup_2nd()'>
                            </td>
                            <td>
                                사회 : <input type="text" class="form_field" size="3" name="sub4_2" id="sub4_2" onchange='scoreup_2nd()'>
                            </td>
                        </tr>
                        <tr style="height: 35px;">
                            <td>
                                과학 : <input type="text" class="form_field" size="3" name="sub5_2" id="sub5_2" onchange='scoreup_2nd()'>
                            </td>
                            <td>
                                평균 : <a id="result"></a>&nbsp;<a id="result_gpa"></a>
                            </td>
                        </tr>
                        <tr align="left" style="width: 100%; height: 50px;">
                            <td>
                                <button type="submit" form="stu_score" class="button" style="width: 99%; height: 40px; float: left;" onclick="return check_insert()">입력하기</button>
                            </td>
                            <td style="padding-left: 20px;">
                                평균 : <a id="2nd_result"></a>&nbsp;<a id="2nd_result"></a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        
            <!-- 검색기능 -->
            <div class="box" style="height: 10%; width: 100%; margin-top: 20px">
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
                                        $high_name_sql="select b.high_sch from score a, student b where a.stuid = b.stuid group by b.high_sch order by b.high_sch asc;";
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

            <!-- 인덱스 -->
            <div class="item_box" onclick="location.href = '/academy'" style="height: 9%; width: 100%; margin-top: 20px; ">
                <table style="width: 100%; height: 100%;">
                    <tr align="center">
                        <td class="title">
                            ACADEMY
                        </td>
                    </tr>
                </table>
            </div>

            <!-- 성취도별 점수 -->
            <div class="box" style="height: 50%; width: 100%; margin-top: 20px;">
                <table border="0" style="height: 90%; width: 80%;">
                    <tr align="center" style="height: 15%;">
                        <td class="title" colspan="2" style="font-size: 17px;">
                            성취도별 점수
                        </td>
                    </tr>
                    <tr align="center">
                        <td>
                            A : 90.00 ~ 100
                        </td>
                    </tr>
                    <tr align="center">
                        <td>
                            B : 80.00 ~ 89.99
                        </td>
                    </tr>
                    <tr align="center">
                        <td>
                            C : 70.00 ~ 79.99
                        </td>
                    </tr>
                    <tr align="center">
                        <td>
                            D : 60.00 ~ 69.99
                        </td>
                    </tr>
                    <tr align="center">
                        <td>
                            E : 0.00 ~ 59.99
                        </td>
                    </tr>
                </table>
            </div>

            <!-- 작성 규칙 -->
            <div class="box" style="height: 23%; width: 100%; margin-top: 20px; ">
                <table border="0" align="center">
                    <tr align="center">
                        <td>
                            작성 규칙
                        </td>
                    </tr>
                    <tr>
                        <td>
                            1. 학번은 학번-학교이니셜 로 입력
                        </td>
                    </tr>
                    <tr>
                        <td>
                            2. 성적은 100점 만점기준으로 입력
                        </td>
                    </tr>
                </table>
            </div>

        </div>

        <!-- 컬럼명 -->
        <div class="box" style="width: 72.5%; float: right;">
            <table border="0" align="center" style="width: 100%;">
                <tr align="center" height="40px">
                    <td width='3%'>No</td>
                    <td width='10%'>학번</td>
                    <td width='20%'>학교</td>
                    <td width='8%'>성명</td>
                    <td width='4%'>국어</td>
                    <td width='4%'>영어</td>
                    <td width='4%'>수학</td>
                    <td width='4%'>사회</td>
                    <td width='4%'>과학</td>
                    <td width='4%'>평균</td>
                    <td width='5%'>1년 평균</td>
                    <td width='4%'>성취도</td>
                    <td width='4%'></td>
                </tr>
            </table>
        </div>

        <!-- DB내용 -->
        <div class="db_box" style="width: 72.5%; margin-top: 10px; float: right;">
            <table border="0" align="center" style="width: 100%;">
                <?php
                include "../school_db_info.php";
                
                $sql = "select a.stuid, b.high_sch, b.name, ";
                $sql .= "a.sub1,case when a.sub1 >= '95' then 'A+'
                        when a.sub1 >= '90' then 'A0'
                        when a.sub1 >= '85' then 'B+'
                        when a.sub1 >= '80' then 'B0'
                        when a.sub1 >= '75' then 'C+'
                        when a.sub1 >= '70' then 'C0'
                        when a.sub1 >= '65' then 'D+'
                        when a.sub1 >= '60' then 'D0'
                        when a.sub1 < '60' then 'F'
                        end KOREAN_GPA, ";
                $sql .= "a.sub2,case when a.sub2 >= '95' then 'A+'
                        when a.sub2 >= '90' then 'A0'
                        when a.sub2 >= '85' then 'B+'
                        when a.sub2 >= '80' then 'B0'
                        when a.sub2 >= '75' then 'C+'
                        when a.sub2 >= '70' then 'C0'
                        when a.sub2 >= '65' then 'D+'
                        when a.sub2 >= '60' then 'D0'
                        when a.sub2 < '60' then 'F'
                        end ENGLISH_GPA, ";
                $sql .= "a.sub3,case when a.sub3 >= '95' then 'A+'
                        when a.sub3 >= '90' then 'A0'
                        when a.sub3 >= '85' then 'B+'
                        when a.sub3 >= '80' then 'B0'
                        when a.sub3 >= '75' then 'C+'
                        when a.sub3 >= '70' then 'C0'
                        when a.sub3 >= '65' then 'D+'
                        when a.sub3 >= '60' then 'D0'
                        when a.sub3 < '60' then 'F'
                        end MATH_GPA, ";
                $sql .= "a.sub4,case when a.sub4 >= '95' then 'A+'
                        when a.sub4 >= '90' then 'A0'
                        when a.sub4 >= '85' then 'B+'
                        when a.sub4 >= '80' then 'B0'
                        when a.sub4 >= '75' then 'C+'
                        when a.sub4 >= '70' then 'C0'
                        when a.sub4 >= '65' then 'D+'
                        when a.sub4 >= '60' then 'D0'
                        when a.sub4 < '60' then 'F'
                        end SOCIAL_STUDY_GPA, ";
                $sql .= "a.sub5,case when a.sub5 >= '95' then 'A+'
                        when a.sub5 >= '90' then 'A0'
                        when a.sub5 >= '85' then 'B+'
                        when a.sub5 >= '80' then 'B0'
                        when a.sub5 >= '75' then 'C+'
                        when a.sub5 >= '70' then 'C0'
                        when a.sub5 >= '65' then 'D+'
                        when a.sub5 >= '60' then 'D0'
                        when a.sub5 < '60' then 'F'
                        end SCIENCE_GPA, ";
                $sql .= " a.sub1_2, a.sub2_2, a.sub3_2, a.sub4_2, a.sub5_2, ";
                $sql .= "(a.sub1+a.sub2+a.sub3+a.sub4+a.sub5) sum,
                         (a.sub1+a.sub2+a.sub3+a.sub4+a.sub5)/5 avg,
                            case when (a.sub1+a.sub2+a.sub3+a.sub4+a.sub5)/5 >= '90' then 'A'
                                when (a.sub1+a.sub2+a.sub3+a.sub4+a.sub5)/5 >= '80' then 'B'
                                when (a.sub1+a.sub2+a.sub3+a.sub4+a.sub5)/5 >= '70' then 'C'
                                when (a.sub1+a.sub2+a.sub3+a.sub4+a.sub5)/5 >= '60' then 'D'
                                when (a.sub1+a.sub2+a.sub3+a.sub4+a.sub5)/5 < '60' then 'E'
                                end GPA, ";
                $sql .= "
                (a.sub1_2+a.sub2_2+a.sub3_2+a.sub4_2+a.sub5_2) sum_2,
                ((a.sub1_2+a.sub2_2+a.sub3_2+a.sub4_2+a.sub5_2)/5) avg_2,
                case when (a.sub1_2+a.sub2_2+a.sub3_2+a.sub4_2+a.sub5_2)/5 >= '90' then 'A'
                    when (a.sub1_2+a.sub2_2+a.sub3_2+a.sub4_2+a.sub5_2)/5 >= '80' then 'B'
                    when (a.sub1_2+a.sub2_2+a.sub3_2+a.sub4_2+a.sub5_2)/5 >= '70' then 'C'
                    when (a.sub1_2+a.sub2_2+a.sub3_2+a.sub4_2+a.sub5_2)/5 >= '60' then 'D'
                    when (a.sub1_2+a.sub2_2+a.sub3_2+a.sub4_2+a.sub5_2)/5 < '60' then 'E'
                    end GPA_2,
                ((a.sub1+a.sub2+a.sub3+a.sub4+a.sub5+a.sub1_2+a.sub2_2+a.sub3_2+a.sub4_2+a.sub5_2)/10) year_avg 
                ";
                if($sch != "" && $sch != null){
                    // /*석차*/$sql .= "(select count(*)+1 from score sc, student st where sub1+sub2+sub3+sub4+sub5 > a.sub1+a.sub2+a.sub3+a.sub4+a.sub5 and sc.stuid = st.stuid and st.high_sch ='".$sch."')ranks, ";
                    // /*수강자수*/$sql .= "(select count(*) from score a, student b where a.stuid = b.stuid and b.high_sch ='".$sch."')sum, ";
                    // /*동석차수*/$sql .= "((select count(*) from score where sub1+sub2+sub3+sub4+sub5 = a.sub1+a.sub2+a.sub3+a.sub4+a.sub5)-1)same_rank ";
                    /*테이블 지정*/$sql .= "from score a, student b ";
                    /*where절 이후*/$sql .= "where a.stuid = b.stuid and b.high_sch ='".$sch."' order by year_avg desc;";
                }else{
                    // $sql .= "(select count(*)+1 from score where sub1+sub2+sub3+sub4+sub5 > a.sub1+a.sub2+a.sub3+a.sub4+a.sub5)ranks, ";
                    // $sql .= "(select count(*) from score)sum ";
                    // $sql .= "from score a, student b ";
                    // $sql .= " where a.stuid = b.stuid
                    //           order by ranks asc;";
                    $sql = "";
                }
                // echo $sql;
                $result = mysqli_query($con, $sql);

                $count = 1;
                if($sch != "" && $sch != null){
                    while($row = mysqli_fetch_array($result))
                    {
                        $sum = round($row['sum'],2);
                        $avg = round($row['avg'],2);
                        $avg2 = round($row['avg_2'],2);
                        $year_avg = round($row['year_avg'],2);

                        if($row[same_rank] == 0){
                            $row[same_rank] = '.';
                        }
    
                        $stuid = $row['stuid'];
    
                        echo ("<tr align='center' height='35'>
                        <td width='3%' class='table_cont'> $count </td>
                        <td width='10%' class='table_cont'> $row[stuid] </td>
                        <td width='20%' class='table_cont'> $row[high_sch] </td>
                        <td width='8%' class='table_cont'> $row[name] </td>
                        <td width='4%' class='table_cont'> $row[sub1]<br>$row[sub1_2] </td>
                        <td width='4%' class='table_cont'> $row[sub2]<br>$row[sub2_2] </td>
                        <td width='4%' class='table_cont'> $row[sub3]<br>$row[sub3_2] </td>
                        <td width='4%' class='table_cont'> $row[sub4]<br>$row[sub4_2] </td>
                        <td width='4%' class='table_cont'> $row[sub5]<br>$row[sub5_2] </td>
                        <td width='4%' class='table_cont'> $avg<br>$avg2 </td>
                        <td width='5%' class='table_cont'> $year_avg </td>
                        <td width='4%' class='table_cont'> $row[GPA]<br>$row[GPA_2] </td>
                        <td width='4%'><a href='score_update.php?stuid=$stuid'>[수정]</a></td>
                        </tr>
                        ");
    
                        $count++;
                    }
                }else{
                    echo"
                    <tr align='center' height='35'>
                        <td width='3%' class=''>학교를 선택하세요</td>
                    </tr>                
                    ";
                }
                mysqli_close($con);
                ?>
            </table>
        </div>

    </div>
    </body>
</html>
