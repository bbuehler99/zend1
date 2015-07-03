<?php
namespace CookingAssist\Form;

use Zend\Form\Fieldset;
use Zend\Form\Element\Collection;

class WorkflowFieldset extends Fieldset
{
    public function __construct($name='workflow'){

        parent::__construct($name);

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
 

    }
}

?>