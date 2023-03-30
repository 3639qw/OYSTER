<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/Dictionary.php";

class SAT_Rank extends Dictionary
{

    // 원점수,표준점수 정보
    function Kor_Raw($year,$kor_code){
        $ac = new Academic_Integrate();

        $sql = "
        SELECT
        id,
        korean
        
        FROM SAT.sat_record
        where apply_year = '".$year."'
        AND korean_bool = 'Y'
        AND korean_code = '".$kor_code."'
        order by korean desc;
        ";

        $result = mysqli_query($this->con,$sql);

        while ($row = mysqli_fetch_assoc($result)){
            $record['raw'][$row['id']] = $row['korean'];
        }
        $avg = $ac->statistics->Array_Mean($record['raw']);
        $sd = $ac->statistics->Array_SD($record['raw'],$avg);

        foreach ($record['raw'] as $key => $value){
            $record['std'][$key] = round(20*(($value - $avg) / $sd)+100);
        }

        return $record;
    }
    function Math_Raw($year,$math_code){
        $ac = new Academic_Integrate();

        $sql = "
        SELECT
        id,
        math
        
        FROM SAT.sat_record
        where apply_year = '".$year."'
        AND math_bool = 'Y'
        AND math_code = '".$math_code."'
        order by math desc;
        ";

        $result = mysqli_query($this->con,$sql);

        while ($row = mysqli_fetch_assoc($result)){
            $record['raw'][$row['id']] = $row['math'];
        }
        $avg = $ac->statistics->Array_Mean($record['raw']);
        $sd = $ac->statistics->Array_SD($record['raw'],$avg);

        foreach ($record['raw'] as $key => $value){
            $record['std'][$key] = round(20*(($value - $avg) / $sd)+100);
        }

        return $record;
    }

