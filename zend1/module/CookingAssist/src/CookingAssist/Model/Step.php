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
        $this->isMultiStep     = (!empty($data['isMultiStep'])) ? $data['isMultiStep'] : null;
        $this->text  = (!empty($data['stepText'])) ? $data['stepText'] : null;
        $this->quantityValue = (!empty($data['stepQuantityValue'])) ? $data['stepQuantityValue'] : null;
        $this->quantityUnit = (!empty($data['stepUnit'])) ? $data['stepUnit'] : null;
        $this->stepIngredient  = (!empty($data['stepIngredient'])) ? $data['stepIngredient'] : null;
    }
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}

?>