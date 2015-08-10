<?php
namespace CookingAssist\Model;

use CookingAssist\Model\Recipe;

class RecipeTable
{
    private $tableGateway;

    function __construct($tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
    public function saveRecipe($recipe){
        echo "saving recipe...";
        echo "level".$recipe->level;
        
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
        
        // Create array with values
        /* insert into database
         * 
         */
        
        

         $id = (int) $recipe->id;
         echo "<br>id: ".$id;
         if ($id == 0) {
             $this->tableGateway->insert($recipeData);

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