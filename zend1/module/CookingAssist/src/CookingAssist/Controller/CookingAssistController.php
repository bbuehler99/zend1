<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/CookingAssist for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace CookingAssist\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use CookingAssist\Form\AddRecipeForm;
use Zend\View\Model;
use Zend\View\Helper\ViewModel;
use CookingAssist\Form\RecipeFieldset;
class CookingAssistController extends AbstractActionController
{
    public function indexAction()
    {
        echo "indexAction";
        return array();
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /cookingAssist/cooking-assist/foo
        return array();
    }
    public function addRecipeAction(){
        
        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $addRecipeForm = new AddRecipeForm($dbAdapter);
        
        return array('form'=>$addRecipeForm);
    }
}
