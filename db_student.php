<?php
include "db_edu_deg.php";
include "classes/Student.php";
$id = 1;
$students = array();
$students[] = new Student(1,"Ali","Baitas","qwe","123",$edu_degrees[0]);
$students[] = new Student(2,"Timur","Rakhmetulla","nbveh","1234",$edu_degrees[0]);