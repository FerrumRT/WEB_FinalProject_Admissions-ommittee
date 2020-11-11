<?php
class Certificates
{
  private $certificates_id;
  private $certificates_url;
  private $student;

  function __construct($certificates_id, $certificates_url, $student)
  {
    $this->certificates_id = $certificates_id;
    $this->certificates_url = $certificates_url;
    $this->student = $student;
  }

  function get_id()
  {
    return $this->certificates_id;
  }
  function get_certificates_url()
  {
    return $this->certificates_url;
  }
  function get_student()
  {
    return $this->student;
  }

  function set_Id($certificates_id)
  {
    $this->certificates_id=$certificates_id;
  }
  function set_certificates_url($certificates_url)
  {
    $this->certificates_url=$certificates_url;
  }
  function set_student($student)
  {
    $this->student=$student;
  }
}

?>
