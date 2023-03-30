<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>GPA 백분율 변환</title>
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="icon" href="/favicon.ico">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./index.css">
    <script type="text/javascript">
        $(document).ready(function(){

            $ ('.gpa_t').show();
            $ ('.rank_t').hide();

            $('.gpa_b').click(function(){
                $ ('.gpa_t').show();
                $ ('.rank_t').hide();
                return false;
            });
            $('.rank_b').click(function(){
                $ ('.gpa_t').hide();
                $ ('.rank_t').show();
                return false;
            });

            $('#gpa_before').change( function(e) {

                if($('#gpa_before').val() > 4.50){ // GPA를 4.50 이상으로 입력했을 경우
                    alert('GPA 4.50을 넘을 수 없습니다.');
                    $('#gpa_before').val('');
                }


                if($('#gpa_before').val() >= 0.01){
                    var per = (60+(($('#gpa_before').val()-1)*40/3.5)).toFixed(1);
                }


                if($('#gpa_before').val() < 0.01){ // GPA가 0.01보다 작을 경우 백분율 점수 0점으로 표기
                    $('#percentile_after').val('0');
                }else if($('#gpa_before').val() == 4.5){ // GPA가 4.50 만점일 경우 백분율 점수 100점으로 표기
                    $('#percentile_after').val('100');
                }else{ // 그외에는 점수에 맞는 백분율 점수 표기
                    $('#percentile_after').val(per);
                }

                if($('#percentile_after').val() == 'NaN'){ // GPA입력란에 숫자 외의 문자를 입력헀읋 경우
                    alert('숫자만 입력할 수 있습니다.');
                    $('#gpa_before').val('');
                    $('#percentile_after').val('');
                }
            });

            $ ('.rank_1').hide();
            $ ('.rank_2').hide();
            $ ('.rank_3').hide();
            $ ('.rank_4').hide();
            $('input[name="rank_type"]').change( function(e) {
                var radioVal = $('input[name="rank_type"]:checked').val();
                if(radioVal == '1'){
                    $ ('.rank_1').show();
                    $ ('.rank_2').hide();
                    $ ('.rank_3').show();
                    $ ('.rank_4').show();
                }
                if(radioVal == '2'){
                    $ ('.rank_1').hide();
                    $ ('.rank_2').show();
                    $ ('.rank_3').show();
                    $ ('.rank_4').show();
                }
            });

            $('input[name="rank_1"],input[name="sum_1"],input[name="srank_1"]').change( function(e) {
                var rank_1 = parseInt($('input[name="rank_1"]').val());
                var srank_1 = parseInt($('input[name="srank_1"]').val());
                var sum_1 = parseInt($('input[name="sum_1"]').val());
                var rank_percent_1 = (((rank_1 + ((srank_1 - 1) / 2)) / sum_1)*100).toFixed(2);

                if(rank_1 != null && rank_1 != '' && rank_1 != 'NaN' && srank_1 != null && srank_1 != '' && srank_1 != 'NaN' && sum_1 != null && sum_1 != '' && sum_1 != 'NaN'){
                    if(srank_1 > 1){
                        if(rank_1 > sum_1){
                            $('#rank_percent').val('석차가 수강자수 보다 큽니다.');
                            $('input[name="rank_1"]').val('');
                        }else if(rank_percent_1 > 100){
                            $('#rank_percent').val('Error');
                        }else if(rank_percent_1 != 'NaN'){
                            $('#rank_percent').val(rank_percent_1);

                            if(rank_percent_1 <= 4.00){
                                $('input[name="rank_grade"]').val('1');
                            }else if(rank_percent_1 <= 11.00){
                                $('input[name="rank_grade"]').val('2');
                            }else if(rank_percent_1 <= 23.00){
                                $('input[name="rank_grade"]').val('3');
                            }else if(rank_percent_1 <= 40.00){
                                $('input[name="rank_grade"]').val('4');
                            }else if(rank_percent_1 <= 60.00){
                                $('input[name="rank_grade"]').val('5');
                            }else if(rank_percent_1 <= 77.00){
                                $('input[name="rank_grade"]').val('6');
                            }else if(rank_percent_1 <= 89.00){
                                $('input[name="rank_grade"]').val('7');
                            }else if(rank_percent_1 <= 96.00){
                                $('input[name="rank_grade"]').val('8');
                            }else if(rank_percent_1 <= 100.00){
                                $('input[name="rank_grade"]').val('9');
                            }
                        }else{
                            $('#rank_percent').val('');
                        }
                    }else{
                        $('#rank_percent').val('동석차수를 입력해주세요.');
                    }
                }


            });

            $('input[name="rank_2"],input[name="sum_2"]').change( function(e) {
                var rank_2 = parseInt($('input[name="rank_2"]').val());
                var sum_2 = parseInt($('input[name="sum_2"]').val());
                var rank_percent_2 = ((rank_2 / sum_2)*100).toFixed(2);

                if(rank_2 != null && rank_2 != '' && rank_2 != 'NaN' && sum_2 != null && sum_2 != '' && sum_2 != 'NaN'){
                    if(rank_2 > sum_2){
                        $('#rank_percent').val('석차가 수강자수 보다 큽니다.');
                        $('input[name="rank_2"]').val('');
                    }else if(rank_percent_2 > 100){
                        $('#rank_percent').val('Error');
                    }else if(rank_percent_2 != 'NaN'){
                        $('#rank_percent').val(rank_percent_2);

                        if(rank_percent_2 <= 4.00){
                            $('input[name="rank_grade"]').val('1');
                        }else if(rank_percent_2 <= 11.00){
                            $('input[name="rank_grade"]').val('2');
                        }else if(rank_percent_2 <= 23.00){
                            $('input[name="rank_grade"]').val('3');
                        }else if(rank_percent_2 <= 40.00){
                            $('input[name="rank_grade"]').val('4');
                        }else if(rank_percent_2 <= 60.00){
                            $('input[name="rank_grade"]').val('5');
                        }else if(rank_percent_2 <= 77.00){
                            $('input[name="rank_grade"]').val('6');
                        }else if(rank_percent_2 <= 89.00){
                            $('input[name="rank_grade"]').val('7');
                        }else if(rank_percent_2 <= 96.00){
                            $('input[name="rank_grade"]').val('8');
                        }else if(rank_percent_2 <= 100.00){
                            $('input[name="rank_grade"]').val('9');
                        }
                    }else{
                        $('#rank_percent').val('');
                    }
                }
            });


            $('input[name="sum_1"]').change( function(e) {
                var sumof = parseInt($('input[name="sum_1"]').val());

                var Rank1 = parseInt(Math.round(sumof*0.04));
                var Rank2 = parseInt(Math.round((sumof*0.11)-Rank1));
                var Rank3 = parseInt(Math.round((sumof*0.23)-(Rank1+Rank2)));
                var Rank4 = parseInt(Math.round((sumof*0.40)-(Rank1+Rank2+Rank3)));
                var Rank5 = parseInt(Math.round((sumof*0.60)-(Rank1+Rank2+Rank3+Rank4)));
                var Rank6 = parseInt(Math.round((sumof*0.77)-(Rank1+Rank2+Rank3+Rank4+Rank5)));
                var Rank7 = parseInt(Math.round((sumof*0.89)-(Rank1+Rank2+Rank3+Rank4+Rank5+Rank6)));
                var Rank8 = parseInt(Math.round((sumof*0.96)-(Rank1+Rank2+Rank3+Rank4+Rank5+Rank6+Rank7)));
                var Rank9 = parseInt(Math.round((sumof)-(Rank1+Rank2+Rank3+Rank4+Rank5+Rank6+Rank7+Rank8)));


                $('#Rank1').text(Rank1);
                $('#Rank2').text(Rank2);
                $('#Rank3').text(Rank3);
                $('#Rank4').text(Rank4);
                $('#Rank5').text(Rank5);
                $('#Rank6').text(Rank6);
                $('#Rank7').text(Rank7);
                $('#Rank8').text(Rank8);
                $('#Rank9').text(Rank9);
            });
            $('input[name="sum_2"]').change( function(e) {
                var sumof = parseInt($('input[name="sum_2"]').val());

                var Rank1 = parseInt(Math.round(sumof*0.04));
                var Rank2 = parseInt(Math.round((sumof*0.11)-Rank1));
                var Rank3 = parseInt(Math.round((sumof*0.23)-(Rank1+Rank2)));
                var Rank4 = parseInt(Math.round((sumof*0.40)-(Rank1+Rank2+Rank3)));
                var Rank5 = parseInt(Math.round((sumof*0.60)-(Rank1+Rank2+Rank3+Rank4)));
                var Rank6 = parseInt(Math.round((sumof*0.77)-(Rank1+Rank2+Rank3+Rank4+Rank5)));
                var Rank7 = parseInt(Math.round((sumof*0.89)-(Rank1+Rank2+Rank3+Rank4+Rank5+Rank6)));
                var Rank8 = parseInt(Math.round((sumof*0.96)-(Rank1+Rank2+Rank3+Rank4+Rank5+Rank6+Rank7)));
                var Rank9 = parseInt(Math.round((sumof)-(Rank1+Rank2+Rank3+Rank4+Rank5+Rank6+Rank7+Rank8)));


                $('#Rank1').text(Rank1);
                $('#Rank2').text(Rank2);
                $('#Rank3').text(Rank3);
                $('#Rank4').text(Rank4);
                $('#Rank5').text(Rank5);
                $('#Rank6').text(Rank6);
                $('#Rank7').text(Rank7);
                $('#Rank8').text(Rank8);
                $('#Rank9').text(Rank9);
            });




        });
    </script>
