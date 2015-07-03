<?php
namespace CookingAssist\Form;

use Zend\Form\Fieldset;
use CookingAssist\Form\AddWorkflowForm;
use Zend\Form\Element\Text;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element\MultiCheckbox;
use Zend\Form\Element\Collection;
use Zend\Form\Element\Select;
use Zend\Db\Adapter\AdapterInterface;
/**
 * Adds all Form Elements for Form containg a recipe. Make sure to use parents fieldset, too
 * @author root
 *
 */
class RecipeFieldset extends Fieldset
{
    
    public function __construct(){
        parent::__construct('recipefieldset');
    
        $this->add(array(
            'name' => 'noOfPeople',
            'type' => 'Text',
            'options' => array(
                'label' => 'Anzahl Personen',
            ),
        ));
        
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
        
        
        $levelElement = new Select('level');
        $levelElement->setLabel('Schwierigkeit');
        $levelElement->setValueOptions(array('einfach','schwierig'));
        $this->add($levelElement);
    }
}

?>