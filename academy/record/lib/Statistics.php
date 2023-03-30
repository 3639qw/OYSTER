<?php

class Statistics
{
    // 산술평균 (Arithmetic)
    function Array_Mean($a)
    {
        return array_sum($a) / count($a);
    }

    // 중앙값 (Median)
    function Array_Median($a)
    {
        sort($a, SORT_NUMERIC);
        $cnt = count($a);
        $median_pos = floor($cnt / 2);
        $median = $a[$median_pos];
        if ($cnt % 2 === 0) $median = ($median + $a[$median_pos-1]) / 2;

        return $median;
    }

    // 최대값 (Maximum)
    function Array_Maximum($arr){
        $max = FALSE;
        foreach ($arr as $a){
            if($max === FALSE || $a > $max){
                $max = $a;
            }
        }
        return $max;
    }

    // 최소값(Minimum)
    function Array_Minimum($arr){
        $min = FALSE;
        foreach ($arr as $a){
            if($min === FALSE || $a < $min){
                $min = $a;
            }
        }
        return $min;
    }


    // 표준편차 (SD)
    function Array_SD($arr,$avg){

        $dev = 0;
        foreach ($arr as $v){
            $dev += pow(($v - $avg),2);
        }
        $dev = ($dev / count($arr));

        return sqrt($dev);
    }

    // 석차

    // 높은 값에 상위 등위 부여
    function HIGH_Rank($arr) {
        $sorted = $arr;
        rsort($sorted);
        return array_map(function($v) use ($sorted) { return array_search($v,$sorted)+1; },$arr);
    }

    // 낮은 값에 상위 등위 부여
    function LOW_Rank($arr){
        $sorted = $arr;
        sort($sorted);
        return array_map(function($v) use ($sorted) { return array_search($v,$sorted)+1; },$arr);
    }

}