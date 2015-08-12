<?php
namespace CookingAssist\Model;

use CookingAssist\Model\Recipe;
use CookingAssist\Model\Type;
use CookingAssist\Model\Ingredient;
use CookingAssist\Model\Workflow;

class AddRecipeTable
{
    private $recipesTableGateway;
    private $workflowsTableGateway;
    private $typesTableGateway;
    private $ingredientsTableGateway;

    function __construct($recipesTableGateway,$workflowsTableGateway,$typesTableGateway,$ingredientsTableGateway)
    {
        $this->recipesTableGateway = $recipesTableGateway;
        $this->workflowsTableGateway = $workflowsTableGateway;
        $this->typesTableGateway = $typesTableGateway;
        $this->ingredientsTableGateway = $ingredientsTableGateway;
    }
    
    public function saveRecipe($recipe){
        echo "saving recipe...";
        
        $recipeData = array(
            'AuthorId' => $recipe->authorId,
            'NoOfPeople' => $recipe->noOfPeople,
            'Kcal'  => $recipe->kcal,
            'PublicFlag'    => $recipe->publicFlag,
            'PreparationTime' => $recipe->preparationTime,
            'CookingTime' => $recipe->cookingTime,
            'RestingTime'   => $recipe-> restingTime,
            'Level' =>  $recipe->level,
        );
        print_r($recipeData);
        
        $workflowData = array(
            'Title' => $recipe->title,
            'Tipp' => $recipe->tipp,
        );
        
        $steps = $recipe->steps;
        echo "Printing steps<br><br>";
        foreach($steps as $step){//works
            $stepData[] = array(
                'isMultiStep' => $step->isMultiStep,
                'Text' => $step->text,
                'QuantityId' => $step->quantityId,
            );
        }
        print_r($stepData);
        
        // Create array with values
        /* insert into database
         * 
         */
        
        

         $id = (int) $recipe->id;
         echo "<br>id: ".$id;
         if ($id == 0) {
             $this->recipesTableGateway->insert($recipeData);
             $this->workflowsTableGateway->insert($workflowData);
             foreach($stepData as $singeData){
                 //insert into stepTAble
             }
             

         } 
//          else {
//              if ($this->getAlbum($id)) {
//                  $this->tableGateway->update($data, array('id' => $id));
//              } else {
//                  throw new \Exception('Album id does not exist');
//              }
//          }
    }
}

?>