<?php
namespace CookingAssist\Form;
use Zend\Form\Form;
use Zend\Form\Element\Collection;
use Zend\Form\Fieldset;

use Zend\Form\Element\Submit;
use Zend\Db\Adapter\AdapterInterface;
class AddWorkflowForm extends Form
{
    // default value = 5
    public $noOfKeywords = 5;
    protected $dbAdapter;
    /* Attributes:
    public $id;
    public $title;
    public $tipp;
    public $layoutId;
     */
    public function __construct()
    {
//         $this->setDbAdapter($dbAdapter);
        // we want to ignore the name passed
        parent::__construct('workflowform');
        
//         $workflowElement = new Collection('workflow');
//         $workflowElement->setOptions(array(
//             'label' => 'Workflow',
//             'target_element' => array(
//                 'type' => 'CookingAssist\Form\WorkflowFieldset')
//         ));
        
//         $this->add($workflowElement);
        
        
        $this->add(array(
            'name' => 'id',
            'type' => 'Hidden',
        ));
        $this->add(array(
            'name' => 'title',
            'type' => 'Text',
            'options' => array(
                'label' => 'Titel',
            ),
        ));
        $this->add(array(
            'name' => 'tipp',
            'type' => 'Text',
            'options' => array(
                'label' => 'Tipp',
            ),
        ));

        $submitElement = new Submit('submit');
        $submitElement->setValue('Hinzufügen');
        $this->add($submitElement);
    }
    
    public function getDbAdapter(){
        return $this->dbAdapter;
    }
    public function setDbAdapter(AdapterInterface $dbAdapter){
        $this->dbAdapter = $dbAdapter;
    }
}

?>