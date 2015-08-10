<?php
namespace CookingAssist\Model;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;
use CookingAssist\Model\Workflow;
use Zend\Stdlib\ArraySerializableInterface;

class Recipe extends Workflow 
{
    private $inputFilter;
    
    public $id=-1;
    public $authorId=-1;
    public $noOfPeople=-1;
    public $kcal=-1;
    public $publicFlag=0;
    public $preparationTime=-1;
    public $cookingTime=-1;
    public $restingTime=-1;
    public $creationDate=-1;
    public $level=-1;
    
    
    public function exchangeArray($data)
    {
        parent::exchangeArray($data);
        $this->id   = (!empty($data['id'])) ? $data['id'] : null;
        $this->authorId     = (!empty($data['authorId'])) ? $data['authorId'] : null;
        $this->noOfPeople  = (!empty($data['noOfPeople'])) ? $data['noOfPeople'] : null;
        $this->kcal = (!empty($data['kcal'])) ? $data['kcal'] : null;
        $this->publicFlag  = (!empty($data['publicFlag'])) ? $data['publicFlag'] : 0;
        $this->preparationTime = (!empty($data['preparationTime'])) ? $data['preparationTime'] : null;
        $this->cookingTime  = (!empty($data['cookingTime'])) ? $data['cookingTime'] : null;
        $this->restingTime = (!empty($data['restingTime'])) ? $data['restingTime'] : null;
        $this->creationDate  = (!empty($data['creationDate'])) ? $data['creationDate'] : null;
        $this->level  = (!empty($data['level'])) ? $data['level'] : 0;
    }
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

     
    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }
     
    public function getInputFilter()
    {
        //TODO: implement
        $inputFilter = new InputFilter();
        $this->inputFilter = $inputFilter;
//         if (!$this->inputFilter) {
//             $inputFilter = new InputFilter();
             
//             $inputFilter->add(array(
//                 'name'     => 'id',
//                 'required' => true,
//                 'filters'  => array(
//                     array('name' => 'Int'),
//                 ),
//             ));

//             $inputFilter->add(array(
//                 'name'     => 'title',
//                 'required' => true,
//                 'filters'  => array(
//                     array('name' => 'StripTags'),
//                     array('name' => 'StringTrim'),
//                 ),
//                 'validators' => array(
//                     array(
//                         'name'    => 'StringLength',
//                         'options' => array(
//                             'encoding' => 'UTF-8',
//                             'min'      => 1,
//                             'max'      => 30,
//                         ),
//                     ),
//                 ),
//             ));
//             $inputFilter->add(array(
//                 'name'     => 'author',
//                 'required' => true,
//                 'filters'  => array(
//                     array('name' => 'StripTags'),
//                     array('name' => 'StringTrim'),
//                 ),
//                 'validators' => array(
//                     array(
//                         'name'    => 'StringLength',
//                         'options' => array(
//                             'encoding' => 'UTF-8',
//                             'min'      => 1,
//                             'max'      => 30,
//                         ),
//                     ),
//                 ),
//             ));
//             $inputFilter->add(array(
//                 'name'     => 'content',
//                 'required' => true,
//                 'filters'  => array(
//                     array('name' => 'StripTags'),
//                     array('name' => 'StringTrim'),
//                 ),
//                 'validators' => array(
//                     array(
//                         'name'    => 'StringLength',
//                         'options' => array(
//                             'encoding' => 'UTF-8',
//                             'min'      => 1,
//                             'max'      => 10000,
//                         ),
//                     ),
//                 ),
//             ));

             
//             $this->inputFilter = $inputFilter;
 //        }
         
        return $this->inputFilter;
    }

}

?>