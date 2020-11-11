<?
class Student extends Person{
    private $ad_pic_url;

    function __counstruct($first_name, $last_name, $login, $password){
        parent::__counstruct($first_name, $last_name, $login, $password);
    }

    //getters
    public function get_st_pic_url(){ return $this->$ad_pic_url; }

    //setters
    public function set_ad_pic_url($ad_pic_url){ $this->$ad_pic_url = $ad_pic_url; }

}

?>