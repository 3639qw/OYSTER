<?php

$cr = $ac_record->course_detail->Course_Credit();





// 과목별 상대평가 등급
foreach($ac_record->course_gp->Conversion_Grade() as $key => $value){
    if(substr($key,-2) == '11'){
        $ac_1['RG']['11'][$key] = $value;
    }
    if(substr($key,-2) == '12'){
        $ac_1['RG']['12'][$key] = $value;
    }
    if(substr($key,-2) == '21'){
        $ac_1['RG']['21'][$key] = $value;
    }
    if(substr($key,-2) == '22'){
        $ac_1['RG']['22'][$key] = $value;
    }
    if(substr($key,-2) == '31'){
        $ac_1['RG']['31'][$key] = $value;
    }
    if(substr($key,-2) == '32'){
        $ac_1['RG']['32'][$key] = $value;
    }
}
// 학기별 상대평가 기준 GPA
$ac_1['RG']['GPA'] = $ac_record->course_gp->Conversion_GPA();
// 과목별 평점, 학기별 평점 합
foreach ($ac_record->course_gp->Conversion_GP() as $key => $value){
    if(substr($key,-2) == '11'){
        $ac_1['RG']['Grade']['Sum']['11'] += ($cr[$key] * $value);
    }
    if(substr($key,-2) == '12'){
        $ac_1['RG']['Grade']['Sum']['12'] += ($cr[$key] * $value);
    }
    if(substr($key,-2) == '21'){
        $ac_1['RG']['Grade']['Sum']['21'] += ($cr[$key] * $value);
    }
    if(substr($key,-2) == '22'){
        $ac_1['RG']['Grade']['Sum']['22'] += ($cr[$key] * $value);
    }
    if(substr($key,-2) == '31'){
        $ac_1['RG']['Grade']['Sum']['31'] += ($cr[$key] * $value);
    }
    if(substr($key,-2) == '32'){
        $ac_1['RG']['Grade']['Sum']['32'] += ($cr[$key] * $value);
    }
    $ac_1['RG']['Grade']['Sum']['Merged'] += ($cr[$key] * $value);
}

// 백분율 환산점수 백분율
$conversion_perc['Merged'] = round($ac_record->calc->GPA_Percentile($ac_1['RG']['GPA']['Merged']));
foreach ($ac_1['RG']['GPA'] as $key => $value){
    $conversion_perc[$key] = round($ac_record->calc->GPA_Percentile($value),2);
}



// GPA 석차
if($stu['status'] == '졸업' && $_GET['isRank'] == 'Y'){
    $rank = $ac_record->gpa_rank->Ranking($stu['register_32'],$stu['type'],$stu['initial'],'Y','Y','Y');
}else if($stu['status'] == '졸업예정' && $_GET['isRank'] == 'Y'){
    $rank = $ac_record->gpa_rank->Ranking($stu['register_32'],$stu['type'],$stu['initial'],'N','Y','Y');
}




// 과목별 성적증명서
$code = $ac_record->course_detail->Course_Code();

$name = $ac_record->course_detail->Course_Name();
$cat = $ac_record->course_detail->Course_Cat();
$type = $ac_record->course_detail->Course_Type();

$credit = $ac_record->course_detail->Course_Credit();
$rec_int = $ac_record->course_record->Course_Integrate();

$rank_grade = $ac_record->course_rank->RG_Script();

$rnk = $ac_record->course_rank->Rank_Integrate();
$std = $ac_record->course_record->Course_STD();

foreach ($code as $key => $value){
    $rec['year'][$value] = substr($key,-2,1);
    $rec['cat'][$value] = $cat[$key];
    $rec['type'][$value] = $type[$key];
    $rec['name'][$value] = $name[$key];

    $rec['position'][$value] += substr($key,-1)*2;


    $rec['credit'][$value][$key] = $credit[$key];
    $rec['record'][$value][$key] = $rec_int[$key];
    $rec['grade'][$value][$key] = $rank_grade[$key];
    $rec['rank'][$value][$key] = $rnk[$key];

    $rec['std'][$value][$key] = $std[$key];


    $rec['credit_sum'][substr($key,-1)] += $credit[$key];
}


?>