</head>
<body>

<div class="first_section">
    <!-- GPA Percentile -->
    <div class="second_section gpa_t" style="width: 750px;">


        <table border="0" class="title">
            <tr align="center">
                <td style="font-size: 35px; font-weight: bold;">
                    GPA 백분율 변환
                </td>
            </tr>
        </table>

        <table border="0" class="service_window">
            <tr style="height: 60px; font-size: 17px;">
                <td class="gpa_b" style="letter-spacing: 2px; width: 33%; border-left: 1px solid rgb(51, 76, 121); border-top: 1px solid rgb(51, 76, 121); border-bottom: 1px solid rgb(51, 76, 121);">
                    GPA 변환
                </td>
                <td class="rank_b" style="letter-spacing: 2px; width: 33%; color: white; background: rgb(51, 76, 121); border-top: 1px solid rgb(51, 76, 121); border-bottom: 1px solid rgb(51, 76, 121);">
                    석차등급 변환
                </td>
            </tr>
        </table>

        <table border="1" class="window">
            <tr align="center">
                <td align="left" id="" class="top">
                    변환할 성적을 입력해주세요.
                </td>
            </tr>
            <tr align="center" id="">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <table border="1" class="content">
                        <tr>
                            <td style="height: 60px; width: 25%; border-right: hidden;">
                                GPA
                            </td>
                            <td style="width: 75%;">
                                <input type="text" class="input" name="gpa_before" id="gpa_before" maxlength="4" style="width: 300px;"> / 4.50
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <table border="1" class="window">
            <tr align="center">
                <td align="left" id="" class="top">
                    변환된 성적을 확인해주세요.
                </td>
            </tr>
            <tr align="center" id="">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <table border="1" class="content">
                        <tr>
                            <td style="height: 60px; width: 25%; border-right: hidden;">
                                백분율
                            </td>
                            <td style="width: 75%;">
                                <input type="text" class="input" name="percentile_after" id="percentile_after" readonly>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div style="height: 50px; width: 160px; margin: auto; margin-top: 30px; margin-bottom: 30px;">
            <button onclick="location.href='../'" class="cancel">
                취&nbsp;&nbsp;소
            </button>
        </div>

    </div>

    <!-- Rank Grade -->
    <div class="second_section rank_t" style="width: 750px;">
        <!-- 타이틀 -->
        <table border="0" class="title">
            <tr align="center">
                <td style="font-size: 35px; font-weight: bold;">
                    석차등급 변환
                </td>
            </tr>
        </table>

        <!-- 변환기 선택 -->
        <table border="0" class="service_window">
            <tr style="height: 60px; font-size: 17px;">
                <td class="gpa_b" style="letter-spacing: 2px; width: 33%; color: white; background: rgb(51, 76, 121); border-left: 1px solid rgb(51, 76, 121); border-top: 1px solid rgb(51, 76, 121); border-bottom: 1px solid rgb(51, 76, 121);">
                    GPA 변환
                </td>
                <td class="rank_b" style="letter-spacing: 2px; width: 33%; border-top: 1px solid rgb(51, 76, 121); border-bottom: 1px solid rgb(51, 76, 121); border-right: 1px solid rgb(51, 76, 121);">
                    석차등급 변환
                </td>
            </tr>
        </table>

        <!-- 동석차 여부 선택 -->
        <table border="1" class="window">
            <tr align="center">
                <td align="left" class="top">
                    조건을 선택해주세요
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <table border="1" class="content">
                        <tr>
                            <td style="height: 60px; width: 25%; border-right: hidden;">
                                동석차수 여부
                            </td>
                            <td style="width: 75%;">
                                <label><input type="radio" class="input" name="rank_type" value="1" style="width: 50px; height: 20px;">동석차 있음</label>
                                <label><input type="radio" class="input" name="rank_type" value="2" style="width: 50px; height: 20px;">동석차 없음</label>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- 석차 입력 -->
        <table border="1" class="window rank_1">
            <tr align="center">
                <td align="left" class="top">
                    석차를 입력해주세요.
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <table border="1" class="content">
                        <tr>
                            <td style="height: 60px; width: 25%; border-right: hidden;">
                                석차
                            </td>
                            <td style="width: 75%;">
                                <input type="text" class="input" name="rank_1" id="rank_1">
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 60px; width: 25%; border-right: hidden;">
                                동석차
                            </td>
                            <td style="width: 75%;">
                                <input type="text" class="input" name="srank_1" id="srank_1">
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 60px; width: 25%; border-right: hidden;">
                                수강자수
                            </td>
                            <td style="width: 75%;">
                                <input type="text" class="input" name="sum_1" id="sum_1">
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>
        <table border="1" class="window rank_2">
            <tr align="center">
                <td align="left" class="top">
                    석차를 입력해주세요.
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <table border="1" class="content">
                        <tr>
                            <td style="height: 60px; width: 25%; border-right: hidden;">
                                석차
                            </td>
                            <td style="width: 75%;">
                                <input type="text" class="input" name="rank_2" id="rank_2">
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 60px; width: 25%; border-right: hidden;">
                                수강자수
                            </td>
                            <td style="width: 75%;">
                                <input type="text" class="input" name="sum_2" id="sum_2">
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
        </table>

        <!-- 등급별 인원수 -->
