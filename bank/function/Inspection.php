<?php

class Inspection
{
    // 이자계산을 위한 야간 점검시간
    // 매일 23시 49분 59초까지 거래가능 23시 50분 00초부터 00시 09분 59초까지 거래정지 00시 10분 00초 부터 거래가능
    // 불가능한 거래
    // 계좌개설, 계좌이체, 계좌해지, 거래내역조회, 잔액조회
    
    
    // 매일 실시하는 정기점검
    // 거래정지 시간일때 FALSE, 정상시간일때 TRUE
    function Regular_Inspection(){
        if(date("His") >= '235000' || date("His") < '001000'){
            // 거래정지 시간
            // FALSE 리턴
            return false;
        }else{
            // 거래가능 시간
            // TRUE 리턴
            return true;
        }
    }





}