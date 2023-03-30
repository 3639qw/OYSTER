<?php
include "../school_db_info.php";
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>학생별 인적사항</title>
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <!-- <script src="index.js"></script> -->
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <div id="post">
            <div id="pnav">
              학생정보 출력
              <img class="pbuttons" src="../quit.png">
              <img class="pbuttons" src="../full.png">
              <img class="pbuttons" src="../mini.png">
            </div>
            
            <table border=1" align="center" id="show" style="margin: 2px 4px 0px 2px; ">
                <tr align="center">
                <td width="30px">No</td>
                <td width="50px">학번</td>
                <td width="50px">성명</td>
                <td width="40px ">성별</td>
                <td width="80px">생년월일</td>
                <td width="220px">주소</td>
                <td width="130px">중학교</td>
                <td width="130px">고등학교</td>
                <td width="100px">학과</td>
                <td width="50px"></td>
                </tr>
                

                <!-- 제목 표시 끝 -->

                <?php
                
                if($_GET['mode'] == "birth_first"){
                    //생년월일 내림차순
                    $sql = "select * from student order by birth desc;";
                }
                else if($_GET['mode'] == "birth_last"){
                    //생년월일 오름차순
                    $sql = "select * from student order by birth asc;";
                }
                else{
                    $sql = "select * from student order by stuid;";
                }
                
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
                    <td><a href='student_update.php?stuid=$stuid'>[수정]</a></td>
                    

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
