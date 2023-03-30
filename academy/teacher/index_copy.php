<?php
include "../school_db_info.php";
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>교원관리</title>
        <meta charset="utf-8">
        <script src="check.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        <div id="post" style="width: 650px;">
            <div id="pnav">
                교원정보 입력
                <img class="pbuttons" src="../quit.png">
                <img class="pbuttons" src="../full.png">
                <img class="pbuttons" src="../mini.png">
            </div>
                <form name="tea_insert" action="insert_action.php" method='post'>
                    <table border="0" align="center">
                        <tr>
                            <td width="225">
                            
                                    교원번호: <input type="text" class="form-02" size="8" name="tid">  
                                <br>성&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;명: <input type="text" class="form-02" size="9" name="name"> 
                                <br>주 과목: <input type="text" class="form-02" size="17" name="sub">
                                <br>부 과목: <input type="text" class="form-02" size="17" name="sub2">
                            </td>
        
                            <td width="200" align="left">
                                성별 : <input type="radio" name="gender" value="남성" checked="checked">남
                                        <input type="radio" name="gender" value="여성">여
                                <br>소속학교: <input type="text" class="form-02" size="18" name="sch">  
                                <br>자격정보 :<select name="lilevel">
                                                        <option value="1정">1정</option>
                                                        <option value="2정">2정</option>
                                                        <option value="교장">교장</option>
                                                        <option value="교감">교감</option>
                                                        <option value="보건">보건</option>
                                                        <option value="사서">사서</option>
                                                        <option value="영양">영양</option>
                                                        <option value="상담">상담</option>
                                                        
                                                    </select>
                                <br>생년월일 : <input type="date" class="form-02" value="2008-01-01" min="1900-01-01" max="2099-12-31" name="birth">
                                <br>임용연월일 : <input type="date" class="form-02" value="2008-01-01" min="1900-01-01" max="2099-12-31" name="joindate">
                            </td>
                            <td>
                                직위: <select name="position">
                                                        <option value="교사">교사</option>
                                                        <option value="교장">교장</option>
                                                        <option value="교감">교감</option>
                                                        
                                                    </select><br>
                                부서: <input type="text" class="form-02" size="10" name="dept"><br>
                                직책: <input type="text" class="form-02" size="10" name="title"><br>
                                직급: <input type="text" class="form-02" size="10" name="step">
                            </td>

                            <td align="center" width="50" style="margin: 0;">
                                <div class="body">
                                    <input type="submit" class="btn-insert" value="입력하기" style="height: 75px; width: 75px; font-size: 13px;" onclick="return check_insert()">   
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            <div id="noter">
                <div class="notebox">Copyright 2021. JUYONGLee. All rights reserved.</div>
            </div>
        </div><br>

        <div id="post" style="width: 650px;">
            <div id="pnav">
              교원정보 출력
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
                <td width="60px">번호</td>
                <td width="60px">성명</td>
                <td width="60px ">성별</td>
                <td width="90px">생년월일</td>
                <td width="180px">소속학교<br>임용 연월일</td>
                <td width="150px">주 과목<br>부 과목</td>
                <td width="50px"></td>
                </tr>

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
                    <td height='35px'> $count </td>
                    <td> $row[tid] </td>
                    <td> $row[name] </td>
                    <td> $row[gender] </td>
                    <td> $row[birth] </td>
                    <td> $row[sch]<br>$row[joindate]</td>
                    <td> $row[sub]<br>$row[sub2]</td>
                    <td><a href='teacher_update.php?id=$tid'>[수정]</a></td>
                    </tr>
                    ");
                    $count++;
                }
                ?>
            </table>
            <br>    

            <table border=1" align="center" id="show" style="margin: 2px 4px 0px 2px; ">
                <tr align="center">
                <td width="30px" height="20px">No</td>
                <td width="60px">번호</td>
                <td width="120px">소속 부서</td>
                <td width="140px ">직위</td>
                <td width="120px">직책</td>
                <td width="100px">직급</td>
                <td width="100px">자격정보</td>
                <td width="50px"></td>
                </tr>

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
                    $stuid = $row['stuid'];

                    echo ("<tr align='center'>
                    <td height='30px'> $count </td>
                    <td> $row[tid] </td>
                    <td> $row[dept] </td>
                    <td> $row[position] </td>
                    <td> $row[title] </td>
                    <td> $row[step]</td>
                    <td> $row[lilevel]</td>
                    <td><a href='teacher_update.php?id=$tid'>[수정]</a></td>
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
