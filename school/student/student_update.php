

<?php

$prevPage = $_SERVER['HTTP_REFERER'];
// 변수에 이전페이지 정보를 저장

include "../school_db_info.php";

$stuid = $_GET['stuid'];


$sql = "select * from student where stuid = $stuid;";
// $sql = "delete from student where stuid =".$stuid;
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);


?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>학생별 인적사항</title>
        <meta charset="utf-8">
        <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
    <div id="post" style="width: 500px;">
                <div id="pnav">
                학생정보 수정
                <img class="pbuttons" src="../quit.png">
                <img class="pbuttons" src="../full.png">
                <img class="pbuttons" src="../mini.png">
                </div>

                    <form action="update_action.php" method='post'>
                        <table border="0" align="center">
                            <tr>
                                <td width="80">
                                    학&nbsp;&nbsp;&nbsp;&nbsp;번: <input type="text" class="form-03" style="border: none; background: transparent;" size="6" name="stuid" value="<?php echo $row[stuid]?>">
                                    <input type="checkbox" name="checkmid" <?php if($row['high_sch'] == NULL) {echo 'checked';} ?> check value="isMid">중딩
                                </td>
                                <td>
                                    중&nbsp;학&nbsp;교<br><input type="text" class="form-02" size="18" name="mid_sch" value="<?php echo $row[mid_sch]?>">
                                </td>
                                
                            </tr>
                            <tr>
                                <td width="250">
                                    이&nbsp;&nbsp;&nbsp;&nbsp;름: <input type="text" class="form-02" size="6" name="name" value="<?php echo $row[name]?>">
                                </td>
                                <td>
                                    고등학교<br><input type="text" class="form-02" size="18" name="high_sch" value="<?php echo $row[high_sch]?>">
                                </td>
                            </tr>
                            <tr>
                                <td width="230">
                                    성 별 : <select name="gender">
                                                    <option value="남성" <?php if($row['gender'] == 남성) {echo 'selected';}?>>남</option>
                                                    <option value="여성" <?php if($row['gender'] == 여성) {echo 'selected';}?>>여</option>
                                                </select>
                                </td>
                                <td>
                                    학과<br><input type="text" class="form-02" size="18" name="dept" value="<?php echo $row[dept]?>">
                                </td>
                            </tr>
                            <tr>
                                <td width="230">
                                    생년월일 : <input type="date" class="form-02" value="<?php echo $row[birth] ?>" min="2003-01-01" max="2008-12-31" name="birth">
                                </td>
                                <td>
                                    <button type="button" class="btn-insert" onclick="location.href='/academy/student'" style="height: 30px; width: 75px; margin : 0px; font-size: 13px;">뒤로가기</button>
                                </td>
                            </tr>
                            <tr>
                            <td rowspan="4">
                                <table border="0">
                                    <tr>
                                        <td align="left">
                                            우편번호 : <input type="text" class="form-02" name="zip" style="width:80px; height:26px;" readonly value="<?php echo $row['zip']?>">
                                        </td>
                                        <td align="right">
                                            <button type="button" class="btn-insert" style="width:60px; height:32px; font-size: 12px;" onclick="openZipSearch()">검색</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" width="150px">
                                            주소 <input type="text" class="form-02" name="addr1" style="width:300px; height:30px;" readonly value="<?php echo $row['addr1']?>"><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            상세 <input type="text" class="form-02" name="addr2" style="width:300px; height:30px;" value="<?php echo $row['addr2']?>"><br>
                                        </td>
                                    </tr>
                                    <tr>
                                    </tr>
                                </table>
                            </td>
                            <td rowspan="4" align="center" width="50" style="margin: 0;">
                                <div class="body">
                                    <input type="submit" class="btn-insert" value="수정하기" style="height: 75px; width: 75px; margin: 40px 0px 0px 0px; font-size: 13px;"><br>
                                    <button type="button" class="btn-insert" onclick="location.href='student_delete.php?stuid=<?php echo $stuid ?>'" style="height: 30px; width: 75px; margin : 0px; font-size: 13px;">삭제</button>

                                    
                                    
                                </div>
                            </td>


                            </tr>


                                
                                

                
                
                
                        </table>
                    </form>
                    <br>
    </body>
</html>
