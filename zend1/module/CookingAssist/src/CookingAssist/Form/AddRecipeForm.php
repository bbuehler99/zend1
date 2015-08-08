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
class AddRecipeForm extends AddWorkflowForm
{
    public function __construct()
    {
        parent::__construct();
        

        $recipeElement = new Collection('recipe');
        $recipeElement->setOptions(array(
            'label' => 'Rezept',
            'target_element' => array(
                'type' => 'CookingAssist\Form\RecipeFieldset')
        ));
        
        $this->add($recipeElement);


    }
    

}

?>