    // SAT 성적정보
    // $year: 응시학년도
    // $kor_bool: 국어 산출여부
    // $math_bool: 수학 산출여부
    // $eng_bool: 영어 산출여부
    // $kor_code: 국어 선택과목코드
    // $math_code: 수학 선택과목코드
    function SAT_Exam($year,$kor_bool,$math_bool,$kor_code,$math_code){

        $ac_record = new Academic_Integrate();

        // SAT 성적
        // 산출과정

        // 1. 영역별 응시자수 산출
        // 2. 영역별 원점수,표준점수 산출
        // 3. 표준점수를 기준으로 한 석차 산출
        // 4. 백분위 산출을 위한 표준점수별 도수분포표 작성
        // 5. 표준점수에 의한 백분위 산출
        // 6. 응시자수에 따라 등급별 분포표에 석차를 대입하여 동석차를 고려하지 않고 등급 산출

        // ** 종합영역 산출시작
        // 7. 해당 학년도 수능에 응시한 모든 응시자수를 산출한다
        // 8. 영역별 표준점수와 응시자수의 합을 더한다
        // 9. 표준점수의 합을 전영역 응시자수의합으로 나눈후 반올림한다
        // 10. 표준점수를 기준으로 한 석차 산출
        // 11. 백분위 산출을 위한 표준점수별 도수분포표 작성
        // 12. 표준점수에 의한 백분위 산출
        // 13. 응시자수에 따라 등급별 분포표에 석차를 대입하여 동석차를 고려하지 않고 등급 산출
        

        // 통계자료
        // 21. 등급별 백분위
        // 22. 영역별 등급컷 표준점수

        // 23. 원점수별 표준점수

        // 24. 표준점수별 백분위
        // 25. 표준점수별 등급
        // 26. 표준점수 급간별 비율

        // 27. 등급 급간별 비율

        // 28. 원점수 급간별 비율

        $sat = [];

        $sat['document'] = $year.'학년도 SAT 성적';
        $sat['year'] = $year;
        $sat['bool']['kor'] = $kor_bool;
        $sat['bool']['math'] = $math_bool;
        $sat['code']['kor'] = $kor_code;
        $sat['code']['math'] = $math_code;




        // 1. 영역별 응시자수 산출
        if($kor_bool == 'Y'){
            $kor_var_sql = "
            SELECT
            count(korean) as count
            
            FROM SAT.sat_record
            WHERE apply_year = '".$year."'
            AND korean_bool = 'Y'
            AND korean_code = '".$kor_code."';
            ";
            $sat['sum']['kor'] = mysqli_fetch_assoc(mysqli_query($this->con,$kor_var_sql));
        }
        if($math_bool == 'Y'){
            $math_var_sql = "
            SELECT
            count(math) as count
            
            FROM SAT.sat_record
            WHERE apply_year = '".$year."'
            AND math_bool = 'Y'
            AND math_code = '".$math_code."';
            ";
            $sat['sum']['math'] = mysqli_fetch_assoc(mysqli_query($this->con,$math_var_sql));
        }

        // 2. 영역별 원점수,표준점수 산출
        if($kor_bool == 'Y'){
            $sat['record']['kor'] = $this->Kor_Raw($year,$kor_code);
            $sat['AS']['kor']['Average'] = $ac_record->statistics->Array_Mean($sat['record']['kor']['raw']);
            $sat['AS']['kor']['SD'] = $ac_record->statistics->Array_SD($sat['record']['kor']['raw'],$sat['AS']['kor']['Average']);
        }
        if($math_bool == 'Y'){
            $sat['record']['math'] = $this->Math_Raw($year,$math_code);
            $sat['AS']['math']['Average'] = $ac_record->statistics->Array_Mean($sat['record']['math']['raw']);
            $sat['AS']['math']['SD'] = $ac_record->statistics->Array_SD($sat['record']['math']['raw'],$sat['AS']['math']['Average']);
        }

        // 3. 표준점수를 기준으로 한 석차 산출
        if($kor_bool == 'Y'){
            foreach ($ac_record->statistics->HIGH_Rank($sat['record']['kor']['std']) as $key => $value){
                $sat['Rank']['kor'][$key] = $value;
            }
        }
        if($math_bool == 'Y'){
            foreach ($ac_record->statistics->HIGH_Rank($sat['record']['math']['std']) as $key => $value){
                $sat['Rank']['math'][$key] = $value;
            }
        }

        // 4. 백분위 산출을 위한 표준점수별 도수분포표 작성
        if($kor_bool == 'Y'){
            foreach ($sat['record']['kor']['std'] as $key => $value){
                $sat['Tie']['kor'][$value] ++;
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['record']['math']['std'] as $key => $value){
                $sat['Tie']['math'][$value] ++;
            }
        }

        // 5. 표준점수에 의한 백분위 산출
        if($kor_bool == 'Y'){
            foreach ($sat['record']['kor']['std'] as $key => $value){
                if($sat['Tie']['kor'][$value] == 1){
                    $sat['Percentile']['kor'][$key] = 100 - round(($sat['Rank']['kor'][$key] / $sat['sum']['kor']['count']) * 100);
                }else{
                    $sat['Percentile']['kor'][$key] = 100 - round((($sat['Rank']['kor'][$key] +  ($sat['Tie']['kor'][$value] / 2)) / $sat['sum']['kor']['count']) * 100);
                }
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['record']['math']['std'] as $key => $value){
                if($sat['Tie']['math'][$value] == 1){
                    $sat['Percentile']['math'][$key] = 100 - round(($sat['Rank']['math'][$key] / $sat['sum']['math']['count']) * 100);
                }else{
                    $sat['Percentile']['math'][$key] = 100 - round((($sat['Rank']['math'][$key] +  ($sat['Tie']['math'][$value] / 2)) / $sat['sum']['math']['count']) * 100);
                }
            }
        }

        // 6. 응시자수에 따라 등급별 분포표에 석차를 대입하여 동석차를 고려하지 않고 등급 산출
        if($kor_bool == 'Y'){
            $sat['Table']['kor'] = $this->Grade_Table($sat['sum']['kor']['count']);
            foreach ($sat['Rank']['kor'] as $k => $v){
                foreach ($sat['Table']['kor']['Rank'] as $key => $value){
                    if($v <= $value){
                        $sat['Grade']['kor'][$k] = $key;
                        break;
                    }
                }
            }
        }
        if($math_bool == 'Y'){
            $sat['Table']['math'] = $this->Grade_Table($sat['sum']['math']['count']);
            foreach ($sat['Rank']['math'] as $k => $v){
                foreach ($sat['Table']['math']['Rank'] as $key => $value){
                    if($v <= $value){
                        $sat['Grade']['math'][$k] = $key;
                        break;
                    }
                }
            }
        }


        // 7. 해당 학년도 수능에 응시한 모든 응시자수를 산출한다
        $all_count_sql = "
        select count(id) as count from SAT.sat_record where apply_year = '2020';
        ";
        $sat['sum']['merged'] = mysqli_fetch_assoc(mysqli_query($this->con,$all_count_sql));
        $id_sql = "
        select id as count from SAT.sat_record where apply_year = '2020' order by id asc;
        ";
        $id_result = mysqli_query($this->con,$id_sql);
        while ($idc = mysqli_fetch_assoc($id_result)){
            foreach ($idc as $key => $value){
                $mr[$value] = $value;
            }
        }

        // 8. 영역별 표준점수와 응시자수의 합을 더한다
        // 9. 표준점수의 합을 전영역 응시자수의합으로 나눈후 반올림한다
        foreach ($mr as $key => $value){
            $sat['record']['merged']['std'][$key] += ($sat['record']['kor']['std'][$key] * $sat['sum']['kor']['count']);
            $sat['record']['merged']['std'][$key] += ($sat['record']['math']['std'][$key] * $sat['sum']['math']['count']);
            $sat['record']['merged']['std'][$key] = round(($sat['record']['merged']['std'][$key] / ($sat['sum']['kor']['count'] + $sat['sum']['math']['count'])),0);
        }
        arsort($sat['record']['merged']['std']);

        // 10. 표준점수를 기준으로 한 석차 산출
        foreach ($ac_record->statistics->HIGH_Rank($sat['record']['merged']['std']) as $key => $value){
            $sat['Rank']['merged'][$key] = $value;
        }

        // 11. 백분위 산출을 위한 표준점수별 도수분포표 작성
        foreach ($sat['record']['merged']['std'] as $key => $value){
            $sat['Tie']['merged'][$value] ++;
        }

        // 12. 표준점수에 의한 백분위 산출
        foreach ($sat['record']['merged']['std'] as $key => $value){
            if($sat['Tie']['merged'][$value] == 1){
                $sat['Percentile']['merged'][$key] = 100 - round(($sat['Rank']['merged'][$key] / $sat['sum']['merged']['count']) * 100);
            }else{
                $sat['Percentile']['merged'][$key] = 100 - round((($sat['Rank']['merged'][$key] + ($sat['Tie']['merged'][$value] / 2)) / $sat['sum']['merged']['count']) * 100);
            }
        }

        // 13. 응시자수에 따라 등급별 분포표에 석차를 대입하여 동석차를 고려하지 않고 등급 산출
        $sat['Table']['merged'] = $this->Grade_Table($sat['sum']['merged']['count']);
        foreach ($sat['Rank']['merged'] as $k => $v){
            foreach ($sat['Table']['merged']['Rank'] as $key => $value){
                if($v <= $value){
                    $sat['Grade']['merged'][$k] = $key;
                    break;
                }
            }
        }







        // 21. 영역별 등급컷 백분위
        if($kor_bool == 'Y'){
            foreach ($sat['Grade']['kor'] as $key => $value){
                $sat['Statistics']['등급컷']['백분위']['kor'][$value] = $sat['Percentile']['kor'][$key];
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['Grade']['math'] as $key => $value){
                $sat['Statistics']['등급컷']['백분위']['math'][$value] = $sat['Percentile']['math'][$key];
            }
        }
        foreach ($sat['Grade']['merged'] as $key => $value){
            $sat['Statistics']['등급컷']['백분위']['merged'][$value] = $sat['Percentile']['merged'][$key];
        }

        // 22. 영역별 등급컷 표준점수,원점수
        if($kor_bool == 'Y'){
            foreach ($sat['Grade']['kor'] as $key => $value){
                $sat['Statistics']['등급컷']['표준점수']['kor'][$value] = $sat['record']['kor']['std'][$key];
                $sat['Statistics']['등급컷']['원점수']['kor'][$value] = $sat['record']['kor']['raw'][$key];
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['Grade']['math'] as $key => $value){
                $sat['Statistics']['등급컷']['표준점수']['math'][$value] = $sat['record']['math']['std'][$key];
                $sat['Statistics']['등급컷']['원점수']['math'][$value] = $sat['record']['math']['raw'][$key];
            }
        }
        foreach ($sat['Grade']['merged'] as $key => $value){
            $sat['Statistics']['등급컷']['표준점수']['merged'][$value] = $sat['record']['merged']['std'][$key];
        }




        // 23. 원점수별 표준점수
        if($kor_bool == 'Y'){
            foreach ($sat['record']['kor']['raw'] as $key => $value){
                $sat['Statistics']['원점수 급간별 비율']['count']['kor'][$value] ++;
                $sat['Statistics']['원점수별 표준점수']['kor'][$value] = $sat['record']['kor']['std'][$key];
            }
            foreach ($sat['Statistics']['원점수 급간별 비율']['count']['kor'] as $key => $value){
                $sat['Statistics']['원점수 급간별 비율']['percent']['kor'][$key] = round($value,2);
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['record']['math']['raw'] as $key => $value){
                $sat['Statistics']['원점수 급간별 비율']['count']['math'][$value] ++;
                $sat['Statistics']['원점수별 표준점수']['math'][$value] = $sat['record']['math']['std'][$key];
            }
            foreach ($sat['Statistics']['원점수 급간별 비율']['count']['math'] as $key => $value){
                $sat['Statistics']['원점수 급간별 비율']['percent']['math'][$key] = round($value,2);
            }
        }




        // 24. 표준점수별 백분위
        if($kor_bool == 'Y'){
            foreach ($sat['record']['kor']['std'] as $key => $value){
                $sat['Statistics']['표준점수별 백분위']['kor'][$value] = $sat['Percentile']['kor'][$key];
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['record']['math']['std'] as $key => $value){
                $sat['Statistics']['표준점수별 백분위']['math'][$value] = $sat['Percentile']['math'][$key];
            }
        }

        // 25. 표준점수별 등급
        if($kor_bool == 'Y'){
            foreach ($sat['record']['kor']['std'] as $key => $value){
                $sat['Statistics']['표준점수별 등급']['kor'][$value] = $sat['Grade']['kor'][$key];
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['record']['math']['std'] as $key => $value){
                $sat['Statistics']['표준점수별 등급']['math'][$value] = $sat['Grade']['math'][$key];
            }
        }

        // 26. 표준점수 급간별 비율
        if($kor_bool == 'Y'){
            foreach ($sat['record']['kor']['std'] as $key => $value){
                if($value < 60){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['50'] ++;
                }else if($value >= 60 && $value <= 69){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['60'] ++;
                }else if($value >= 70 && $value <= 79){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['70'] ++;
                }else if($value >= 80 && $value <= 89){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['80'] ++;
                }else if($value >= 90 && $value <= 99){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['90'] ++;
                }else if($value >= 100 && $value <= 109){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['100'] ++;
                }else if($value >= 110 && $value <= 119){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['110'] ++;
                }else if($value >= 120 && $value <= 129){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['120'] ++;
                }else if($value >= 130 && $value <= 139){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['130'] ++;
                }else if($value >= 140 && $value <= 149){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['140'] ++;
                }else if($value >= 150){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['150'] ++;
                }
                $sat['Statistics']['표준점수 급간별 비율']['all']['count']['kor'][$value] ++;
            }
            foreach ($sat['Statistics']['표준점수 급간별 비율']['count']['kor'] as $key => $value){
                $sat['Statistics']['표준점수 급간별 비율']['percent']['kor'][$key] = round(($value / $sat['sum']['kor']['count']) * 100,2);
            }
            foreach ($sat['Statistics']['표준점수 급간별 비율']['all']['count']['kor'] as $key => $value){
                $sat['Statistics']['표준점수 급간별 비율']['all']['percent']['kor'][$key] = round(($value / $sat['sum']['kor']['count']) * 100,2);
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['record']['math']['std'] as $key => $value){
                if($value < 60){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['50'] ++;
                }else if($value >= 60 && $value <= 69){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['60'] ++;
                }else if($value >= 70 && $value <= 79){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['70'] ++;
                }else if($value >= 80 && $value <= 89){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['80'] ++;
                }else if($value >= 90 && $value <= 99){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['90'] ++;
                }else if($value >= 100 && $value <= 109){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['100'] ++;
                }else if($value >= 110 && $value <= 119){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['110'] ++;
                }else if($value >= 120 && $value <= 129){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['120'] ++;
                }else if($value >= 130 && $value <= 139){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['130'] ++;
                }else if($value >= 140 && $value <= 149){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['140'] ++;
                }else if($value >= 150){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['150'] ++;
                }
                $sat['Statistics']['표준점수 급간별 비율']['all']['count']['math'][$value] ++;
            }
            foreach ($sat['Statistics']['표준점수 급간별 비율']['count']['math'] as $key => $value){
                $sat['Statistics']['표준점수 급간별 비율']['percent']['math'][$key] = round(($value / $sat['sum']['math']['count']) * 100,2);
            }
            foreach ($sat['Statistics']['표준점수 급간별 비율']['all']['count']['math'] as $key => $value){
                $sat['Statistics']['표준점수 급간별 비율']['all']['percent']['math'][$key] = round(($value / $sat['sum']['math']['count']) * 100,2);
            }
        }
        foreach ($sat['record']['merged']['std'] as $key => $value){
            if($value < 60){
                $sat['Statistics']['표준점수 급간별 비율']['count']['merged']['50'] ++;
            }else if($value >= 60 && $value <= 69){
                $sat['Statistics']['표준점수 급간별 비율']['count']['merged']['60'] ++;
            }else if($value >= 70 && $value <= 79){
                $sat['Statistics']['표준점수 급간별 비율']['count']['merged']['70'] ++;
            }else if($value >= 80 && $value <= 89){
                $sat['Statistics']['표준점수 급간별 비율']['count']['merged']['80'] ++;
            }else if($value >= 90 && $value <= 99){
                $sat['Statistics']['표준점수 급간별 비율']['count']['merged']['90'] ++;
            }else if($value >= 100 && $value <= 109){
                $sat['Statistics']['표준점수 급간별 비율']['count']['merged']['100'] ++;
            }else if($value >= 110 && $value <= 119){
                $sat['Statistics']['표준점수 급간별 비율']['count']['merged']['110'] ++;
            }else if($value >= 120 && $value <= 129){
                $sat['Statistics']['표준점수 급간별 비율']['count']['merged']['120'] ++;
            }else if($value >= 130 && $value <= 139){
                $sat['Statistics']['표준점수 급간별 비율']['count']['merged']['130'] ++;
            }else if($value >= 140 && $value <= 149){
                $sat['Statistics']['표준점수 급간별 비율']['count']['merged']['140'] ++;
            }else if($value >= 150){
                $sat['Statistics']['표준점수 급간별 비율']['count']['merged']['150'] ++;
            }
            $sat['Statistics']['표준점수 급간별 비율']['all']['count']['merged'][$value] ++;
        }
        foreach ($sat['Statistics']['표준점수 급간별 비율']['count']['merged'] as $key => $value){
            $sat['Statistics']['표준점수 급간별 비율']['percent']['merged'][$key] = round(($value / $sat['sum']['merged']['count']) * 100,2);
        }
        foreach ($sat['Statistics']['표준점수 급간별 비율']['all']['count']['merged'] as $key => $value){
            $sat['Statistics']['표준점수 급간별 비율']['all']['percent']['merged'][$key] = round(($value / $sat['sum']['merged']['count']) * 100,2);
        }




        // 27. 등급 급간별 비율
        if($kor_bool == 'Y'){
            foreach ($sat['Grade']['kor'] as $key => $value){
                $sat['Statistics']['등급 급간별 비율']['kor'][$value] ++;
            }
            foreach ($sat['Statistics']['등급 급간별 비율']['kor'] as $key => $value){
                $sat['Statistics']['등급 급간별 비율']['kor'][$key] = round(($value / $sat['sum']['kor']['count']) * 100,2);
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['Grade']['math'] as $key => $value){
                $sat['Statistics']['등급 급간별 비율']['math'][$value] ++;
            }
            foreach ($sat['Statistics']['등급 급간별 비율']['math'] as $key => $value){
                $sat['Statistics']['등급 급간별 비율']['math'][$key] = round(($value / $sat['sum']['math']['count']) * 100,2);
            }
        }
        foreach ($sat['Grade']['merged'] as $key => $value){
            $sat['Statistics']['등급 급간별 비율']['merged'][$value] ++;
        }
        foreach ($sat['Statistics']['등급 급간별 비율']['merged'] as $key => $value){
            $sat['Statistics']['등급 급간별 비율']['merged'][$key] = round(($value / $sat['sum']['merged']['count']) * 100,2);
        }




        // 28. 원점수 급간별 비율
        if($kor_bool == 'Y'){
            foreach ($sat['record']['kor']['raw'] as $key => $value){
                if($value < 10){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['0'] ++;
                }else if($value >= 10 && $value <= 19){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['1'] ++;
                }else if($value >= 20 && $value <= 29){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['2'] ++;
                }else if($value >= 30 && $value <= 39){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['3'] ++;
                }else if($value >= 40 && $value <= 49){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['4'] ++;
                }else if($value >= 50 && $value <= 59){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['5'] ++;
                }else if($value >= 60 && $value <= 69){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['6'] ++;
                }else if($value >= 70 && $value <= 79){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['7'] ++;
                }else if($value >= 80 && $value <= 89){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['8'] ++;
                }else if($value >= 90 && $value <= 100){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['9'] ++;
                }
            }
            foreach ($sat['Statistics']['원점수 급간별 비율']['kor'] as $key => $value){
                $sat['Statistics']['원점수 급간별 비율']['kor'][$key] = round(($value / $sat['sum']['kor']['count']) * 100,2);
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['record']['math']['raw'] as $key => $value){
                if($value < 10){
                    $sat['Statistics']['원점수 급간별 비율']['math']['0'] ++;
                }else if($value >= 10 && $value <= 19){
                    $sat['Statistics']['원점수 급간별 비율']['math']['1'] ++;
                }else if($value >= 20 && $value <= 29){
                    $sat['Statistics']['원점수 급간별 비율']['math']['2'] ++;
                }else if($value >= 30 && $value <= 39){
                    $sat['Statistics']['원점수 급간별 비율']['math']['3'] ++;
                }else if($value >= 40 && $value <= 49){
                    $sat['Statistics']['원점수 급간별 비율']['math']['4'] ++;
                }else if($value >= 50 && $value <= 59){
                    $sat['Statistics']['원점수 급간별 비율']['math']['5'] ++;
                }else if($value >= 60 && $value <= 69){
                    $sat['Statistics']['원점수 급간별 비율']['math']['6'] ++;
                }else if($value >= 70 && $value <= 79){
                    $sat['Statistics']['원점수 급간별 비율']['math']['7'] ++;
                }else if($value >= 80 && $value <= 89){
                    $sat['Statistics']['원점수 급간별 비율']['math']['8'] ++;
                }else if($value >= 90 && $value <= 100){
                    $sat['Statistics']['원점수 급간별 비율']['math']['9'] ++;
                }
            }
            foreach ($sat['Statistics']['원점수 급간별 비율']['math'] as $key => $value){
                $sat['Statistics']['원점수 급간별 비율']['math'][$key] = round(($value / $sat['sum']['math']['count']) * 100,2);
            }
        }






        unset($sat['Table']);
//        unset($sat['Tie']);
//        unset($sat['Rank']);


        return $sat;
    }


