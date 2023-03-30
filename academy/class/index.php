<?php
include "../school_db_info.php";
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>교실관리</title>
        <meta charset="utf-8">
        <script src="check.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <div id="post" style="width: 750px;">
            <div id="pnav">
                교실정보 입력
                <img class="pbuttons" src="../quit.png">
                <img class="pbuttons" src="../full.png">
                <img class="pbuttons" src="../mini.png">
            </div>
                <form name="class_insert" action="insert_action.php" method='post'>
                    <table border="0" align="center">
                        <tr>
                            <td width="200px">
                            
                                    반명: <input type="text" class="form-02" size="18" name="name"><br>
                                <br>계열: <input type="text" class="form-02" size="18" name="type"> 
                            </td>
                            <td width="190px" align="left">
                                성별: <input type="radio" name="gender" value="남성" checked="checked">남
                                        <input type="radio" name="gender" value="여성">여
                                        <input type="radio" name="gender" value="공학">공학<br>
                                <br>학년: <input type="radio" name="year" value="01" checked="checked">1
                                        <input type="radio" name="year" value="02">2
                                        <input type="radio" name="year" value="03">3
                            </td>
                            <td width="200px">
                                학교명: <input type="text" class="form-02" size="18" name="sch"><br>
                                <br>담임교사 ID: <input type="text" class="form-02" size="14" name="teacher_id">
                            </td>
                            <td>
                                <input type="submit" class="btn-insert" value="입력하기" style="height: 75px; width: 75px; font-size: 13px;" onclick="return check_insert()">  
                            </td>
                        </tr>
                    </table>
                </form>
            <div id="noter">
                <div class="notebox">Copyright 2021. JUYONGLee. All rights reserved.</div>
            </div>
        </div><br>

        <div id="post" style="width: 750px;">
            <div id="pnav">
              교실정보 출력
              <img class="pbuttons" src="../quit.png">
              <img class="pbuttons" src="../full.png">
              <img class="pbuttons" src="../mini.png">
            </div>
            <table border="0" align="center" width="600px">
                <tr>
                    <td>
                        <form action="index.php" method='post'>
                            <p align="center">
                                <?php
                                    $sch = $_POST['high_sch'];
                                ?>
                                학교명: <input type="text" class="form-02" size="19" name="high_sch">
                                <input type="submit" class="btn-insert" value="입력하기" style="display: inline;">
                            </p>
                        </form>
                    </td>
                </tr>
            </table>
            <table border=1" align="center" id="show" style="margin: 2px 4px 0px 2px; ">
                <tr align="center">
                <td width="30px" height="20px">No</td>
                <td width="120px">반명</td>
                <td width="180px">학교명<br>학년</td>
                <td width="180px ">계열<br>성별</td>
                <td width="80px">담임교사 ID</td>
                <td width="90px">담임교사 성명</td>
                <td width="40px"></td>
                </tr>

                <?php
                $sql = "select a.id, a.name class_name, a.sch, a.year, a.type, a.gender, a.teacher_id, b.name teacher_name from class a, teacher b ";
                if($sch != "" && $sch != null){
                    $sql .= "where a.teacher_id = b.tid and a.name = b.class and a.sch ='".$sch."' group by a.name order by a.name;";
                }else{
                    $sql .= "where a.teacher_id = b.tid group by a.name order by a.name;";
                }
                $result = mysqli_query($con, $sql);

                $count = 1;
                while($row = mysqli_fetch_array($result))
                {
                    $id = $row['id'];

                    echo ("<tr align='center'>
                    <td height='35px'> $count </td>
                    <td> $row[class_name] </td>
                    <td> $row[sch]<br>$row[year] </td>
                    <td> $row[type]<br>$row[gender] </td>
                    <td> $row[teacher_id] </td>
                    <td> $row[teacher_name]</td>
                    <td><a href='class_update.php?id=$id'>[수정]</a></td>
                    </tr>
                    ");
                    $count++;
                }
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
