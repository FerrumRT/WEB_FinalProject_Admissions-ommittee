<?
class Education_degree{
    private $edu_deg;

    function __counstruct($edu_deg){
        $this->$edu_deg = $edu_deg;
    }

    //getters
    public function get_edu_deg(){ return $this->$edu_deg; }

    //setters
    public function set_edu_deg($edu_deg){ $this->$edu_deg = $edu_deg; }

}

?>