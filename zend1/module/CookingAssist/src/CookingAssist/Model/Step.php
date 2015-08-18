<?php
namespace CookingAssist\Model;

class Step
{
    public $stepId;
    public $isMultiStep;
    public $text;
    public $quantityValue;
    public $quantityUnit;
    public $stepIngredient;
    
    
    function create($isMultiStep, $stepQuantityValue,$stepQuantityUnit,$stepIngredient,$text){
        $instance = new self();
        $this->isMultiStep = $isMultiStep;
        $this->quantityValue = $stepQuantityValue;
        $this->quantityUnit = $stepQuantityUnit;
        $this->stepIngredient = $stepIngredient;
        $this->text = $text;
        return $instance;
    }
    
    public function exchangeArray($data)
    {
        echo 'step->exchangeArray called. stepIngredient: '.$data['stepIngredient'];
        $this->isMultiStep     = (!empty($data['IsMultiStep'])) ? $data['IsMultiStep'] : null;
        $this->text  = (!empty($data['StepText'])) ? $data['StepText'] : null;
        $this->quantityValue = (!empty($data['StepQuantityValue'])) ? $data['StepQuantityValue'] : null;
        $this->quantityUnit = (!empty($data['StepUnit'])) ? $data['StepUnit'] : null;
        $this->stepIngredient  = (!empty($data['StepIngredient'])) ? $data['StepIngredient'] : null;
    }
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}

?>