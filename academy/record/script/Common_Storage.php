<?php
// 과목별 이수구분 $ac 공통사용
foreach ($ac_record->course_detail->Course_Cat() as $key => $value){
    if(substr($key,-2) == '11'){
        $ac['Cat']['11'][$key] = $value;
    }
    if(substr($key,-2) == '12'){
        $ac['Cat']['12'][$key] = $value;
    }
    if(substr($key,-2) == '21'){
        $ac['Cat']['21'][$key] = $value;
    }
    if(substr($key,-2) == '22'){
        $ac['Cat']['22'][$key] = $value;
    }
    if(substr($key,-2) == '31'){
        $ac['Cat']['31'][$key] = $value;
    }
    if(substr($key,-2) == '32'){
        $ac['Cat']['32'][$key] = $value;
    }
}

// 과목명 $ac 공통사용
foreach ($ac_record->course_detail->Course_Name() as $key => $value){
    if(substr($key,-2) == '11'){
        $ac['Name']['11'][$key]  = $value;
    }
    if(substr($key,-2) == '12'){
        $ac['Name']['12'][$key]  = $value;
    }
    if(substr($key,-2) == '21'){
        $ac['Name']['21'][$key]  = $value;
    }
    if(substr($key,-2) == '22'){
        $ac['Name']['22'][$key]  = $value;
    }
    if(substr($key,-2) == '31'){
        $ac['Name']['31'][$key]  = $value;
    }
    if(substr($key,-2) == '32'){
        $ac['Name']['32'][$key]  = $value;
    }
}

// 과목별 학점, 학기별 학점 $ac 공통사용
foreach ($ac_record->course_detail->Course_Credit() as $key => $value){
    $ac['Credit']['sum'] += $value;
    if(substr($key,-2) == '11'){
        $ac['Credit']['11'][$key] = $value;
        $ac['Credit']['Sum']['11'] += $value;
    }
    if(substr($key,-2) == '12'){
        $ac['Credit']['12'][$key] = $value;
        $ac['Credit']['Sum']['12'] += $value;
    }
    if(substr($key,-2) == '21'){
        $ac['Credit']['21'][$key] = $value;
        $ac['Credit']['Sum']['21'] += $value;
    }
    if(substr($key,-2) == '22'){
        $ac['Credit']['22'][$key] = $value;
        $ac['Credit']['Sum']['22'] += $value;
    }
    if(substr($key,-2) == '31'){
        $ac['Credit']['31'][$key] = $value;
        $ac['Credit']['Sum']['31'] += $value;
    }
    if(substr($key,-2) == '32'){
        $ac['Credit']['32'][$key] = $value;
        $ac['Credit']['Sum']['32'] += $value;
    }
}

// 교과구분
foreach ($ac_record->course_detail->Course_Type() as $key => $value){
    if(substr($key,-2) == '11'){
        $ac['Sort']['11'][$key] = $value;
    }
    if(substr($key,-2) == '12'){
        $ac['Sort']['12'][$key] = $value;
    }
    if(substr($key,-2) == '21'){
        $ac['Sort']['21'][$key] = $value;
    }
    if(substr($key,-2) == '22'){
        $ac['Sort']['22'][$key] = $value;
    }
    if(substr($key,-2) == '31'){
        $ac['Sort']['31'][$key] = $value;
    }
    if(substr($key,-2) == '32'){
        $ac['Sort']['32'][$key] = $value;
    }
}

?>
