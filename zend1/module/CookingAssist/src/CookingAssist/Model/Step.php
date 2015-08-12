<?php
namespace CookingAssist\Model;

class Step
{
    public $stepId;
    public $isMultiStep;
    public $text;
    public $quantityId;
    public $stepIngredient;
    
    
    function create($isMultiStep, $stepQuantity,$stepIngredient,$text){
        $instance = new self();
        $this->isMultiStep = $isMultiStep;
        $this->quantityId = $stepQuantity;
        $this->stepIngredient = $stepIngredient;
        $this->text = $text;
        return $instance;
    }
    
    public function exchangeArray($data)
    {
        $this->isMultiStep     = (!empty($data['isMultiStep'])) ? $data['isMultiStep'] : null;
        $this->text  = (!empty($data['stepText'])) ? $data['stepText'] : null;
        $this->quantityId = (!empty($data['stepQuantity'])) ? $data['stepQuantity'] : null;
        $this->stepIngredient  = (!empty($data['stepIngredient'])) ? $data['stepIngredient'] : null;
    }
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}

?>