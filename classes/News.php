<?php
class News
{
  private $news_id;
  private $title;
  private $content;
  private $created_data;
  private $ad_mem;
  function __construct($id, $title, $content, $created_data, $ad_mem)
  {
    $this->news_id = $id;
    $this->title = $title;
    $this->content = $content;
    $this->created_data = $created_data;
    $this->ad_mem = $ad_mem;
  }

  function getId()
  {
    return $this->news_id;
  }
  function getTitle()
  {
    return $this->title;
  }
  function getContent()
  {
    return $this->content;
  }
  function getCreatedData()
  {
    return $this->created_data;
  }
  function getAdMemId()
  {
    return $this->ad_mem;
  }

  function setId($news_id)
  {
    $this->news_id=$news_id;
  }
  function setTitle($title)
  {
    $this->title=$title;
  }
  function setContent($content)
  {
    $this->content=$content;
  }
  function setCreatedData($created_data)
  {
    $this->created_data=$created_data;
  }
  function setAdMemId($ad_mem)
  {
    $this->ad_mem=$ad_mem;
  }

}

?>
