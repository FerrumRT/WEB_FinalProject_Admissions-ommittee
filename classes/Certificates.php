<?php
class Certificates
{
  private $certificates_id;
  private $certificates_url;
  private $student_id;

  function __construct($certificates_id, $certificates_url, $student_id)
  {
    $this->certificates_id = $certificates_id;
    $this->certificates_url = $certificates_url;
    $this->student_id = $student_id;
  }

  function get_id()
  {
    return $this->certificates_id;
  }
  function get_certificates_url()
  {
    return $this->certificates_url;
  }
  function get_student_id()
  {
    return $this->student_id;
  }

  function set_Id($certificates_id)
  {
    $this->certificates_id=$certificates_id;
  }
  function set_certificates_url($certificates_url)
  {
    $this->certificates_url=$certificates_url;
  }
  function set_student_id($student_id)
  {
    $this->student_id=$student_id;
  }
}

?>
