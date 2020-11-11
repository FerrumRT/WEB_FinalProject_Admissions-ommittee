<?php
class Education_degree{
    private $edu_deg_id;
    private $edu_deg_name;

    function __construct($id, $edu_deg_name){
        $this->edu_deg_name = $edu_deg_name;
        $this->edu_deg_id = $id;
    }

    //getters
    public function get_edu_deg_name(){ return $this->edu_deg_name; }
    public function get_edu_deg_id(){ return $this->edu_deg_id; }

    //setters
    public function set_edu_deg_name($edu_deg_name){ $this->edu_deg_name = $edu_deg_name; }
    public function set_edu_deg_id($edu_deg_id){ $this->edu_deg_id = $edu_deg_id; }

}

?>