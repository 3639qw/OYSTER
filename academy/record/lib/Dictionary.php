<?php
header("Content-Type: text/html;charset=UTF-8");
session_start();

class Dictionary
{
    // sch: 소속 학교명
    // type: 계열
    // initial: 소속 학교 이니셜
    // stuid: 학생 학번
    // year: 입학연도
    // con: db 접속정보

    // ?stuid=22851041&name=이주용&birth=2003-05-16&range=abcdef



    public $sch, $type, $initial, $stuid, $year, $con;

    public function __construct()
    {
        // db 접속 사항
        $this->con = mysqli_connect("152.70.236.30:3306","3639qw","134679qw","academy");

//        $this->sch = $_SESSION['sch'];
//        $this->initial = $_SESSION['initial'];
//        $this->type = $_GET['type'];
//        $this->stuid = $_GET['stuid'];
//        $this->year = $_GET['year'];


        $this->sch = '세명컴퓨터고등학교';
        $this->initial = 'SMC';
        $this->type = $_GET['type'];
        $this->stuid = $_GET['stuid'];
        $this->year = $_GET['year'];
    }


}