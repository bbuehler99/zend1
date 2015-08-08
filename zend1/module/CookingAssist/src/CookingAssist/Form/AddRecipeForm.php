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

class AddRecipeForm extends AddWorkflowForm
{
    
    private $initialSteps = 2;
    private $maxNoOfSteps = 6;
    
    public function __construct()
    {
        parent::__construct();
        

//         $recipeElement = new Collection('recipe');
//         $recipeElement->setOptions(array(
//             'label' => 'Rezept',
//             'target_element' => array(
//                 'type' => 'CookingAssist\Form\RecipeFieldset')
//         ));
        
//         $this->add($recipeElement);

        $dbAdapter = Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter();
        $this->setDbAdapter($dbAdapter);
        
        $noOfPeopleElement = new Text('noOfPeople');
        $noOfPeopleElement->setLabel('Anzahl Personen');
        $this->add($noOfPeopleElement);
        
        // Add Text for kcal.
        //TODO: Rescrict input to integers
        $kcalElement = new Text('kcal');
        $kcalElement->setLabel('Anzahl Kalorien');
        $this->add($kcalElement);
        
        // Add Checkbox for publicFlag
        $publicFlagElement = new Checkbox('publicFlag');
        $publicFlagElement->setLabel('Möchten Sie das Rezept öffentlich speichern?');
        $this->add($publicFlagElement);
        
        $typeElement = new MultiCheckbox('typeId');
        $typeElement->setLabel('Rezept Typ');
        $possibleValues = array('Sommermenu','Herbstmenu','Wintermenu','Frühlingsmenu');
        $typeElement->setValueOptions($possibleValues);
        $this->add($typeElement);
        
        $selectString = 'SELECT * FROM Levels';//$select->getSqlString();
        $result = $dbAdapter->query($selectString,Adapter::QUERY_MODE_EXECUTE);
        $levels = array();
        foreach ($result as $row){
            $levels[]= $row['Shortname'];
        }
        $levelElement = new Select('level');
        $levelElement->setLabel('Schwierigkeit');
        $levelElement->setValueOptions($levels);/*array('einfach','schwierig'));*/
        $this->add($levelElement);
        
        // Add steps
        $this->addSteps($this->getMaxNumberOfSteps());
        
        // Add select for chosing how many steps should be displayed
        $stepNumbers = range(1,$this->maxNoOfSteps);
        $addStepSelect = new Select('stepNumber');
        $addStepSelect->setLabel('Anzahl Schritte wählen');
        $addStepSelect->setValueOptions($stepNumbers);
        $addStepSelect->setAttribute('id', 'noOfStepSelect');
        $addStepSelect->setAttribute('onchange', 'show(this.value)');
        $this->add($addStepSelect);
        
    }
        
    public function getDbAdapter(){
        return $this->dbAdapter;
    }
    public function setDbAdapter(AdapterInterface $dbAdapter){
        $this->dbAdapter = $dbAdapter;
    }
    public function addSteps($number){
        for ($i=0;$i<$number;$i++){
            $this->addStep($i);
        }
    }
    private function addStep($index){
        $quantityElement = new Text('stepQuantity'.$index);
        $quantityElement->setLabel('Menge');
        $quantityElement->setAttribute('id', 'stepQuantity'.$index);
        $this->add($quantityElement);
    
        $unitElement = new Select('stepUnit'.$index);
        $unitElement->setValueOptions(array('EL','TL'));
        $unitElement->setAttribute('id','stepUnit'.$index );
        $this->add($unitElement);
    
    
        $ingredientElement = new Select('stepIngredient'.$index);
        $ingredientElement->setValueOptions(array('Öl','Rahm'));
        $ingredientElement->setAttribute('id', 'stepIngredient'.$index);
        $this->add($ingredientElement);
    
        $textElement = new Textarea('stepText'.$index);
        $textElement->setAttribute('id', 'stepText'.$index);
        $this->add($textElement);
    }
    public function getMaxNumberOfSteps(){
        return $this->maxNoOfSteps;
    }
    public function getInitialSteps(){
        return $this->initialSteps;
    }
    

}

?>