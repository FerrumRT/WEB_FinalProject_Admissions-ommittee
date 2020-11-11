<?php
class Message
{
  private $message_id;
  private $message_text;
  private $read_by_reciever;
  private $send_date;
  private $student_id;
  private $ad_mem_id;
  private $chat_id;

  function __construct($id, $message_text, $read_by_reciever, $send_date, $student_id, $ad_mem_id, $chat_id)
  {
    $this->chats_id = $id;
    $this->message_text = $message_text;
    $this->read_by_reciever = $read_by_reciever;
    $this->send_date = $send_date;
    $this->student_id = $student_id;
    $this->ad_mem_id = $ad_mem_id;
    $this->chat_id = $chat_id;
  }

  function get_id()
  {
    return $this->message_id;
  }
  function get_message_text()
  {
    return $this->message_text;
  }
  function get_read_by_reciever()
  {
    return $this->read_by_reciever;
  }
  function get_send_date()
  {
    return $this->send_date;
  }
  function get_student_id()
  {
    return $this->student_id;
  }
  function get_ad_mem_id()
  {
    return $this->ad_mem_id;
  }
  function get_chat_id()
  {
    return $this->chat_id;
  }

  function set_Id($message_id)
  {
    $this->message_id=$message_id;
  }
  function set_message_text($message_text)
  {
    $this->message_text=$message_text;
  }
  function set_read_by_reciever($read_by_reciever)
  {
    $this->read_by_reciever=$read_by_reciever;
  }
  function set_send_date($send_date)
  {
    $this->send_date=$send_date;
  }
  function set_student_id($student_id)
  {
    $this->student_id=$student_id;
  }
  function set_ad_mem_id($ad_mem_id)
  {
    $this->ad_mem_id=$ad_mem_id;
  }
  function set_chat_id($chat_id)
  {
    $this->chat_id=$chat_id;
  }

}

?>
