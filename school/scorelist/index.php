<html>
<head>
    <meta charset="UTF-8">
    <title>성적입력</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>



<body>

    <p align="center">
        <a href="?mode=avg_first">[평균높은순 정렬]</a>
        <a href="?mode=avg_last">[평균낮은순 정렬]</a>
    </p>


    <div id="post">
        <div id="pnav">
            학생성적 출력
            <img class="pbuttons" src="../quit.png">
            <img class="pbuttons" src="../full.png">
            <img class="pbuttons" src="../mini.png">
        </div>
            <table width="695px" border="1" align="center" id="show" style="margin: 2px 4px 0px 2px; " cellpadding="5">
                <tr align="center">
                    <td>번호</td>
                    <td>학번</td>
                    <td width="50px">성명</td>
                    <td width="40px">수학</td>
                    <td width="40px">국어</td>
                    <td width="40px">영어</td>
                    <td width="50px">통합과학</td>
                    <td width="50px">통합사회</td>
                    <td width="50px">정보</td>
                    <td width="40px">합계</td>
                    <td width="40px">평균</td>
                    <td width="50px">&nbsp;</td>
                </tr>

                <!-- 제목 표시 끝 -->

                <?php
                include "../school_db_info.php";
                
                // if($_GET['mode'] == "avg_first"){
                //     $sql = "SELECT a.stuid, b.name, a.sub1, a.sub2, a.sub3, a.sub4, a.sub5, a.sum, a.avg FROM score AS a LEFT OUTER JOIN student AS b ON a.stuid = b.stuid ORDER BY a.avg desc;";
                // }if($_GET['mode'] == "avg_last"){
                //     $sql = "SELECT a.stuid, b.name, a.sub1, a.sub2, a.sub3, a.sub4, a.sub5, a.sum, a.avg FROM score AS a LEFT JOIN student AS b ON a.stuid = b.stuid ORDER BY a.avg asc;";
                // }else{
                //     $sql = "SELECT a.stuid, b.name, a.sub1, a.sub2, a.sub3, a.sub4, a.sub5, a.sum, a.avg FROM score AS a JOIN student AS b ON a.stuid = b.stuid ORDER BY stuid asc;";

                // }
                
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
                    <td> $row[sub6] </td>
                    <td> $row[sum] </td>
                    <td> $avg </td>
                    <td><a href='score_delete.php?stuid=$stuid'>[삭제]</a></td>
                    </tr>
                    ");

                    $count++;
                }
                mysqli_close($con);
                ?>

                </table>
                



    </div><br>
    <table align="center">
        <tr>
            <td>
                <button type="button" class="btn-insert" style="width: 60px; height: 32px; " onclick="location.href='../'">인덱스</button>
            </td>
        </tr>
    </table>
    <!-- 제목 표시 시작 -->
    

</body>
</html>