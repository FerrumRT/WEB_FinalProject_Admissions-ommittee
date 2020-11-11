<?php
class Chats
{
  private $chats_id;
  private $created_date;
  private $latest_message_text;
  private $latest_message_time;
  private $student;
  private $ad_mem;

  function __construct($id, $created_date, $latest_message_text, $latest_message_time, $student, $ad_mem)
  {
    $this->chats_id = $id;
    $this->created_date = $created_date;
    $this->latest_message_text = $latest_message_text;
    $this->latest_message_time = $latest_message_time;
    $this->student = $student;
    $this->ad_mem = $ad_mem;
  }

  function get_id()
  {
    return $this->chats_id;
  }
  function get_created_date()
  {
    return $this->created_date;
  }
  function get_latest_message_text()
  {
    return $this->latest_message_text;
  }
  function get_latest_message_time()
  {
    return $this->latest_message_time;
  }
  function get_student()
  {
    return $this->student;
  }
  function get_ad_mem()
  {
    return $this->ad_mem;
  }

  function set_Id($chats_id)
  {
    $this->chats_id=$chats_id;
  }
  function set_created_date($created_date)
  {
    $this->created_date=$created_date;
  }
  function set_latest_message_text($latest_message_text)
  {
    $this->latest_message_text=$latest_message_text;
  }
  function set_latest_message_time($latest_message_time)
  {
    $this->latest_message_time=$latest_message_time;
  }
  function set_student($student)
  {
    $this->student=$student;
  }
  function set_ad_mem($ad_mem)
  {
    $this->ad_mem=$ad_mem;
  }

}

?>
