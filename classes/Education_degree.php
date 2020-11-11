<?
class Education_degree{
    private $edu_deg_id;
    private $edu_deg;

    function __counstruct($id, $edu_deg){
        $this->$edu_deg = $edu_deg;
        $this->$edu_deg_id = $id;
    }

    //getters
    public function get_edu_deg(){ return $this->$edu_deg; }
    public function get_edu_deg_id(){ return $this->$edu_deg_id; }

    //setters
    public function set_edu_deg($edu_deg){ $this->$edu_deg = $edu_deg; }
    public function set_edu_deg_id($edu_deg_id){ $this->$edu_deg_id = $edu_deg_id; }

}

?>