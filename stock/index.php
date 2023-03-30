<?php
include "stock_db_info.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>상장회사정보</title>
    <script src="index.js"></script>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.ico">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script>
         $(function(){
         $("#headerContent").load("/main_menu/main_header.html");
         });
        </script> 
</head>
<body>
<div id="headerContent"></div>
<div style="position: absolute; left: 50%; margin-left: -275px; height: auto; width: 550px; margin-top: 30px; display: inline-block;">

    <!-- 입력창 -->
    <div class="box insert_box" style=" height: 150px; width: 100%; float: left;">
        <form name="stock_insert" action="insert_action.php" method="post">
            <table border="0" align="center">
                <tr>
                    <td height="100px">
                        회사명: <input type="text" class="form_field" size="13" name="name">
                        <br>코드: <input type="text" class="form_field" size="2" maxlength="6" name="ticker" style="margin-top: 10px;">
                    </td>
                    <td style="padding-left: 30px; padding-right: 30px">
                        액면가: <input type="text" class="form_field" size="2" maxlength="4" name="value">
                        <br>시장:
                        <select name="market" class="form_field" style="margin-top: 10px;">
                            <option value="KOSPI">KOSPI</option>
                            <option value="KOSDAQ">KOSDAQ</option>
                        </select>
                    </td>
                    <td>
                        <input type="submit" class="button" style="width: 80px; height: 80px; font-size: 11px;" onclick="return check_insert()" value="입력하기">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <!-- 검색기능 / 인덱스 버튼 -->
    <div style="height: 50px; width: 100%; margin-top: 20px; float: left;">
        <div class="box" style="height: 100%; width: 69%; float: left;">
            <table border="0">
                <tr>
                    <td style="vertical-align: middle">
                        <form action="index.php" method="post" id="searchStock">
                            <?php
                            $market = $_POST['market'];
                            ?>
                            시장:
                            <select name="market" class="form_field" style="width: 100px;">
                                <option value="">시장 선택</option>
                                <option value="KOSPI">KOSPI</option>
                                <option value="KOSDAQ">KOSDAQ</option>
                            </select>
                            <button type="submit" form="searchStock" class="button" style="margin-left: 20px; display: inline; width: 90px; height: 30px;">입력하기</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>

        <div class="item_box" onclick="location.href = '/'" style="height: 100%; width: 29%; float: right;">
            <table style="width: 100%; height: 100%;">
                <tr align="center">
                    <td class="title" style="vertical-align: middle">
                        JUYONG의 Index
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- 컬럼명 -->
    <div class="db_box" style="width: 100%; margin-top: 20px; float: left;">
        <table border="0" align="center" style="width: 99%;">
                <tr align='center'>
                    <td width='7%' height="30px"> No </td>
                    <td width='15%'> 코드 </td>
                    <td width='44%'> 회사명 </td>
                    <td width='12%'> 액면가 </td>
                    <td width='12%'> 시장 </td>
                    <td width='10%'></td>
                </tr>
        </table>
    </div>

    <!-- DB내용 -->
    <div class="db_box" style="width: 100%; margin-top: 20px; float: left;">
        <table border="0" align="center" style="width: 99%;">
            <?php
            $sql = "select * from korea_stock ";
            if($market != "" && $market != null){
                $sql .= "where market ='".$market."' order by name;";
            }else{
                $sql .= "order by name;";
            }
            $result = mysqli_query($con, $sql);

            $count = 1; // 출력하기의 번호
            // 데이터베이스 데이터 출력 시작
            while($row = mysqli_fetch_array($result))
            {
                $id = $row['ticker'];
                $value = number_format($row['value']);

                echo ("
                <tr align='center'>
                    <td width='7%' class='table_cont'> $count </td>
                    <td width='15%' class='table_cont'> $row[ticker] </td>
                    <td width='44%' class='table_cont'> $row[name] </td>
                    <td width='12%' class='table_cont'> $value </td>
                    <td width='12%' class='table_cont'> $row[market] </td>
                    <td width='10%'><a href='stock_delete.php?ticker=$id'>[삭제]</a></td>
                </tr>
                ");
                $count++;
            }
            if(mysqli_fetch_array($result)){
                echo '<p style="text-align: center;">데이터베이스에 값이 없습니다</p>';
            }
            mysqli_close($con);
            ?>
        </table>
    </div>
</div>

</body>
</html>
