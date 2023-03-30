<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/Dictionary.php";

class Raw_Rank extends Dictionary
{
    // 가중치 총점 평균을 기준으로 산정한 석차연명부

    // 총점평균 석차연명부 (계열석차, 전체석차)
    // 졸업자, 졸업예정자 누적석차
    // $year: 선택한 학기재적년도
    // $type: 계열
    // $initial: 재적학교 이니셜
    // $isNoN: N일경우 3학년 2학기 성적을 제외한다
    // $isType: N일경우 계열석차가 아닌 전체석차를 매긴다
    function Ranking($year,$type,$initial,$isNoN,$isType){
        $ac_record = new Academic_Integrate();
        // 동석차 발생시에는 아래 우선순위로 석차를 산출한다
        // 1. 전학년 비가중치평균
        // 2. 3학년의 비가중치평균
        // 3. 2학년의 비가중치평균
        // 4. 1학년의 비가중치평균
        
        // 이니셜로 학교명 불러오기
        $sch_sql = "
        select
        name, initial
        from high_sch
        where initial = '".$initial."';
        ";
        $sch_r = mysqli_fetch_assoc(mysqli_query($this->con,$sch_sql));
        
        // 1. 3-2 학기에 재적한 모든 학생의 학번을 불러온다.
        // 2. 재적 인원수를 산출한다.
        // 3. 1-1부터 3-2까지 이수한 일반과목의 원점수를 불러온다 (졸업예정자는 3학년 1학기 까지)
        // 4. 1-1부터 3-2까지 이수한 일반과목의 학점을 불러온다 (졸업예정자는 3학년 1학기 까지)
        // 5. 3과4에서 불러온 값을 곱하여 원점수 가중치 합을 산출한다
        // 6. 5에서 산출한 가중치의 합을 학점수로 나누고 소수점 5째 자리까지 반올림한다
        // 7. 6에서 산출한 총점평균을 바탕으로 석차를 산출한다
        // 8. 7에서 산출한 석차의 동석차 인원수를 산출한다
        // 9. 동석차를 우선순위에 따라 정렬한다
        // 10. 조정된 석차를 기준으로 학생별 백분위를 산출한다
        // 11. 조정된 석차를 기준으로 학생별 등급을 산출한다
        // 12. 배열을 정렬한다
        $record['document'] = '총점평균 석차연명부';
        if($isNoN == 'Y'){
            $record['target'] = '졸업자';
        }else if($isNoN == 'N'){
            $record['target'] = '졸업예정자';
        }
        $record['sch'] = $sch_r['name'];
        $record['initial'] = $sch_r['initial'];
        $record['year'] = $year;
        if($isType == 'N'){
            // 전체석차
            $record['list_type'] = '전체석차';
        }else{
            // 계열석차
            $record['list_type'] = '계열석차';
            // 계열번호
            $record['type'] = $type;
        }

        // 1. 3-2 학기에 재적한 모든 학생의 학번을 불러온다.
        $student_sql = "
        select
        a.stuid, REGEXP_REPLACE(a.stuid,'-".$initial."','')stuid_ini
        from score a, student b, high_sch c
        where a.stuid = b.stuid and b.high_sch = c.name
        ";
        if($isType == 'N'){
            // 전체석차
            $student_sql .= "
            and b.register_32 = '".$year."'
            and c.initial = '".$initial."'
            order by a.stuid asc;
            ";
        }else{
            // 계열석차 (기본)
            $student_sql .= "
            and a.type = '".$type."'
            and b.register_32 = '".$year."'
            and c.initial = '".$initial."'
            order by a.stuid asc;
            ";
        }
        $student_result = mysqli_query($this->con, $student_sql);
        while ($student = mysqli_fetch_assoc($student_result)){
            $stuid[$student['stuid_ini']] = $student['stuid'];
        }
        // 2. 재적 인원수를 산출한다.
        $record['sum'] = count($stuid);
        // 통계값 기본배열 선언
        $record['Mean'] = null;
        $record['SD'] = null;
        $record['Median'] = null;
        $record['Maximum'] = null;
        $record['Minimum'] = null;

        foreach ($stuid as $key => $value){
            // 3. 1-1부터 3-2까지 이수한 일반과목의 원점수를 불러온다
            // 4. 1-1부터 3-2까지 이수한 일반과목의 학점을 불러온다
            $raw = $ac_record->custom_record->Course_Raw($key,$record['sch'],$record['initial']);
            $credit = $ac_record->custom_record->Course_Credit($key,$record['sch'],$record['initial']);

            // 5. 3과4에서 불러온 값을 곱하여 원점수 가중치 합을 산출한다
            foreach ($raw as $k => $v){
                if($isNoN == 'Y'){
                    $record['Average'][$key] += ($v * $credit[$k]);

                    $record['Raw']['Merged'][$key] += $v;
                    $record['Raw'][substr($k,-2,1)][$key] += $v;

                    $record['Course_Count']['Merged'][$key] += 100;
                    $record['Course_Count'][substr($k,-2,1)][$key] += 100;

                    $record['Credit'][$key] += $credit[$k];
                }else if($isNoN == 'N'){
                    if(substr($k,-2) != '32'){
                        $record['Average'][$key] += ($v * $credit[$k]);

                        $record['Raw']['Merged'][$key] += $v;
                        $record['Raw'][substr($k,-2,1)][$key] += $v;

                        $record['Course_Count']['Merged'][$key] += 100;
                        $record['Course_Count'][substr($k,-2,1)][$key] += 100;

                        $record['Credit'][$key] += $credit[$k];
                    }
                }
            }
        }

        // 6. 5에서 산출한 가중치의 합을 학점수로 나누고 소수점 5째 자리까지 반올림한다
        foreach ($record['Average'] as $key => $value){
            $record['Average'][$key] = round($value / $record['Credit'][$key],5);
        }
        foreach ($record['Raw'] as $key => $value){
            foreach ($record['Raw'][$key] as $k => $v){
                $record['Raw'][$key][$k] = round(($v*100) / $record['Course_Count'][$key][$k],5);
            }
        }

        // 7. 6에서 산출한 총점평균을 바탕으로 석차를 산출한다
        foreach ($ac_record->statistics->HIGH_Rank($record['Average']) as $key => $value){
            $record['Rank'][$key] = $value;
        }

        // 8. 7에서 산출한 석차의 동석차 인원수를 산출한다
        $record['Rank_Tie'] = array_count_values($record['Rank']);
        foreach ($record['Rank_Tie'] as $key => $value){
            if($value == 1){
                unset($record['Rank_Tie'][$key]);
            }else{
                $record['Tie_sum'] += $value;
            }
        }

        // 9. 동석차를 우선순위에 따라 정렬한다
        // 동석차가 발생한 학번의 총점의 합을 불러온다
        foreach ($record['Rank'] as $key => $value){
            // 인수 풀이
            // $key: 동석차 등위별 학번, $value: 동석차가 발생한 등위

            if($record['Rank_Tie'][$value] >= 2){
                $record['Tie_Raw'][$value][$key] = $record['Raw']['Merged'][$key];
            }
        }
        ksort($record['Tie_Raw']);

        // 총점의 합을 기준으로 석차를 산정하고 이를 전체석차에 적용한다
        foreach ($record['Tie_Raw'] as $key => $value){
            foreach ($ac_record->statistics->HIGH_Rank($record['Tie_Raw'][$key]) as $k => $v){
                // 인수 풀이
                // $key: 동석차가 발생한 등위, $value: 동석차가 발생한 등위의 학번과 각 학번의 총점
                // $k: 동석차 내에서 석차산출 후 리턴되는 등위별 학번, $v: 동석차 내에서 우선순위에 따른 등위

                // 동석차 중에서 누가 총점이 높은지 가린 후 석차 부여
                $record['Tie_Rank'][$key][$k] = $v;
                // 총점석차를 전체석차에 반영
                $record['Rank'][$k] += $v-1;
            }
        }

        // 10. 조정된 석차를 기준으로 학생별 백분위를 산출한다
        foreach ($record['Rank'] as $key => $value){
            $record['Percentile'][$key] = round(100 - ((100 * $record['Rank'][$key]) / $record['sum']),2);
        }

        // 11. 조정된 석차를 기준으로 학생별 등급을 산출한다
        if($record['sum'] >= 13){
            $RG_tbl = $ac_record->course_rank->Grade_Table($record['sum']);

            foreach ($record['Rank'] as $key => $value){
                foreach ($RG_tbl['Rank'] as $k => $v){
                    if($value <= $v){
                        $record['RG'][$key] = $k;
                        break;
                    }
                }
            }
        }



        // 12. 배열을 정렬한다
        arsort($record['Average']);
        foreach ($record['Raw'] as $key => $value){
            arsort($record['Raw'][$key]);
        }
        asort($record['Rank']);
        arsort($record['Percentile']);
        asort($record['RG']);
        ksort($record['Rank_Tie']);
        unset($record['Credit']);
        unset($record['Course_Count']);
        unset($record['Raw']);
        $record['Mean'] = $ac_record->statistics->Array_Mean($record['Average']);
        $record['SD'] = $ac_record->statistics->Array_SD($record['Average'],$record['Mean']);
        $record['Median'] = $ac_record->statistics->Array_Median($record['Average']);
        $record['Maximum'] = $ac_record->statistics->Array_Maximum($record['Average']);
        $record['Minimum'] = $ac_record->statistics->Array_Minimum($record['Average']);

//        foreach ($record['Average'] as $key => $value){
//            $record['Standard_Record'][$key] = round(10*(($value - $record['Mean']) / $record['SD'])+50,10);
//        }



//        unset($record['Rank_Tie']);
//        unset($record['Tie_sum']);
//        unset($record['Tie_Rank']);
//        unset($record['Tie_Raw']);

        return $record;
    }