    // SAT 성적정보
    // $year: 응시학년도
    // $kor_bool: 국어 산출여부
    // $math_bool: 수학 산출여부
    // $eng_bool: 영어 산출여부
    // $kor_code: 국어 선택과목코드
    // $math_code: 수학 선택과목코드
    function SAT_Info($year,$kor_bool,$math_bool,$kor_code,$math_code){

        $ac_record = new Academic_Integrate();

        // SAT 성적
        // 산출과정

        // 성적자료
        // 1. 영역,선택과목별 평균, 표준편차 산출
        // 2. 영역,선택과목별 응시자수 산출
        // 3. 영역,선택과목별 표준점수 산출
        // 4. 표준점수를 기준으로 한 석차 산출
        // 5. 백분위 산출을 위한 표준점수별 도수분포표 작성
        // 6. 표준점수에 의한 백분위 산출
        // 7. 응시자수에 따라 등급별 분포표에 석차를 대입하여 동석차를 고려하지 않고 등급 산출

        // 통계자료
        // 21. 등급별 백분위
        // 22. 영역별 등급컷 표준점수

        // 23. 원점수별 표준점수

        // 24. 표준점수별 백분위
        // 25. 표준점수별 등급
        // 26. 표준점수 급간별 비율

        // 27. 등급 급간별 비율

        // 28. 원점수 급간별 비율
        // 리턴


        $sat = [];

        $sat['document'] = $year.'학년도 SAT 성적';
        $sat['year'] = $year;
        $sat['bool']['kor'] = $kor_bool;
        $sat['bool']['math'] = $math_bool;
        $sat['code']['kor'] = $kor_code;
        $sat['code']['math'] = $math_code;

        // 1. 영역,선택과목별 평균, 표준편차 산출

        // 2. 영역,선택과목별 응시자수 산출
        if($kor_bool == 'Y'){
            $kor_var_sql = "
            SELECT
            count(korean) as count
            
            FROM SAT.sat_record
            WHERE apply_year = '".$year."'
            AND korean_bool = 'Y'
            AND korean_code = '".$kor_code."';
            ";
            $sat['sum']['kor'] = mysqli_fetch_assoc(mysqli_query($this->con,$kor_var_sql));
        }
        if($math_bool == 'Y'){
            $math_var_sql = "
            SELECT
            count(math) as count
            
            FROM SAT.sat_record
            WHERE apply_year = '".$year."'
            AND math_bool = 'Y'
            AND math_code = '".$math_code."';
            ";
            $sat['sum']['math'] = mysqli_fetch_assoc(mysqli_query($this->con,$math_var_sql));
        }

        // 3. 영역,선택과목별 표준점수 산출
        if($kor_bool == 'Y'){
            $sat['Raw']['kor'] = $this->Kor_Raw($year,$kor_code);
            $sat['AS']['kor']['Average'] = $ac_record->statistics->Array_Mean($sat['Raw']['kor']['raw']);
            $sat['AS']['kor']['SD'] = $ac_record->statistics->Array_SD($sat['Raw']['kor'],$sat['AS']['kor']['Average']);
            foreach ($sat['Raw']['kor'] as $key => $value){
                $sat['Standard_Score']['kor'][$key] = round(20*(($value - $sat['AS']['kor']['Average']) / $sat['AS']['kor']['SD'])+100);
            }
        }
        if($math_bool == 'Y'){
            $sat['Raw']['math'] = $this->Math_Raw($year,$math_code);
            $sat['AS']['math']['Average'] = $ac_record->statistics->Array_Mean($sat['Raw']['math']);
            $sat['AS']['math']['SD'] = $ac_record->statistics->Array_SD($sat['Raw']['math'],$sat['AS']['math']['Average']);
            foreach ($sat['Raw']['math'] as $key => $value){
                $sat['Standard_Score']['math'][$key] = round(20*(($value - $sat['AS']['math']['Average']) / $sat['AS']['math']['SD'])+100);
            }
        }

        // 4. 표준점수를 기준으로 한 석차 산출
        if($kor_bool == 'Y'){
            foreach ($ac_record->statistics->HIGH_Rank($sat['Standard_Score']['kor']) as $key => $value){
                $sat['Rank']['kor'][$key] = $value;
            }
        }
        if($math_bool == 'Y'){
            foreach ($ac_record->statistics->HIGH_Rank($sat['Standard_Score']['math']) as $key => $value){
                $sat['Rank']['math'][$key] = $value;
            }
        }

        // 5. 백분위 산출을 위한 표준점수별 도수분포표 작성
        if($kor_bool == 'Y'){
            foreach ($sat['Standard_Score']['kor'] as $key => $value){
                $sat['Tie']['kor'][$value] ++;
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['Standard_Score']['math'] as $key => $value){
                $sat['Tie']['math'][$value] ++;
            }
        }

        // 6. 표준점수에 의한 백분위 산출
        if($kor_bool == 'Y'){
            foreach ($sat['Standard_Score']['kor'] as $key => $value){
                if($sat['Tie']['kor'][$value] == 1){
                    $sat['Percentile']['kor'][$key] = 100 - round(($sat['Rank']['kor'][$key] / $sat['sum']['kor']['count']) * 100);
                }else{
                    $sat['Percentile']['kor'][$key] = 100 - round((($sat['Rank']['kor'][$key] +  ($sat['Tie']['kor'][$value] / 2)) / $sat['sum']['kor']['count']) * 100);
                }
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['Standard_Score']['math'] as $key => $value){
                if($sat['Tie']['math'][$value] == 1){
                    $sat['Percentile']['math'][$key] = 100 - round(($sat['Rank']['math'][$key] / $sat['sum']['math']['count']) * 100);
                }else{
                    $sat['Percentile']['math'][$key] = 100 - round((($sat['Rank']['math'][$key] +  ($sat['Tie']['math'][$value] / 2)) / $sat['sum']['math']['count']) * 100);
                }
            }
        }

        // 7. 응시자수에 따라 등급별 분포표에 석차를 대입하여 동석차를 고려하지 않고 등급 산출
        if($kor_bool == 'Y'){
            $sat['Table']['kor'] = $this->Grade_Table($sat['sum']['kor']['count']);
            foreach ($sat['Rank']['kor'] as $k => $v){
                foreach ($sat['Table']['kor']['Rank'] as $key => $value){
                    if($v <= $value){
                        $sat['Grade']['kor'][$k] = $key;
                        break;
                    }
                }
            }
        }
        if($math_bool == 'Y'){
            $sat['Table']['math'] = $this->Grade_Table($sat['sum']['math']['count']);
            foreach ($sat['Rank']['math'] as $k => $v){
                foreach ($sat['Table']['math']['Rank'] as $key => $value){
                    if($v <= $value){
                        $sat['Grade']['math'][$k] = $key;
                        break;
                    }
                }
            }
        }




        // 통계자료
        
        // 21. 영역별 등급컷 백분위
        if($kor_bool == 'Y'){
            foreach ($sat['Grade']['kor'] as $key => $value){
                $sat['Statistics']['등급컷']['백분위']['kor'][$value] = $sat['Percentile']['kor'][$key];
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['Grade']['math'] as $key => $value){
                $sat['Statistics']['등급컷']['백분위']['math'][$value] = $sat['Percentile']['math'][$key];
            }
        }

        // 22. 영역별 등급컷 표준점수,원점수
        if($kor_bool == 'Y'){
            foreach ($sat['Grade']['kor'] as $key => $value){
                $sat['Statistics']['등급컷']['표준점수']['kor'][$value] = $sat['Standard_Score']['kor'][$key];
                $sat['Statistics']['등급컷']['원점수']['kor'][$value] = $sat['Raw']['kor'][$key];
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['Grade']['math'] as $key => $value){
                $sat['Statistics']['등급컷']['표준점수']['math'][$value] = $sat['Standard_Score']['math'][$key];
                $sat['Statistics']['등급컷']['원점수']['math'][$value] = $sat['Raw']['math'][$key];
            }
        }




        // 23. 원점수별 표준점수
        if($kor_bool == 'Y'){
            foreach ($sat['Raw']['kor'] as $key => $value){
                $sat['Statistics']['원점수 급간별 비율']['count']['kor'][$value] ++;
                $sat['Statistics']['원점수별 표준점수']['kor'][$value] = $sat['Standard_Score']['kor'][$key];
            }
            foreach ($sat['Statistics']['원점수 급간별 비율']['count']['kor'] as $key => $value){
                $sat['Statistics']['원점수 급간별 비율']['percent']['kor'][$key] = round($value,2);
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['Raw']['math'] as $key => $value){
                $sat['Statistics']['원점수 급간별 비율']['count']['math'][$value] ++;
                $sat['Statistics']['원점수별 표준점수']['math'][$value] = $sat['Standard_Score']['math'][$key];
            }
            foreach ($sat['Statistics']['원점수 급간별 비율']['count']['math'] as $key => $value){
                $sat['Statistics']['원점수 급간별 비율']['percent']['math'][$key] = round($value,2);
            }
        }
        
        
        

        // 24. 표준점수별 백분위
        if($kor_bool == 'Y'){
            foreach ($sat['Standard_Score']['kor'] as $key => $value){
                $sat['Statistics']['표준점수별 백분위']['kor'][$value] = $sat['Percentile']['kor'][$key];
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['Standard_Score']['math'] as $key => $value){
                $sat['Statistics']['표준점수별 백분위']['math'][$value] = $sat['Percentile']['math'][$key];
            }
        }

        // 25. 표준점수별 등급
        if($kor_bool == 'Y'){
            foreach ($sat['Standard_Score']['kor'] as $key => $value){
                $sat['Statistics']['표준점수별 등급']['kor'][$value] = $sat['Grade']['kor'][$key];
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['Standard_Score']['math'] as $key => $value){
                $sat['Statistics']['표준점수별 등급']['math'][$value] = $sat['Grade']['math'][$key];
            }
        }

        // 26. 표준점수 급간별 비율
        if($kor_bool == 'Y'){
            foreach ($sat['Standard_Score']['kor'] as $key => $value){
                if($value < 60){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['50'] ++;
                }else if($value >= 60 && $value <= 69){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['60'] ++;
                }else if($value >= 70 && $value <= 79){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['70'] ++;
                }else if($value >= 80 && $value <= 89){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['80'] ++;
                }else if($value >= 90 && $value <= 99){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['90'] ++;
                }else if($value >= 100 && $value <= 109){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['100'] ++;
                }else if($value >= 110 && $value <= 119){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['110'] ++;
                }else if($value >= 120 && $value <= 129){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['120'] ++;
                }else if($value >= 130 && $value <= 139){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['130'] ++;
                }else if($value >= 140 && $value <= 149){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['140'] ++;
                }else if($value >= 150){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['kor']['150'] ++;
                }
                $sat['Statistics']['표준점수 급간별 비율']['all']['count']['kor'][$value] ++;
            }
            foreach ($sat['Statistics']['표준점수 급간별 비율']['count']['kor'] as $key => $value){
                $sat['Statistics']['표준점수 급간별 비율']['percent']['kor'][$key] = round(($value / $sat['sum']['kor']['count']) * 100,2);
            }
            foreach ($sat['Statistics']['표준점수 급간별 비율']['all']['count']['kor'] as $key => $value){
                $sat['Statistics']['표준점수 급간별 비율']['all']['percent']['kor'][$key] = round(($value / $sat['sum']['kor']['count']) * 100,2);
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['Standard_Score']['math'] as $key => $value){
                if($value < 60){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['50'] ++;
                }else if($value >= 60 && $value <= 69){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['60'] ++;
                }else if($value >= 70 && $value <= 79){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['70'] ++;
                }else if($value >= 80 && $value <= 89){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['80'] ++;
                }else if($value >= 90 && $value <= 99){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['90'] ++;
                }else if($value >= 100 && $value <= 109){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['100'] ++;
                }else if($value >= 110 && $value <= 119){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['110'] ++;
                }else if($value >= 120 && $value <= 129){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['120'] ++;
                }else if($value >= 130 && $value <= 139){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['130'] ++;
                }else if($value >= 140 && $value <= 149){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['140'] ++;
                }else if($value >= 150){
                    $sat['Statistics']['표준점수 급간별 비율']['count']['math']['150'] ++;
                }
                $sat['Statistics']['표준점수 급간별 비율']['all']['count']['math'][$value] ++;
            }
            foreach ($sat['Statistics']['표준점수 급간별 비율']['count']['math'] as $key => $value){
                $sat['Statistics']['표준점수 급간별 비율']['percent']['math'][$key] = round(($value / $sat['sum']['math']['count']) * 100,2);
            }
            foreach ($sat['Statistics']['표준점수 급간별 비율']['all']['count']['math'] as $key => $value){
                $sat['Statistics']['표준점수 급간별 비율']['all']['percent']['math'][$key] = round(($value / $sat['sum']['math']['count']) * 100,2);
            }
        }

        
        
        
        // 27. 등급 급간별 비율
        if($kor_bool == 'Y'){
            foreach ($sat['Grade']['kor'] as $key => $value){
                $sat['Statistics']['등급 급간별 비율']['kor'][$value] ++;
            }
            foreach ($sat['Statistics']['등급 급간별 비율']['kor'] as $key => $value){
                $sat['Statistics']['등급 급간별 비율']['kor'][$key] = round(($value / $sat['sum']['kor']['count']) * 100,2);
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['Grade']['math'] as $key => $value){
                $sat['Statistics']['등급 급간별 비율']['math'][$value] ++;
            }
            foreach ($sat['Statistics']['등급 급간별 비율']['math'] as $key => $value){
                $sat['Statistics']['등급 급간별 비율']['math'][$key] = round(($value / $sat['sum']['math']['count']) * 100,2);
            }
        }




        // 28. 원점수 급간별 비율
        if($kor_bool == 'Y'){
            foreach ($sat['Raw']['kor'] as $key => $value){
                if($value < 10){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['0'] ++;
                }else if($value >= 10 && $value <= 19){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['1'] ++;
                }else if($value >= 20 && $value <= 29){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['2'] ++;
                }else if($value >= 30 && $value <= 39){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['3'] ++;
                }else if($value >= 40 && $value <= 49){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['4'] ++;
                }else if($value >= 50 && $value <= 59){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['5'] ++;
                }else if($value >= 60 && $value <= 69){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['6'] ++;
                }else if($value >= 70 && $value <= 79){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['7'] ++;
                }else if($value >= 80 && $value <= 89){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['8'] ++;
                }else if($value >= 90 && $value <= 100){
                    $sat['Statistics']['원점수 급간별 비율']['kor']['9'] ++;
                }
            }
            foreach ($sat['Statistics']['원점수 급간별 비율']['kor'] as $key => $value){
                $sat['Statistics']['원점수 급간별 비율']['kor'][$key] = round(($value / $sat['sum']['kor']['count']) * 100,2);
            }
        }
        if($math_bool == 'Y'){
            foreach ($sat['Raw']['math'] as $key => $value){
                if($value < 10){
                    $sat['Statistics']['원점수 급간별 비율']['math']['0'] ++;
                }else if($value >= 10 && $value <= 19){
                    $sat['Statistics']['원점수 급간별 비율']['math']['1'] ++;
                }else if($value >= 20 && $value <= 29){
                    $sat['Statistics']['원점수 급간별 비율']['math']['2'] ++;
                }else if($value >= 30 && $value <= 39){
                    $sat['Statistics']['원점수 급간별 비율']['math']['3'] ++;
                }else if($value >= 40 && $value <= 49){
                    $sat['Statistics']['원점수 급간별 비율']['math']['4'] ++;
                }else if($value >= 50 && $value <= 59){
                    $sat['Statistics']['원점수 급간별 비율']['math']['5'] ++;
                }else if($value >= 60 && $value <= 69){
                    $sat['Statistics']['원점수 급간별 비율']['math']['6'] ++;
                }else if($value >= 70 && $value <= 79){
                    $sat['Statistics']['원점수 급간별 비율']['math']['7'] ++;
                }else if($value >= 80 && $value <= 89){
                    $sat['Statistics']['원점수 급간별 비율']['math']['8'] ++;
                }else if($value >= 90 && $value <= 100){
                    $sat['Statistics']['원점수 급간별 비율']['math']['9'] ++;
                }
            }
            foreach ($sat['Statistics']['원점수 급간별 비율']['math'] as $key => $value){
                $sat['Statistics']['원점수 급간별 비율']['math'][$key] = round(($value / $sat['sum']['math']['count']) * 100,2);
            }
        }








//        unset($sat['Raw']);
        unset($sat['Rank']);
        unset($sat['Table']);
        unset($sat['Tie']);











        return $sat;
    }


