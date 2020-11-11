<?
class Admission_member extends Person{
    private $ad_mem_id;
    private $ad_pic_url;

    function __construct($id, $first_name, $last_name, $login, $password){
        parent::__construct($first_name, $last_name, $login, $password);
        $this->ad_mem_id = $id;
    }

    //getters
    public function get_ad_mem_id(){ return $this->ad_mem_id; }
    public function get_ad_pic_url(){ return $this->ad_pic_url; }

    //setters
    public function set_ad_mem_id($ad_mem_id){ $this->ad_mem_id = $ad_mem_id; }
    public function set_ad_pic_url($ad_pic_url){ $this->ad_pic_url = $ad_pic_url; }

}

?>