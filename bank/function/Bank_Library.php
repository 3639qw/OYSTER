<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/bank/function/Account_List.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/bank/function/Active_Account.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/bank/function/Calculator.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/bank/function/Inspection.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/bank/function/Navigator.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/bank/function/Open_Account.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/bank/function/Send.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/bank/function/Transaction_Details.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/bank/function/Credit.php";



class Bank_Library
{
    public
        $ac_list,
        $active_ac,
        $calc,
        $inspec,
        $nav,
        $open_ac,
        $send,
        $transac,
        $credit;

    public function __construct()
    {
        $this->ac_list = new Account_List();
        $this->active_ac = new Active_Account();
        $this->calc = new Calculator();
        $this->inspec = new Inspection();
        $this->nav = new Navigator();
        $this->open_ac = new Open_Account();
        $this->send = new Send();
        $this->transac = new Transaction_Details();
        $this->credit = new Credit();
    }


}