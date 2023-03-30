<?php
$prevPage = $_SERVER['HTTP_REFERER'];
// 변수에 이전페이지 정보를 저장

include "../school_db_info.php";
$id = $_GET['id'];
$sql = "select * from class where id =".$id.";";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>교실정보 수정</title>
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <script src="check.js"></script>
    </head>
    <body>
        <div id="post" style="width: 500px;">
            <div id="pnav">
            교실정보 수정
            <img class="pbuttons" src="../quit.png">
            <img class="pbuttons" src="../full.png">
            <img class="pbuttons" src="../mini.png">
            </div>

            <form name="class_insert" action="update_action.php" method='post'>
                <table border="0" align="center" width="480px">
                    <tr width="350px">
                        <td>
                            반&nbsp;&nbsp;&nbsp;&nbsp;명: <input type="text" class="form-02" size="18" name="name">
                            <input type="text" class="form-02" size="18" name="id" hidden>
                        </td>
                        <td>
                            학교명<br><input type="text" class="form-02" size="18" name="sch">
                        </td>
                    </tr>
                    <tr>
                        <td width="250">
                            성 별: <select name="gender">
                                                <option value="남성">남</option>
                                                <option value="여성">여</option>
                                                <option value="공학">공학</option>
                                            </select>
                        </td>
                        <td>
                            담임교사 ID<br><input type="text" class="form-02" size="18" name="teacher_id">
                        </td>
                    </tr>
                    <tr>
                        <td width="230">
                            학년: <input type="radio" name="year" value="01" checked="checked">1
                                            <input type="radio" name="year" value="02">2
                                            <input type="radio" name="year" value="03">3
                        </td>
                        <td>
                            계열<br><input type="text" class="form-02" size="18" name="type">
                        </td>
                    </tr>
                    <tr height="40px" align="center">
                        <td colspan="2">
                        <input type="submit" class="btn-insert" value="수정하기" style="display: inline; height: 30px; width: 75px; font-size: 13px;" onclick="return check_insert()">
                        <button type="button" class="btn-insert" onclick="location.href='/academy/class'" style="display: inline; height: 30px; width: 75px; font-size: 13px;">뒤로가기</button>
                        <button type="button" class="btn-insert" onclick="location.href='class_delete.php?tid=<?php echo $tid ?>'" style="display: inline; height: 30px; width: 75px; font-size: 13px;">삭제</button>
                        </td>
                    </tr>
                </table>
            </form>
            <div id="noter">
                <div class="notebox"><?php echo 'Class ID: '.$row['id']?></div>
            </div>
        </div>
        <br>
        <script>
            document.class_insert.name.value="<?php echo $row['name']?>"
            document.class_insert.sch.value="<?php echo $row['sch']?>"
            document.class_insert.year.value="<?php echo $row['year']?>"
            document.class_insert.type.value="<?php echo $row['type']?>"
            document.class_insert.gender.value="<?php echo $row['gender']?>"
            document.class_insert.teacher_id.value="<?php echo $row['teacher_id']?>"
            document.class_insert.id.value="<?php echo $row['id']?>"
        </script>
    </body>
</html>
