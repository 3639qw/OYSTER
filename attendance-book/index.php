<html>
    <head>
        <title>출석부</title>
        <meta charset="UTF-8">
        <style type="text/css">
            h1{
                text-decoration-line: underline;
                font-size: 20px;

            }
            table{
                text-align: center;
                border-collapse: collapse;

            }
            td{
                height: 30px; font-size: 12px; font-weight: bold;
            }
        
        
        
        </style>

    </head>

    <body>
        <center><h1>출&nbsp&nbsp석&nbsp&nbsp부</h1></center>
        <table border="1" align="center">
            <tr>
                <td width="30px">번호</td>
                <td width="50px">성명</td>
                <td>성별</td>
                <td width="60px">학번</td>
                <td width="80px">생년월일</td>
            </tr>
            <?php
            include "student_db_info.php";

            $sql = "select * from student order by stuid;";

            $result = mysqli_query($con, $sql);

            $count = 1; //출력하기의 번호
            while($row = mysqli_fetch_array($result)){
                echo("<tr align='center'>
                <td>$count</td>
                <td>$row[name]</td>
                <td>$row[stuid]</td>
                <td>$row[gen]</td>
                <td>$row[birth]</td>

                
                
                
                
                ");
                $count ++;


            }
            mysqli_close($con);
            
            
            
            
            ?>
                

        <table>
        
        <br>
        
        <br>
        <table border="1" align="center">
                <tr>
                    <td>출결상황</td>
                    
                </tr>

                <tr>
                <td>

                <table border="1" align="center">
                    <tr>
                        <td rowspan="2" width="50px">학년</td>
                        <td rowspan="2" width="60px">수업일수</td>
                        <td colspan="3">결석</td>
                        <td colspan="3">지각</td>
                        <td colspan="3">조퇴</td>
                        <td colspan="3">결과</td>
                        <td rowspan="2" width="100px">특기사항</td>

                    </tr>
                    <tr>
                        <td width="30px">질병</td>
                        <td width="30px">무단</td>
                        <td width="30px">기타</td>
                        <td width="30px">질병</td>
                        <td width="30px">무단</td>
                        <td width="30px">기타</td>
                        <td width="30px">질병</td>
                        <td width="30px">무단</td>
                        <td width="30px">기타</td>
                        <td width="30px">질병</td>
                        <td width="30px">무단</td>
                        <td width="30px">기타</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td><input type="text" size="3" name="ticker"></td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>

                    </tr>
                    <tr>
                        <td>2</td>
                        <td><input type="text" size="3" name="ticker"></td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>

                    </tr>
                    <tr>
                        <td>3</td>
                        <td><input type="text" size="3" name="ticker"></td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>
                        <td>#</td>

                    </tr>






                </table>

                
                <!--
                <table border="1" align="center">
                <tr>
                    <td colspan="3" rowspan="2" width="120px">연락처</td>
                    <td width="50px">집</td>
                    <td width="120px">02-000-0000</td>
                    <td rowspan="2" width="100px">E-Mail</td>
                    <td rowspan="2" width="205px">3639qw@gmail.com</td>
                </tr>
                <tr>
                    <td>핸드폰</td>
                    <td>010-4058-7934</td>
                </tr>
                <tr>
                    <td colspan="3">년 월 일</td>
                    <td colspan="3">학력 및 자격증</td>
                    <td>발행처</td>
                </tr>
                <tr>
                    <td>2019</td>
                    <td>1</td>
                    <td>7</td>
                    <td colspan="3">신도중학교 졸업</td>
                    <td>신도중학교장</td>
                </tr>
                <tr>
                    <td>2022</td>
                    <td></td>
                    <td></td>
                    <td colspan="3">세명컴퓨터고등학교 졸업예정</td>
                    <td></td>
                </tr>
                </table>
                
                </td>
                
                </tr>
                </table>
                -->


        <p align="center"><input type="button" onclick="location.href='http://juyong.pw'" value="전송"></p>
        




    </body>




</html>