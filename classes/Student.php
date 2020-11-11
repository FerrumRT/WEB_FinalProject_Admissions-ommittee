<?php
include "Person.php";
class Student extends Person{
    private $student_id;
    private $st_pic_url;
    private $edu_deg;
    private $confirm_doc_url;
    private $school_name;
    private $university_name;

    function __construct( $id,$first_name, $last_name, $login, $password, $edu_deg){
        parent::__construct($first_name, $last_name, $login, $password);
        $this->edu_deg = $edu_deg;
        $this->student_id = $id;
    }

    //getters
    public function get_student_id(){ return $this->student_id; }
    public function get_login(){ return parent::get_login(); }
    public function get_st_pic_url(){ return $this->st_pic_url; }
    public function get_edu_deg(){ return $this->edu_deg; }
    public function get_confirm_doc_url(){ return $this->confirm_doc_url; }
    public function get_school_name(){ return $this->school_name; }
    public function get_university_name(){ return $this->university_name; }

    //setters
    public function set_student_id($student_id){ $this->student_id = $student_id; }
    public function set_st_pic_url($st_pic_url){ $this->st_pic_url = $st_pic_url; }
    public function set_edu_deg($edu_deg){ $this->edu_deg = $edu_deg; }
    public function set_confirm_doc_url($confirm_doc_url){ $this->confirm_doc_url = $confirm_doc_url; }
    public function set_school_name($school_name){ $this->school_name = $school_name; }
    public function set_university_name($university_name){ $this->university_name = $university_name; }

}

?>