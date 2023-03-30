<?php
error_reporting( E_ERROR );
ini_set( "display_errors", 1 );


require_once "./lib/Academic_Integrate.php";
$ac_record = new Academic_Integrate();


//// 절대평가 환산점수
//for ($i = 0; $i <= 100; $i++){
//    $val[$i] = floor(55+($i * 45/100));
//}
//
//// GPA 4.0 환산점수
//for ($i = 0.01; $i <= 4; $i += 0.01){
//    $gpa_ref['4.0'][number_format((string)$i,2)] = number_format((60+(($i-1)*40/3)),1);
//}
//
//// GPA 4.5 환산점수
//for ($i = 0.01; $i <= 4.5; $i += 0.01){
//    $gpa_ref['4.5'][number_format((string)$i,2)] = number_format((60+(($i-1)*40/3.5)),1);
//}
//
//$raw = $ac_record->course_record->Course_Raw();
//$avg = $ac_record->course_record->Course_Average();
//$sd = $ac_record->course_record->Course_SD();
//
//foreach ($raw as $key => $value){
//    $rec[$key] = $ac_record->calc->Stanine($value,$avg[$key],$sd[$key]);
//}



echo '<pre>';

ini_set('memory_limit', '256M');
//print_r($rec);
set_time_limit(300);
//print_r($ac_record->sat->SAT_Exam('2020','Y','Y','2020-11','2020-11','2020-11000207'));
//print_r($ac_record->sat->SAT_Info('2020','Y','Y','2020-11','2020-11'));
//print_r($ac_record->sat->Math_Raw('2020','2020-11'));

//print_r($ac_record->gpa_rank->Ranking('2021','1','SMC','Y','Y','Y'));
//print_r($ac_record->course_rank->Relative_Score());

//print_r($ac_record->course_rank->class_Rank());
//print_r($ac_record->course_rank->Level_RG());
//print_r($ac_record->custom_record->Course_Raw('22851092','세명컴퓨터고등학교','SMC'));


print_r($ac_record->gpa_rank->Ranking('2021','1','SMC','Y','Y','Y'));


//print_r($ac_record->course_rank->Conversion_Rank());
//print_r($ac_record->sat->SAT_Exam('2020','Y','Y','2020-11','2020-11'));
//print_r($ac_record->course_record->Allof_RG('5','20005-SMC','1','2020','22'));
//print_r($ac_record->course_gp->Conversion_Grade());
//print_r($ac_record->course_rank->Level_Percentile());
//print_r($ac_record->course_rank->G15_Table(50));
//print_r($ac_record->course_rank->Percentile());





echo '</pre>';


?>



