<?php
namespace CookingAssist\Model;

class Workflow
{
    public $id;
    public $title;
    public $tipp;
    public $layoutId;
    public $keywords;
    
    public function exchangeArray($data)
    {
        $this->id     = (!empty($data['id'])) ? $data['id'] : null;
        $this->title  = (!empty($data['title'])) ? $data['title'] : null;
        $this->tipp = (!empty($data['tipp'])) ? $data['tipp'] : null;
        $this->layoutId  = (!empty($data['layoutId'])) ? $data['layoutId'] : null;
        $this->keywords  = (!empty($data['keywords'])) ? $data['keywords'] : null;
    }
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}

?>