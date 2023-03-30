<?php

class Calculator
{

    // (365 * (5000000 * (4.3 / 1000)) / 365)
    // 이자계산기
    // 원금 amount, 거치일 day, 이자율 perc 을 받아서 수령하는 이자를 리턴
    function Interest($amount,$day,$perc){
        $amount = (int)$amount;
        $day = (int)$day;
        $perc = (double)$perc;

        $interest = ($day * ($amount * ($perc / 100)) / 365);

        return $interest;
    }

}