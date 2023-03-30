<?php

// 과목별 석차
$ac_1['Rank'] = $ac_record->course_rank->Rank_Integrate();
// 과목별 석차등급
$ac_1['Grade'] = $ac_record->course_rank->RG();
// 과목별 성적
$ac_1['Record'] = $ac_record->course_record->Course_Integrate();
// 등급계
foreach ($ac_record->course_rank->RG() as $key => $value){
    if(substr($key,-2) == '11'){
        $ac_1['RG_sum']['11'] += $value;
    }
    if(substr($key,-2) == '12'){
        $ac_1['RG_sum']['12'] += $value;
    }
    if(substr($key,-2) == '21'){
        $ac_1['RG_sum']['21'] += $value;
    }
    if(substr($key,-2) == '22'){
        $ac_1['RG_sum']['22'] += $value;
    }
    if(substr($key,-2) == '31'){
        $ac_1['RG_sum']['31'] += $value;
    }
    if(substr($key,-2) == '32'){
        $ac_1['RG_sum']['32'] += $value;
    }
}
// 등급 평균
$ac_1['RG_Avg'] = $ac_record->course_rank->RG_Average();

?>