<!--        <table border="1" class="window rank_3" style="">-->
<!--            <tr align="center">-->
<!--                <td align="left" class="top">-->
<!--                    등급별 인원을 확인해주세요.-->
<!--                </td>-->
<!--            </tr>-->
<!--            <tr align="center">-->
<!--                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">-->
<!--                    <table border="1" class="content">-->
<!--                        <tr>-->
<!--                            <td style="height: 45px; width: 25%; border-right: hidden;">-->
<!--                                등급-->
<!--                            </td>-->
<!--                            <td style="width: 75%;">-->
<!--                                <table border="0" style="width: 95%; border-collapse: collapse; border: black; word-break: break-all;">-->
<!--                                    <tr align="center">-->
<!--                                        <td width="10%" style="border-top: hidden; border-left: hidden; border-bottom: hidden;">-->
<!--                                            1-->
<!--                                        </td>-->
<!--                                        <td width="10%" style="border-top: hidden; border-bottom: hidden;">-->
<!--                                            2-->
<!--                                        </td>-->
<!--                                        <td width="10%" style="border-top: hidden; border-bottom: hidden;">-->
<!--                                            3-->
<!--                                        </td>-->
<!--                                        <td width="10%" style="border-top: hidden; border-bottom: hidden;">-->
<!--                                            4-->
<!--                                        </td>-->
<!--                                        <td width="10%" style="border-top: hidden; border-bottom: hidden;">-->
<!--                                            5-->
<!--                                        </td>-->
<!--                                        <td width="10%" style="border-top: hidden; border-bottom: hidden;">-->
<!--                                            6-->
<!--                                        </td>-->
<!--                                        <td width="10%" style="border-top: hidden; border-bottom: hidden;">-->
<!--                                            7-->
<!--                                        </td>-->
<!--                                        <td width="10%" style="border-top: hidden; border-bottom: hidden;">-->
<!--                                            8-->
<!--                                        </td>-->
<!--                                        <td width="10%" style="border-top: hidden; border-right: hidden; border-bottom: hidden;">-->
<!--                                            9-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                </table>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td style="height: 45px; width: 25%; border-right: hidden;">-->
<!--                                인원수-->
<!--                            </td>-->
<!--                            <td style="width: 75%;">-->
<!--                                <table border="0" style="width: 95%; border-collapse: collapse; border: black; word-break: break-all;">-->
<!--                                    <tr align="center">-->
<!--                                        <td width="10%" style="border-top: hidden; border-left: hidden; border-bottom: hidden;">-->
<!--                                            <a id="Rank1">&nbsp;</a>-->
<!--                                        </td>-->
<!--                                        <td width="10%" style="border-top: hidden; border-bottom: hidden;">-->
<!--                                            <a id="Rank2"></a>-->
<!--                                        </td>-->
<!--                                        <td width="10%" style="border-top: hidden; border-bottom: hidden;">-->
<!--                                            <a id="Rank3"></a>-->
<!--                                        </td>-->
<!--                                        <td width="10%" style="border-top: hidden; border-bottom: hidden;">-->
<!--                                            <a id="Rank4"></a>-->
<!--                                        </td>-->
<!--                                        <td width="10%" style="border-top: hidden; border-bottom: hidden;">-->
<!--                                            <a id="Rank5"></a>-->
<!--                                        </td>-->
<!--                                        <td width="10%" style="border-top: hidden; border-bottom: hidden;">-->
<!--                                            <a id="Rank6"></a>-->
<!--                                        </td>-->
<!--                                        <td width="10%" style="border-top: hidden; border-bottom: hidden;">-->
<!--                                            <a id="Rank7"></a>-->
<!--                                        </td>-->
<!--                                        <td width="10%" style="border-top: hidden; border-bottom: hidden;">-->
<!--                                            <a id="Rank8"></a>-->
<!--                                        </td>-->
<!--                                        <td width="10%" style="border-top: hidden; border-right: hidden; border-bottom: hidden;">-->
<!--                                            <a id="Rank9"></a>-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                </table>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                    </table>-->
<!--                </td>-->
<!--            </tr>-->
<!--        </table>-->

        <!-- 성적처리 결과 -->
        <table border="1" class="window rank_4">
            <tr align="center">
                <td align="left" class="top">
                    변환된 성적을 확인해주세요.
                </td>
            </tr>
            <tr align="center">
                <td style="height: auto; padding-top: 35px; padding-bottom: 35px;">
                    <table border="1" class="content">
                        <tr>
                            <td style="height: 60px; width: 25%; border-right: hidden;">
                                석차백분율(%)
                            </td>
                            <td style="width: 75%;">
                                <input type="text" class="input" name="rank_percent" id="rank_percent" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td style="height: 60px; width: 25%; border-right: hidden;">
                                석차등급
                            </td>
                            <td style="width: 75%;">
                                <input type="text" class="input" name="rank_grade" id="rank_grade" readonly>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- 버튼 -->
        <div style="height: 50px; width: 160px; margin: auto; margin-top: 30px; margin-bottom: 30px;">
            <button onclick="location.href='../'" class="cancel">
                취&nbsp;&nbsp;소
            </button>
        </div>
    </div>
</div>
</body>
</html>