    // 석차연명부 작성 후 데이터베이스에 기록
    function Write($year,$type,$initial,$isNoN,$isType){
        $rank_list = $this->Ranking($year,$type,$initial,$isNoN,$isType);

        foreach ($rank_list['Average'] as $key => $value){
            $record['stuid'][$key] = $key;
            $record['avg'][$key] = $value;
            $record['rank'][$key] = $rank_list['Rank'][$key];
            $record['percentile'][$key] = $rank_list['Percentile'][$key];
            $record['Grade'][$key] = $rank_list['RG'][$key];
            $record['count'] = $rank_list['sum'];
        }

        if($record['count'] >= 1){
            $insert_option = [];

            $insert_option['initial'] = $initial;
            $insert_option['year'] = $rank_list['year'];
            $insert_option['type'] = $rank_list['type'];
            $insert_option['table_name'] = $insert_option['initial'].'_'.$insert_option['year'].'_'.$insert_option['type'];

            $table_sql = "
            CREATE TABLE academy_list.".$insert_option['table_name']." like academy.rank_list_ex;
            ";
            $table_result = mysqli_query($this->con,$table_sql);

            foreach ($record['rank'] as $key => $value){
                $record['query'][$key] = "
                INSERT INTO academy_list.".$insert_option['table_name']." (stuid,average,ranks,percentile,grade) VALUES ('".$record['stuid'][$key]."',".$record['avg'][$key].",".$record['rank'][$key].",".$record['percentile'][$key].",".$record['Grade'][$key].");
                ";
                $insert_result = mysqli_query($this->con,$record['query'][$key]);
            }
        }
        return $record;
    }

}