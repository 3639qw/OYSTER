<?php
include "student_db_info.php";
?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>학생별 인적사항</title>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="stylesheet" type="text/css" href="_style.css"/>
</head>


<body>
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>

    <form action="student_insert.php" method='post'>
        <table border="1" align="center">
            <tr>
                <td width="130">
                
                        학번: <input type="text" size="3" name="num">&nbsp;   
                    <br>이름: <input type="text" size="3" name="성명">&nbsp;    
                    <br>중학교: <input type="text" size="3" name="전적">&nbsp;    
                    <br>고등학교: <input type="text" size="3" name="재학">&nbsp;  
                </td>
                <td width="200" align="left">
                    성별 : <input type="radio" name="성별" value="남성">M
                                                        <input type="radio" name="성별" value="여성">F
                                                        <input type="radio" name="성별" value="미공개" checked="checked" >X
                    
                    <br>생년월일 : <input type="date" value="2021-01-01" min="2003-01-01" max="2021-12-31" name="생년월일">
                    
                </td>
                <td>
                    <table>
                        <tr>
                            <td width="200" align="left">
                                우편번호 : <input type="text" name="zip" style="width:80px; height:26px;" readonly>
                            </td>
                            <td align="right">
                                <button type="button" style="width:60px; height:32px;" onclick="openZipSearch()">검색</button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" width="150px">
                                주소 : <input type="text" name="addr1" style="width:300px; height:30px;" readonly><br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                상세 : <input type="text" name="addr2" style="width:300px; height:30px;"><br>
                            </td>
                        </tr>
                        <tr>
                        </tr>
                    </table>
                </td>
                <td align="center" width="50">
                    <input type="submit" class="btn-insert" value="입력하기" style="height: 75px; width: 75px; margin: 40px 0px 0px 0px; font-size: 13px;">   
                </td>
            </tr>



            
        </table>
        
        

    </form>

    <h3 align="center">학생 정보 출력</h3>

    <!-- 제목 표시 시작 -->
    <div class="orderby">
        <a href="?mode=birth_first">[생년월일 내림차순 정렬]</a> 
        <a href="?mode=birth_last">[생년월일 오름차순 정렬]</a><br>
    </div>
        <table border="1" align="center">
        <tr align="center">
        <td>No</td>
	    <td width="50px" height="20px">학번</td>
	    <td width="50px">성명</td>
    	<td width="40px">성별</td>
    	<td width="80px">생년월일</td>
    	<td width="250px">주소</td>
        <td width="130px">중학교</td>
        <td width="130px">고등학교</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>

        <!-- 제목 표시 끝 -->

        <?php
        
        if($_GET['mode'] == "birth_first"){
            //생년월일 내림차순
            $sql = "select * from student order by 생년월일 desc;";
        }
        else if($_GET['mode'] == "birth_last"){
            //생년월일 오름차순
            $sql = "select * from student order by 생년월일 asc;";
        }
        else{
            $sql = "select * from student order by num;";
        }
        
        $result = mysqli_query($con, $sql);

        $count = 1; // 출력하기의 번호
        // 데이터베이스 데이터 출력 시작
        while($row = mysqli_fetch_array($result))
        {
            $avg = round($row['avg'],1);

            $num = $row['num'];


            echo ("<tr align='center'>
            <td> $count </td>
            <td> $row[num] </td>
            <td> $row[성명] </td>
            <td> $row[성별] </td>
            <td> $row[생년월일] </td>
            <td> $row[주소]$row[상세주소] </td>
            <td> $row[재학] </td>
            <td> $row[전적] </td>
            <td><a href='student_info.php?num=$num'>[상세]</a></td>
            <td><a href='student_delete.php?num=$num'>[삭제]</a></td>

            </tr>
            ");

            $count++;
        }


        mysqli_close($con);
        ?>
    </table>




<script>

function openZipSearch() {
	new daum.Postcode({
		oncomplete: function(data) {
			$('[name=zip]').val(data.zonecode); // 우편번호 (5자리)
			$('[name=addr1]').val(data.address);
			$('[name=addr2]').val(data.buildingName);
		}
	}).open();
}

</script>

<!-- 예제 종료 -->



</body></html>