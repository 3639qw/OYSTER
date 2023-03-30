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
    </head>
    <body>
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
        
    </body>
</html>
