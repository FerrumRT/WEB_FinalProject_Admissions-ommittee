<?
class Person{
    private $first_name;
    private $middle_name;
    private $last_name;
    private $login;
    private $password;
    private $birth_date;
    private $phone_num;

    function __counstruct($first_name, $last_name, $login, $password){
        $this->$first_name = $first_name;
        $this->$last_name = $last_name;
        $this->$login = $login;
        $this->$password = $password;
    }

    //getters
    public function get_first_name(){ return $this->$first_name; }
    public function get_middle_name(){ return $this->$middle_name; }
    public function get_last_name(){ return $this->$last_name; }
    public function get_login(){ return $this->$login; }
    public function get_password(){ return $this->$password; }
    public function get_birth_date(){ return $this->$birth_date; }
    public function get_phone_num(){ return $this->$phone_num; }

    //setters
    public function set_first_name($first_name){ $this->$first_name = $first_name; }
    public function set_middle_name($middle_name){ $this->$middle_name = $middle_name; }
    public function set_last_name($last_name){ $this->$last_name = $last_name; }
    public function set_login($login){ $this->$login = $login; }
    public function set_password($password){ $this->$password = $password; }
    public function set_birth_date($birth_date){ $this->$birth_date = $birth_date; }
    public function set_phone_num($phone_num){ $this->$phone_num = $phone_num; }

}

?>