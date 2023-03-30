<?php
include_once "function/Bank_Library.php";
$bank = new Bank_Library();


for ($i = 2; $i <= 19; $i ++){
    for ($i2 = 2; $i2 <= 19; $i2 ++){
        echo $i.' x '.$i2.' = '.($i*$i2).'<br>';
    }
    echo '<br>';
}


$a = 5;



echo '<pre>';



//print_r($bank->active_ac->Close_Account('10202321000001','10202201000001'));
//print_r($bank->open_ac->Savings_Account('201','10202201000001','10000000'));
//print_r($bank->ac_list->ac_List('0305161234567'));






echo '</pre>';




?>