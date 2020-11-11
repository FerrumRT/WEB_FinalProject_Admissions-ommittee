<?
class Faculty{
    private $faculty_id;
    private $faculty_name;
    private $code;
    private $description;
    private $skills;
    private $outcomes;
    private $leading_position;
    private $edu_deg;

    function __counstruct($id, $faculty_name, $code, $description, $skills, $outcomes, $leading_position, $edu_deg){
        $this->$faculty_id = $id;
        $this->$faculty_name = $faculty_name;
        $this->$code = $code;
        $this->$description = $description;
        $this->$skills = $skills;
        $this->$outcomes = $outcomes;
        $this->$leading_position = $leading_position;
        $this->$edu_deg = $edu_deg;
    }

    //getters
    public function get_faculty_id(){ return $this->$faculty_id; }
    public function get_faculty_name(){ return $this->$faculty_name; }
    public function get_code(){ return $this->$code; }
    public function get_description(){ return $this->$description; }
    public function get_skills(){ return $this->$skills; }
    public function get_outcomes(){ return $this->$outcomes; }
    public function get_leading_position(){ return $this->$leading_position; }
    public function get_edu_deg(){ return $this->$edu_deg; }

    //setters
    public function set_faculty_id($faculty_id){ $this->$faculty_id = $faculty_id; }
    public function set_faculty_name($faculty_name){ $this->$faculty_name = $faculty_name; }
    public function set_code($code){ $this->$code = $code; }
    public function set_description($description){ $this->$description = $description; }
    public function set_skills($skills){ $this->$skills = $skills; }
    public function set_outcomes($outcomes){ $this->$outcomes = $outcomes; }
    public function set_leading_position($leading_position){ $this->$leading_position = $leading_position; }
    public function set_edu_deg($edu_deg){ $this->$edu_deg = $edu_deg; }

}

?>