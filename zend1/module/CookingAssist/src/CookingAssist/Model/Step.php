<?php
namespace CookingAssist\Model;

class Step
{
    public $isMultiStep;
    public $text;
    public $quantityId;
    public $unitId;
    
    function __construct($text, $isMultiStep, $quantityValue,$unitId){
        $this->text = $text;

        $this->isMultiStep= $isMultiStep;

        $this->quantityValue = quantityValue;
        $this->unitId = $unitId;
    }
}

?>