<?php
include "../school_db_info.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>수능성적 관리</title>
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
    <div style="height: 500px; width: 1500px; margin-left: 30px; margin-top: 30px;">


        <div style="height: 100%; width: 392px; float:left;">

            <!-- 입력창 -->
            <div class="box insert_box" style="height: 45%; width: 100%;">
                <form name="score_insert" action="score_insert.php" method="post" id="stu_score">
                    <table border="0" align="center" style="border-collapse: collapse;" width="300">
                        <tr align="left" style="height: 35px;">
                            <td colspan="2">
                                번호 : <input type="text" class="form_field" size="6" maxlength="11" name="id" id="id">
                            </td>
                        </tr>
                        <tr style="height: 35px;">
                            <td>
                                국어 : <input type="text" class="form_field" size="3" name="kor" id="kor" onchange='scoreup()'>
                            </td>
                            <td>
                                수학 : <input type="text" class="form_field" size="3" name="math" id="math" onchange='scoreup()'>
                            </td>
                        </tr>
                        <tr style="height: 35px;">
                            <td>
                                영어 : <input type="text" class="form_field" size="3" name="eng" id="eng" onchange='scoreup()'>
                            </td>
                            <td>
                                한국사 : <input type="text" class="form_field" size="3" name="kor_history" id="kor_history" onchange='scoreup()'>
                            </td>
                        </tr>
                        <tr style="height: 35px;">
                            <td>
                                탐구1 : <input type="text" class="form_field" size="3" name="sub1" id="sub1" onchange='scoreup()'>
                            </td>
                            <td>
                                탐구2 : <input type="text" class="form_field" size="3" name="sub2" id="sub2" onchange='scoreup()'>
                            </td>
                        </tr>
                        <tr align="left" style="width: 100%; height: 50px;">
                            <td>
                                <button type="submit" form="stu_score" class="button" style="width: 99%; height: 40px; float: left;" onclick="return check_insert()">입력하기</button>
                            </td>
                            <td style="padding-left: 20px;">
                                평균 : <a id="result"></a>
                            </td>
                        </tr>
                    </table>
                </form>
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

            <!-- 정렬기능 -->
            <div class="box" style="height: 95%; width: 100%; margin-top: 20px">
                <table border="0">
                    <?php
                        $std_sql = "select round(std(kor),1) kor, round(std(math),1) math, round(std(eng),1) eng, round(std(kor_history),1) kor_history, round(std(sub1),1) sub1, round(std(sub2),1) sub2 from korean_sat;";
                        $std = mysqli_fetch_array(mysqli_query($con, $std_sql));

                        $avg_sql = "select round(avg(kor),2) kor, round(avg(math),2) math, round(avg(eng),2) eng, round(avg(kor_history),2) kor_history, round(avg(sub1),2) sub1, round(avg(sub2),2) sub2 from korean_sat;";
                        $avg = mysqli_fetch_array(mysqli_query($con, $avg_sql));


                        
                    ?>
                    <tr>
                        <td height="30" style="padding-right: 90px;">
                            표준편차
                        </td>
                        <td>
                            원점수 평균
                        </td>
                    </tr>
                    <tr>
                        <td>
                            국어: <?=$std['kor']?>
                            <br>수학: <?=$std['math']?>
                            <br>영어: <?=$std['eng']?>
                            <br>한국사: <?=$std['kor_history']?>
                            <br>탐구1: <?=$std['sub1']?>
                            <br>탐구2: <?=$std['sub2']?>
                        </td>
                        <td>
                            국어: <?=$avg['kor']?>
                            <br>수학: <?=$avg['math']?>
                            <br>영어: <?=$avg['eng']?>
                            <br>한국사: <?=$avg['kor_history']?>
                            <br>탐구1: <?=$avg['sub1']?>
                            <br>탐구2: <?=$avg['sub2']?>
                        </td>
                    </tr>
                    <tr>
                        <td height="30">
                            영어 등급별 인원
                        </td>
                        <td>
                            한국사 등급별 인원
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                $eng_sql = "select
                                case when eng >= '90' then '1'
                                        when eng >= '80' then '2'
                                        when eng >= '70' then '3'
                                        when eng >= '60' then '4'
                                        when eng >= '50' then '5'
                                        when eng >= '40' then '6'
                                        when eng >= '30' then '7'
                                        when eng >= '20' then '8'
                                        when eng < '20' then '9'
                                        end 영어등급,
                                count(*) eng_head
                            from korean_sat a group by 영어등급 order by 영어등급 asc;";
                                $eng_result = mysqli_query($con, $eng_sql);
                                while($eng_row = mysqli_fetch_array($eng_result)){
                                    ?>
                                        <?=$eng_row['영어등급'].'등급'?>: <?=$eng_row['eng_head'].'명 <br>'?>
                                    <?php
                                }
                            ?>
                        </td>
                        <td>
                        <?php
                                $his_sql = "select
                                case when kor_history >= '40' then '1'
                                     when kor_history >= '35' then '2'
                                     when kor_history >= '30' then '3'
                                     when kor_history >= '25' then '4'
                                     when kor_history >= '20' then '5'
                                     when kor_history >= '15' then '6'
                                     when kor_history >= '10' then '7'
                                     when kor_history >= '5' then '8'
                                     when kor_history < '5' then '9'
                                     end 국사등급,
                             count(*) his_head
                         from korean_sat a group by 국사등급 order by 국사등급 asc;";
                                $his_result = mysqli_query($con, $his_sql);
                                while($his_row = mysqli_fetch_array($his_result)){
                                    ?>
                                        <?=$his_row['국사등급'].'등급'?>: <?=$his_row['his_head'].'명 <br>'?>
                                    <?php
                                }
                            ?>
                        </td>
                    </tr>
                </table>
            </div>

        </div>

        <!-- 컬럼명 -->
        <div class="box" style="width: 72.5%; float: right;">
            <table border="1" align="center" style="width: 100%;">
                <tr align="center" height="40px">
                    <td width='3%'>No</td>
                    <td width='4%'><a href="?mode=id">번호</a></td>
                    <td width='6%'>성명</td>
                    <td width='7%'><a href="?mode=kor_std">국어 표준점수</a><br><a href="?mode=kor_perc">국어 백분위</a></td>
                    <td width='7%'><a href="?mode=math_std">수학 표준점수</a><br><a href="?mode=kor_perc">수학 백분위</a></td>
                    <td width='7%'><a href="?mode=sub1_std">탐구1 표준점수</a><br><a href="?mode=sub1_perc">탐구1 백분위</a></td>
                    <td width='7%'><a href="?mode=sub2_std">탐구2 표준점수</a><br><a href="?mode=sub2_std">탐구2 백분위</a></td>
                    <td width='7%'><a href="?mode=sub_std">탐구 백분위</a><br>등급</td>
                    <td width='3%'>영어<br>등급</td>
                    <td width='3%'>한국사<br>등급</td>
                    <td width='3%'><a href="?mode=avg">백분위</a></td>
                    <td width='5%'></td>
                </tr>
            </table>
        </div>

        <!-- DB내용 -->
        <div class="db_box" style="width: 72.5%; margin-top: 10px; float: right;">
            <table border="1" align="center" style="width: 100%;">
                <?php
                include "../school_db_info.php";

                $stuid = $row['id'];
                
                $sql = "select id, name,
                round((20*((kor - (select avg(kor) from korean_sat) ) / (select std(kor) from korean_sat))+100),0)국어표점,
                round((100 - ( ( (select count(kor)+1 from korean_sat where kor > a.kor) / (select count(kor) from korean_sat) ) * 100)), 2) 국어,
                round((20*((math - (select avg(math) from korean_sat) ) / (select std(math) from korean_sat))+100),0)수학표점,
                round((100 - ( ( (select count(math)+1 from korean_sat where math > a.math) / (select count(math) from korean_sat) ) * 100)), 2) 수학,
                round((10*((sub1 - (select avg(sub1) from korean_sat) ) / (select std(sub1) from korean_sat))+50),0)탐구1표점,
                round((100 - ( ( (select count(sub1)+1 from korean_sat where sub1 > a.sub1) / (select count(sub1) from korean_sat) ) * 100)), 2) 탐구1,
                round((10*((sub2 - (select avg(sub2) from korean_sat) ) / (select std(sub2) from korean_sat))+50),0)탐구2표점,
                round((100 - ( ( (select count(sub2)+1 from korean_sat where sub2 > a.sub2) / (select count(sub2) from korean_sat) ) * 100)), 2) 탐구2,
                round((100-((select count(*)+1 from korean_sat where (sub1+sub2) > (a.sub1+a.sub2)) / (select count(*) from korean_sat)) * 100),2)탐구백분위,
                case when (((select count(*)+1 from korean_sat where (sub1+sub2) > (a.sub1+a.sub2)) / (select count(*) from korean_sat)) * 100) <= '4' then '1'
                when (((select count(*)+1 from korean_sat where (sub1+sub2) > (a.sub1+a.sub2)) / (select count(*) from korean_sat)) * 100) <= '11' then '2'
                when (((select count(*)+1 from korean_sat where (sub1+sub2) > (a.sub1+a.sub2)) / (select count(*) from korean_sat)) * 100) <= '23' then '3'
                when (((select count(*)+1 from korean_sat where (sub1+sub2) > (a.sub1+a.sub2)) / (select count(*) from korean_sat)) * 100) <= '40' then '4'
                when (((select count(*)+1 from korean_sat where (sub1+sub2) > (a.sub1+a.sub2)) / (select count(*) from korean_sat)) * 100) <= '60' then '5'
                when (((select count(*)+1 from korean_sat where (sub1+sub2) > (a.sub1+a.sub2)) / (select count(*) from korean_sat)) * 100) <= '77' then '6'
                when (((select count(*)+1 from korean_sat where (sub1+sub2) > (a.sub1+a.sub2)) / (select count(*) from korean_sat)) * 100) <= '89' then '7'
                when (((select count(*)+1 from korean_sat where (sub1+sub2) > (a.sub1+a.sub2)) / (select count(*) from korean_sat)) * 100) <= '96' then '8'
                when (((select count(*)+1 from korean_sat where (sub1+sub2) > (a.sub1+a.sub2)) / (select count(*) from korean_sat)) * 100) <= '100' then '9'
                end 탐구등급,
                case when eng >= '90' then '1'
                            when eng >= '80' then '2'
                            when eng >= '70' then '3'
                            when eng >= '60' then '4'
                            when eng >= '50' then '5'
                            when eng >= '40' then '6'
                            when eng >= '30' then '7'
                            when eng >= '20' then '8'
                            when eng < '20' then '9'
                            end 영어등급,
                       case when kor_history >= '40' then '1'
                            when kor_history >= '35' then '2'
                            when kor_history >= '30' then '3'
                            when kor_history >= '25' then '4'
                            when kor_history >= '20' then '5'
                            when kor_history >= '15' then '6'
                            when kor_history >= '10' then '7'
                            when kor_history >= '5' then '8'
                            when kor_history < '5' then '9'
                            end 국사등급,
                round((100 - ( ( (select count(*)+1 from korean_sat where kor+math+eng+kor_history+sub1+sub2 > a.kor+a.math+a.eng+a.kor_history+a.sub1+a.sub2) / (select count(*) from korean_sat) ) * 100)), 2) 전체백분위
                from korean_sat a group by id ";

                if($_GET['mode'] == "kor_std"){
                    $sql .= "order by 국어표점 desc";
                }
                else if($_GET['mode'] == "kor_perc"){
                    $sql .= "order by 국어 desc";

                }
                else if($_GET['mode'] == "math_std"){
                    $sql .= "order by 수학표점 desc";
                }
                else if($_GET['mode'] == "math_perc"){
                    $sql .= "order by 수학 desc";

                }
                else if($_GET['mode'] == "sub1_std"){
                    $sql .= "order by 탐구1표점 desc";
                }
                else if($_GET['mode'] == "sub1_perc"){
                    $sql .= "order by 탐구1 desc";

                }
                else if($_GET['mode'] == "sub2_std"){
                    $sql .= "order by 탐구2표점 desc";
                }
                else if($_GET['mode'] == "sub_std"){
                    $sql .= "order by 탐구백분위 desc";
                }
                else if($_GET['mode'] == "sub2_perc"){
                    $sql .= "order by 탐구2 desc";

                }
                else if($_GET['mode'] == "avg"){
                    $sql .= "order by 전체백분위 desc";
                }
                else if($_GET['mode'] == "id"){
                    $sql .= "order by id asc";
                }
                else{
                    $sql .= "order by id asc";
                }
                

                $result = mysqli_query($con, $sql);


                $count = 1;

                while($row = mysqli_fetch_array($result))
                {
                    $sum = round($row['sum'],2);
                    $avg = round($row['avg'],2);

                    $id = $row['id'];

                    echo ("
                    <tr align='center' height='35'>
                        <td width='3%' class='table_cont'>$count</td>
                        <td width='4%' class='table_cont'>$row[id]</td>
                        <td width='6%' class='table_cont'>$row[name]</td>
                        <td width='7%' class='table_cont'><a style='color: tomato;'>$row[국어표점]</a><br>$row[국어]</td>
                        <td width='7%' class='table_cont'><a style='color: tomato;'>$row[수학표점]</a><br>$row[수학]</td>
                        <td width='7%' class='table_cont'><a style='color: tomato;'>$row[탐구1표점]</a><br>$row[탐구1]</td>
                        <td width='7%' class='table_cont'><a style='color: tomato;'>$row[탐구2표점]</a><br>$row[탐구2]</td>
                        <td width='7%' class='table_cont'><a style='color: tomato;'>$row[탐구백분위]</a><br>$row[탐구등급]</td>
                        <td width='3%' class='table_cont'>$row[영어등급]</td>
                        <td width='3%' class='table_cont'>$row[국사등급]</td>
                        <td width='3%' class='table_cont'><a style='color: red;'>$row[전체백분위]</a></td>
                        <td width='5%'><a href='score_update.php?id=$id'>[수정]</a></td>
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
