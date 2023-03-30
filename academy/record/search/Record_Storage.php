<?php
if($_GET['stuid'] != '' && $_GET['stuid'] != null && $_GET['sel_type'] == '0'){
    // 조회 대상 학생 학적정보
    $stu = $ac_record->magic_eye->Select_Student();



    $ac = [];
    $ac_sem = [];


    // 전과목 과목별 표출사항
    $code = $ac_record->course_detail->Course_Code();

    $name = $ac_record->course_detail->Course_Name();
    $cat = $ac_record->course_detail->Course_Cat();
    $type = $ac_record->course_detail->Course_Type();

    $credit = $ac_record->course_detail->Course_Credit();
    $rec_int = $ac_record->course_record->Course_Integrate();

    $cls_rank = $ac_record->course_rank->class_Rank();
    $rank = $ac_record->course_rank->Rank_Integrate();
    $rank_grade = $ac_record->course_rank->RG_Level();

    $level = $ac_record->course_gp->Grade_Level();

    $level_perc = $ac_record->course_rank->Level_Percentile();



    foreach ($code as $key => $value){
        $rec['year'][$value] = substr($key,-2,1);
        $rec['cat'][$value] = $cat[$key];
        $rec['type'][$value] = $type[$key];
        $rec['name'][$value] = $name[$key];

        $rec['position'][$value] += substr($key,-1)*2;


        $rec['credit'][$value][$key] = $credit[$key];
        $rec['record'][$value][$key] = $rec_int[$key];
        $rec['class_rank'][$value][$key] = $cls_rank[$key];
        $rec['rank'][$value][$key] = $rank[$key];
        $rec['grade'][$value][$key] = $rank_grade[$key];
        $rec['level'][$value][$key] = $level[$key];
        $rec['level_percentile']['A'][$value][$key] = number_format($level_perc['A'][$key],1);
        $rec['level_percentile']['B'][$value][$key] = number_format($level_perc['B'][$key],1);
        $rec['level_percentile']['C'][$value][$key] = number_format($level_perc['C'][$key],1);
        $rec['level_percentile']['D'][$value][$key] = number_format($level_perc['D'][$key],1);
        $rec['level_percentile']['E'][$value][$key] = number_format($level_perc['E'][$key],1);

        $rec['credit_sum'][substr($key,-1)] += $credit[$key];
    }

    // 학기별 이수학점
    foreach ($ac_record->course_detail->Course_Credit() as $key => $value){
        $ac_sem_2['credit']['Merged'] += $value;
        $ac_sem['credit'][substr($key,-2)] += $value;
    }
    $raw_avg = $ac_record->course_record->Weighted_Average();
    $rg_avg = $ac_record->course_rank->RG_Average();
    $rnk_percentile_avg = $ac_record->course_rank->Percentile_Average();
    $gpa = $ac_record->course_gp->Conversion_GPA();

    // 학기별 총점 평균
    foreach ($ac_record->course_record->Weighted_Average() as $key => $value){
        $ac_sem['raw_avg'][$key] = number_format($value,5);
    }
    // 석차등급 평균
    foreach ($ac_record->course_rank->RG_Average() as $key => $value){
        $ac_sem['rankgrade_avg'][$key] = number_format($value,2);
    }
    // 석차백분율 평균
    foreach ($ac_record->course_rank->Percentile_Average() as $key => $value){
        $ac_sem['perc_avg'][$key] = number_format($value,5);
    }
    // 환산점수 GPA
    foreach ($ac_record->course_gp->Conversion_GPA() as $key => $value){
        $ac_sem['gpa'][$key] = number_format($value,2);
    }

    foreach ($ac_sem['credit'] as $key => $value){
        $ac_sems['year'][substr($key,-2,1)] = substr($key,-2,1);
        $ac_sems[substr($key,-2,1)][substr($key,-1,1)]['credit'] += $value;
        $ac_sems[substr($key,-2,1)][substr($key,-1,1)]['raw_avg'] = number_format($raw_avg[$key],5);
        $ac_sems[substr($key,-2,1)][substr($key,-1,1)]['rg_avg'] = number_format($rg_avg[$key],2);
        $ac_sems[substr($key,-2,1)][substr($key,-1,1)]['percentile'] = number_format($rnk_percentile_avg[$key],5);
        $ac_sems[substr($key,-2,1)][substr($key,-1,1)]['gpa'] = number_format($gpa[$key],2);
    }

    
    // 계열 석차
    if($_GET['typerank'] == 'Y'){
        if($stu['status'] == '졸업'){
            $rank = $ac_record->raw_rank->Ranking($stu['register_32'],$stu['type'],$stu['initial'],'Y','Y');
        }else if($stu['status'] == '졸업예정'){
            $rank = $ac_record->raw_rank->Ranking($stu['register_32'],$stu['type'],$stu['initial'],'N','Y');
        }
    }
    // 전체 석차
    if($_GET['allrank'] == 'Y'){
        if($stu['status'] == '졸업'){
            $a_rank = $ac_record->raw_rank->Ranking($stu['register_32'],$stu['type'],$stu['initial'],'Y','N');
        }else if($stu['status'] == '졸업예정'){
            $a_rank = $ac_record->raw_rank->Ranking($stu['register_32'],$stu['type'],$stu['initial'],'N','N');
        }
    }



}

if($_GET['stuid'] != '' && $_GET['stuid'] != null && $_GET['sel_type'] == '1'){
    // 조회 대상 학생 학적정보
    $stu = $ac_record->magic_eye->Select_Student();





}
?>