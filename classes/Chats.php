<?php
class Chats
{
  private $chats_id;
  private $created_date;
  private $latest_message_text;
  private $latest_message_time;
  private $student_id;
  private $ad_mem_id;

  function __construct($id, $created_date, $latest_message_text, $latest_message_time, $student_id, $ad_mem_id)
  {
    $this->chats_id = $id;
    $this->created_date = $created_date;
    $this->latest_message_text = $latest_message_text;
    $this->latest_message_time = $latest_message_time;
    $this->student_id = $student_id;
    $this->ad_mem_id = $ad_mem_id;
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
  function get_student_id()
  {
    return $this->student_id;
  }
  function get_ad_mem_id()
  {
    return $this->ad_mem_id;
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
  function set_student_id($student_id)
  {
    $this->student_id=$student_id;
  }
  function set_ad_mem_id($ad_mem_id)
  {
    $this->ad_mem_id=$ad_mem_id;
  }

}

?>
