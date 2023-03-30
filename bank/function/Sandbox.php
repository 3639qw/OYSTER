<?php

class Sandbox
{
    public $con, $pri;

    public function __construct()
    {
        $this->con = mysqli_connect("152.70.236.30:3306","banker","134679qw","bank");
        $this->pri = mysqli_connect("152.70.236.30:3306",'3639qw','134679qw','bank');
    }
}