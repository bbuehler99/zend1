<?php
namespace CookingAssist\Form;

use Zend\Form\Form;
use CookingAssist\Form\AddWorkflowForm;
use Zend\Form\Element\Text;
use Zend\Form\Element\Select;
use Zend\Form\Element\Checkbox;
use Zend;
use Zend\Form\Fieldset;
use Zend\Form\Element\Collection;
use Zend\Form\Element\Submit;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Adapter;
use Zend\Form\Element\MultiCheckbox;
use Zend\Form\Element\Textarea;
use Zend\Form\Element;
use Zend\Form\Element\Hidden;

class AddRecipeForm extends AddWorkflowForm
{
    
    private $initialSteps = 2;
    private $maxNoOfSteps = 20;
    
    public function __construct()
    {
        parent::__construct('AddRecipeForm');        
        
        $noOfPeopleElement = new Text('NoOfPeople');
        $noOfPeopleElement->setLabel('Anzahl Personen');
        $this->add($noOfPeopleElement);
        
        // Add Text for kcal.
        //TODO: Rescrict input to integers
        $kcalElement = new Text('Kcal');
        $kcalElement->setLabel('Anzahl Kalorien');
        $this->add($kcalElement);
        
        // Add Checkbox for publicFlag
        $publicFlagElement = new Checkbox('PublicFlag');
        $publicFlagElement->setLabel('Möchten Sie das Rezept öffentlich speichern?');
        $this->add($publicFlagElement);
        
        $preparationTimeElement = new Text('PreparationTime');
        $preparationTimeElement->setLabel('Vorbereitungszeit');
        $this->add($preparationTimeElement);
        
        $cookingTimeElement = new Text('CookingTime');
        $cookingTimeElement->setLabel('Koch- / Backzeit');
        $this->add($cookingTimeElement);
        
        $restingTimeElement = new Text('RestingTime');
        $restingTimeElement->setLabel('Ruhezeit');
        $this->add($restingTimeElement);
        
        $types = $this->selectAllFrom('Types', 'Name');
        $typeElement = new MultiCheckbox('TypeId');
        $typeElement->setLabel('Rezept Typ');
        //$possibleValues = array('Sommermenu','Herbstmenu','Wintermenu','Frühlingsmenu');
        $typeElement->setValueOptions($types);
        $this->add($typeElement);
        
        
        $levels = $this->selectAllFrom('Levels', 'Shortname');
        $levelElement = new Select('Level');
        $levelElement->setLabel('Schwierigkeit');
        $levelElement->setValueOptions($levels);/*array('einfach','schwierig'));*/
        $levelElement->setValue($levels[0]);
        $this->add($levelElement);
        
        // Add steps
        $this->addSteps($this->getMaxNumberOfSteps());
        
        // Add select for chosing how many steps should be displayed
        $stepNumbers = range(1,$this->maxNoOfSteps);
        $addStepSelect = new Select('StepNumber');
        $addStepSelect->setLabel('Anzahl Schritte wählen');
        $addStepSelect->setValueOptions($stepNumbers);
        $addStepSelect->setAttribute('id', 'NoOfStepSelect');
        $addStepSelect->setAttribute('onchange', 'show(++this.value)');
        $this->add($addStepSelect);
        
    }
        

    public function addSteps($number){
        for ($i=0;$i<$number;$i++){
            $this->addStep($i);
        }
    }
    private function addStep($index){
        $stepIdElement = new Hidden('StepId'.$index);
        $stepIdElement->setValue($index);
        $this->add($stepIdElement);        
        
        $quantityElement = new Text('StepQuantityValue'.$index);
        $quantityElement->setLabel('Menge');
        $quantityElement->setAttribute('id', 'StepQuantityValue'.$index);
        $this->add($quantityElement);
    
        $units = $this->selectAllFrom('Units', 'Name');
        $unitElement = new Select('StepUnit'.$index);
        $unitElement->setValueOptions($units);
        // need to set default value. otherwise null is saved.
        $unitElement->setValue(0);
        $unitElement->setAttribute('id','StepUnit'.$index );
        $this->add($unitElement);
    
        $ingredients = $this->selectAllFrom('Ingredients', 'Name');
        $ingredientElement = new Select('StepIngredient'.$index);
        $ingredientElement->setValueOptions($ingredients);
        //just set any default value. inserting ingredients has to be workes out anyway
        $ingredientElement->setValue(0);
        $ingredientElement->setAttribute('id', 'StepIngredient'.$index);
        $this->add($ingredientElement);
    
        $textElement = new Textarea('StepText'.$index);
        $textElement->setAttribute('id', 'StepText'.$index);
        $this->add($textElement);
    }
    public function getMaxNumberOfSteps(){
        return $this->maxNoOfSteps;
    }
    public function getInitialSteps(){
        return $this->initialSteps;
    }
    private function selectAllFrom($table,$column){
        $selectString = 'SELECT * FROM '.$table;
        $result = $this->getDbAdapter()->query($selectString,Adapter::QUERY_MODE_EXECUTE);
        // data will be a simple array conataining all values from table
        $data = array();
        foreach ($result as $row){
            $data[]= $row[$column];
        }
        return $data;
        
    }
    

}

?>