<?php

class SandBox
{
    public $con;

    public function __construct()
    {
        $this->con = mysqli_connect("152.70.236.30:3306","3639qw","134679qw","music");
    }

}