<?php

class Calculator
{
    // GPA 4.5 Scale 백분율
    function GPA_Percentile($x){
        $gpa = number_format($x,2);
        if($gpa != 0){
            $percentile = (60+(($gpa-1)*40/3.5));
        }else{
            $percentile = 0;
        }
        return (double)$percentile;
    }

    // 표준정규분포 스테나인 점수 (석차등급 변환)
    function Stanine($raw,$avg,$sd){
        $zscore = ($raw - $avg) / $sd;

        $stanine = round(10 - (($zscore * 2) + 5));

        return $stanine;
    }

}