    // 수강자수에 따른 9단계 등급별 인원과 누적 인원 리턴
    // $s: 수강자수
    function Grade_Table($s){

        $rank_grade['1'] = round($s * 0.04);
        $rank_grade['2'] = round(round($s * 0.11) - ($rank_grade['1']));
        $rank_grade['3'] = round(round($s * 0.23) - ($rank_grade['1']+$rank_grade['2']));
        $rank_grade['4'] = round(round($s * 0.40) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']));
        $rank_grade['5'] = round(round($s * 0.60) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']));
        $rank_grade['6'] = round(round($s * 0.77) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']));
        $rank_grade['7'] = round(round($s * 0.89) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']));
        $rank_grade['8'] = round(round($s * 0.96) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']));
        $rank_grade['9'] = round(round($s * 1.00) - ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']));

        // 누적 석차에 따른 등급표
        if($rank_grade['1'] != 0){
            $rank_grade['Rank']['1'] = ($rank_grade['1']);
        }
        if($rank_grade['2'] != 0){
            $rank_grade['Rank']['2'] = ($rank_grade['1']+$rank_grade['2']);
        }
        if($rank_grade['3'] != 0){
            $rank_grade['Rank']['3'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']);
        }
        if($rank_grade['4'] != 0){
            $rank_grade['Rank']['4'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']);
        }
        if($rank_grade['5'] != 0){
            $rank_grade['Rank']['5'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']);
        }
        if($rank_grade['6'] != 0){
            $rank_grade['Rank']['6'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']);
        }
        if($rank_grade['7'] != 0){
            $rank_grade['Rank']['7'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']);
        }
        if($rank_grade['8'] != 0){
            $rank_grade['Rank']['8'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']);
        }
        if($rank_grade['9'] != 0){
            $rank_grade['Rank']['9'] = ($rank_grade['1']+$rank_grade['2']+$rank_grade['3']+$rank_grade['4']+$rank_grade['5']+$rank_grade['6']+$rank_grade['7']+$rank_grade['8']+$rank_grade['9']);
        }


        // 인원수가 0인 경우 배열 삭제
        foreach ($rank_grade as $key => $value){
            if($value == 0){
                unset($rank_grade[$key]);
            }
        }



        return $rank_grade;
    }


}