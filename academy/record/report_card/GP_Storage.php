<?php

// 과목별 상대평가 등급
$ac_1['grade'] = $ac_record->course_gp->Relative_Rank();
// 과목별 상대평가 실점
$ac_1['score'] = $ac_record->course_rank->Relative_Score();
// GPA
$ac_1['GPA'] = $ac_record->course_gp->Relative_GPA();
// 평점계
foreach ($ac_record->course_gp->Relative_Point() as $key => $value){
    if(substr($key,-2) == '11'){
        $ac_1['point']['11'] += $value;
    }
    if(substr($key,-2) == '12'){
        $ac_1['point']['12'] += $value;
    }
    if(substr($key,-2) == '21'){
        $ac_1['point']['21'] += $value;
    }
    if(substr($key,-2) == '22'){
        $ac_1['point']['22'] += $value;
    }
    if(substr($key,-2) == '31'){
        $ac_1['point']['31'] += $value;
    }
    if(substr($key,-2) == '32'){
        $ac_1['point']['32'] += $value;
    }
}


