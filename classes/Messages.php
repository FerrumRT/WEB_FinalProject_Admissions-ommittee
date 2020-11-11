<?php
class Message
{
  private $message_id;
  private $message_text;
  private $read_by_reciever;
  private $send_date;
  private $student;
  private $ad_mem;
  private $chat;

  function __construct($id, $message_text, $read_by_reciever, $send_date, $student, $ad_mem, $chat)
  {
    $this->chats_id = $id;
    $this->message_text = $message_text;
    $this->read_by_reciever = $read_by_reciever;
    $this->send_date = $send_date;
    $this->student = $student;
    $this->ad_mem = $ad_mem;
    $this->chat = $chat;
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
  function get_student()
  {
    return $this->student;
  }
  function get_ad_mem()
  {
    return $this->ad_mem;
  }
  function get_chat()
  {
    return $this->chat;
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
  function set_student($student)
  {
    $this->student=$student;
  }
  function set_ad_mem($ad_mem)
  {
    $this->ad_mem=$ad_mem;
  }
  function set_chat($chat)
  {
    $this->chat=$chat;
  }

}

?>
