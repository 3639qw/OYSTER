<?php
require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/Course_Detail.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/Course_Record.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/Course_GP.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/Course_Rank.php";

require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/Magic_EYE.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/Calculator.php";

require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/Custom_Record.php";

require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/Raw_Rank.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/GPA_Rank.php";
require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/Standard_Rank.php";

require_once $_SERVER["DOCUMENT_ROOT"]."/academy/record/lib/Statistics.php";

require_once $_SERVER['DOCUMENT_ROOT']."/academy/record/lib/SAT_Rank.php";


class Academic_Integrate
{
    public
        $course_detail,
        $course_record,
        $course_gp,
        $course_rank,
        $magic_eye,
        $calc,
        $custom_record,
        $raw_rank,
        $gpa_rank,
        $std_rank,
        $statistics,
        $sat;

    public function __construct()
    {
        $this->course_detail = new Course_Detail();
        $this->course_record = new Course_Record();
        $this->course_gp = new Course_GP();
        $this->course_rank = new Course_Rank();
        $this->magic_eye = new Magic_EYE();
        $this->calc = new Calculator();
        $this->custom_record = new Custom_Record();
        $this->raw_rank = new Raw_Rank();
        $this->gpa_rank = new GPA_Rank();
        $this->std_rank = new Standard_Rank();
        $this->statistics = new Statistics();
        $this->sat = new SAT_Rank();
    }

}

