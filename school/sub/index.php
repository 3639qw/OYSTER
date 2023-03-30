<?php
include "../school_db_info.php";
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>학생성적통계</title>
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>


        <div id="post">
            <div id="pnav">
              학생정보 출력
              <img class="pbuttons" src="../quit.png">
              <img class="pbuttons" src="../full.png">
              <img class="pbuttons" src="../mini.png">
            </div>
            
            <table border=1" align="center" style="margin: 2px 4px 0px 2px; ">
                <tr align="center">
                <td width="30px">No</td>
                <td width="50px">학번</td>
                <td width="50px">성명</td>
                <td width="35px ">성별</td>
                <td width="80px">생년월일</td>
                <td width="240px">주소</td>
                <td width="100px">중학교</td>
                <td width="130px">고등학교</td>
                <td width="100px">학과</td>
                </tr>
                

                <!-- 제목 표시 끝 -->

                <?php
                
                
                $sql = "select * from student order by stuid;";
                
                $result = mysqli_query($con, $sql);

                $count = 1; // 출력하기의 번호
                // 데이터베이스 데이터 출력 시작
                while($row = mysqli_fetch_array($result))
                {

                    $stuid = $row['stuid'];


                    echo ("<tr align='center'>
                    <td> $count </td>
                    <td> $row[stuid] </td>
                    <td> $row[name] </td>
                    <td> $row[gender] </td>
                    <td> $row[birth] </td>
                    <td> $row[addr1]<br>$row[addr2] </td>
                    <td> $row[mid_sch] </td>
                    <td> $row[high_sch] </td>
                    <td> $row[dept] </td>
                    </tr>
                    ");

                    $count++;
                }
                mysqli_close($con);
                ?>

            </table>    

        </div>
        <br>
        <div id="post">
            <div id="pnav">
              성적
              <img class="pbuttons" src="../quit.png">
              <img class="pbuttons" src="../full.png">
              <img class="pbuttons" src="../mini.png">
            </div>
                <table width="795px" border="1" cellpadding="5" style="margin: 2px 4px 0px 2px; ">
                <tr align="center">
                <td width="50px">번호</td>
                <td width="70px">학번</td>
                <td width="70px">이름</td>
                <td width="50px">수학</td>
                <td width="50px">국어</td>
                <td width="50px">영어</td>
                
                <td width="50px">통합과학</td>
                <td width="50px">통합사회</td>
                <td width="50px">합계</td>
                <td width="50px">평균</td>
                </tr>

                <!-- 제목 표시 끝 -->

                <?php
                include "../school_db_info.php";

                $sql = "SELECT a.stuid, b.name, a.sub1, a.sub2, a.sub3, a.sub4, a.sub5, a.sub6, a.sum, a.avg FROM score AS a JOIN student AS b ON a.stuid = b.stuid ORDER BY avg DESC;";
                
                $result = mysqli_query($con, $sql);

                $count = 1; // 성적 출력하기의 번호
                // 데이터베이스 데이터 출력 시작
                while($row = mysqli_fetch_array($result))
                {
                    $avg = round($row['avg'],1);

                    $stuid = $row['stuid'];

                    echo ("<tr align='center'>
                    <td> $count </td>
                    <td> $row[stuid] </td>
                    <td> $row[name] </td>
                    <td> $row[sub1] </td>
                    <td> $row[sub2] </td>
                    <td> $row[sub3] </td>
                    <td> $row[sub4] </td>
                    <td> $row[sub5] </td>
                    <td> $row[sum] </td>
                    <td> $avg </td>
                    </tr>
                    ");

                    $count++;
                }


                mysqli_close($con);
                ?>
            </table>
        </div>
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
                <td width="40px">성별</td>
                <td width="90px">설립일</td>
                <td width="130px">관할 교육청</td>                
                <td width="250px">주소</td>
                </tr>
                

                <!-- 제목 표시 끝 -->

                <?php
                    include "../school_db_info.php";;


                    $sql = "select * from high_sch;";

                
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

                    </tr>
                    ");

                    $count++;
                }
                mysqli_close($con);
                ?>

            </table>    

        </div>
        <br>

        <div id="post">
            <div id="pnav">
              중학교 정보 출력
              <img class="pbuttons" src="../quit.png">
              <img class="pbuttons" src="../full.png">
              <img class="pbuttons" src="../mini.png">
            </div>
            
            <table border=1" align="center" id="show" style="margin: 2px 4px 0px 2px; ">
                <tr align="center">
                <td width="30px">No</td>
                <td width="150px">학교명</td>
                <td width="60px">설립유형</td>
                <td width="50px">성별</td>
                <td width="100px">설립일</td>
                <td width="130px">관할 교육청</td>
                <td width="250px">주소</td>
                </tr>
                

                <!-- 제목 표시 끝 -->

                <?php
                    include "../school_db_info.php";
                
                    $sql = "select * from mid_sch;";

                
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
                    <td> $row[gender] </td>
                    <td> $row[est] </td>
                    <td> $row[office_edu] </td>
                    <td> $row[addr1]<br>$row[addr2] </td>

                    </tr>
                    ");

                    $count++;
                }
                mysqli_close($con);
                ?>

            </table>    

        </div>
        <br>


        <div id="post">
            <div id="pnav">
              분석
              <img class="pbuttons" src="../quit.png">
              <img class="pbuttons" src="../full.png">
              <img class="pbuttons" src="../mini.png">
            </div>



            <table width="795px" border=1" align="center" id="show" style="margin: 2px 4px 0px 2px; ">
                <tr>
                    <td valign="top" width="150px"> <!-- 등수 -->
                        <table width="150px" border="0" cellpadding="3" align="center">
                            <tr>
                                <td colspan="4" align="center">등수</td>
                            </tr>
                            <tr align="center" id="1">
                            </tr>

                            <!-- 제목 표시 끝 -->

                            <?php
                            include "../school_db_info.php";

                            $avgrank = "SELECT a.stuid, b.name, a.avg FROM score AS a JOIN student AS b ON a.stuid  = b.stuid ORDER BY a.avg desc;";
                            
                            $result = mysqli_query($con, $avgrank);

                            $count = 1; // 성적 출력하기의 번호
                            // 데이터베이스 데이터 출력 시작
                            while($row = mysqli_fetch_array($result))
                            {
                                $avg = round($row['avg'],1);

                                $stuid = $row['stuid'];

                                echo ("
                                
                                <tr align='center '>
                                <td> $count </td>
                                <td> $row[stuid] </td>
                                <td> $row[name] </td>
                                <td> $avg </td>
                                </tr>
                                ");

                                $count++;
                            }


                            mysqli_close($con);
                            ?>
                        </table>
                    </td>
                    <td valign="top" width="150px"> <!-- 60점 미만 -->
                        <table width="150px" border="0" cellpadding="3" align="center">
                            <tr>
                                <td colspan="4" align="center">평균 60미만</td>
                            </tr>
                            <tr align="center" id="1">
                            </tr>

                            <!-- 제목 표시 끝 -->

                            <?php
                            include "../school_db_info.php";

                            $avgrank = "SELECT a.stuid, b.name, a.avg FROM score AS a JOIN student AS b ON a.stuid = b.stuid WHERE a.avg < 60 ORDER BY a.avg DESC;";
                            
                            $result = mysqli_query($con, $avgrank);

                            $count = 1; // 성적 출력하기의 번호
                            // 데이터베이스 데이터 출력 시작
                            while($row = mysqli_fetch_array($result))
                            {
                                $avg = round($row['avg'],1);


                                echo ("
                                
                                <tr align='center '>
                                <td> $count </td>
                                <td> $row[stuid] </td>
                                <td> $row[name] </td>
                                <td> $avg </td>
                                </tr>
                                ");

                                $count++;
                            }


                            mysqli_close($con);
                            ?>
                        </table>
                    </td>
                    <td valign="top" width="200px"> <!-- 성적 미입력 학생 -->
                        <table width="200px" border="0" cellpadding="3" align="center">
                            <tr>
                                <td colspan="3" align="center">성적 미입력 학생</td>
                            </tr>
                            <tr align="center" id="1">
                            </tr>

                            <!-- 제목 표시 끝 -->

                            <?php
                            include "../school_db_info.php";

                            $noninsert = "select * from student where stuid not in (select stuid from score group by stuid);";
                            
                            $result = mysqli_query($con, $noninsert);

                            $count = 1; // 성적 출력하기의 번호
                            // 데이터베이스 데이터 출력 시작
                            while($row = mysqli_fetch_array($result))
                            {
                                // $avg = round($row['avg'],1);


                                echo ("
                                
                                <tr align='center'>
                                <td> $count </td>
                                <td> $row[stuid] </td>
                                <td> $row[name] </td>
                                </tr>
                                ");

                                $count++;
                            }


                            mysqli_close($con);
                            ?>
                        </table>
                    </td>
                    <td valign="top" width="200px"> <!-- 평균 90점 이상 학생 -->
                        <table width="200px" border="0" cellpadding="3" align="center">
                        <tr>
                                <td colspan="3" align="center">평균 90점 이상</td>
                            </tr>
                            <tr align="center" id="1">
                            </tr>

                            <!-- 제목 표시 끝 -->

                            <?php
                            include "../school_db_info.php";

                            $noninsert = "SELECT a.stuid, b.name, a.avg FROM score AS a JOIN student AS b ON a.stuid  = b.stuid WHERE a.avg >= 90 ORDER BY a.avg desc;";
                            
                            $result = mysqli_query($con, $noninsert);

                            $count = 1; // 성적 출력하기의 번호
                            // 데이터베이스 데이터 출력 시작
                            while($row = mysqli_fetch_array($result))
                            {


                                echo ("
                                
                                <tr align='center'>
                                <td> $count </td>
                                <td> $row[stuid] </td>
                                <td> $row[name] </td>
                                </tr>
                                ");

                                $count++;
                            }


                            mysqli_close($con);
                            ?>
                        </table>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        <table width="200px" border="0" cellpadding="3" align="center">
                            <tr>
                                <td colspan="3" align="center">재적 고등학교</td>
                            </tr>
                            <tr align="center" id="1">
                            </tr>

                            <!-- 제목 표시 끝 -->

                            <?php
                            include "../school_db_info.php";

                            $noninsert = "select b.name as high_sch from student a, high_sch b where a.high_sch = b.name order by b.name asc;";
                            
                            $result = mysqli_query($con, $noninsert);

                            $count = 1; // 성적 출력하기의 번호
                            // 데이터베이스 데이터 출력 시작
                            while($row = mysqli_fetch_array($result))
                            {


                                echo ("
                                
                                <tr align='center'>
                                <td> $count </td>
                                <td> $row[high_sch] </td>
                                </tr>
                                ");

                                $count++;
                            }


                            mysqli_close($con);
                            ?>
                        </table>
                    </td>
            
                </tr>

                            
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
        
        



    </body>
</html>
