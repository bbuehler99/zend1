<?php
namespace CookingAssist\Model;


class RecipeType
{
	private $recipeId;
	private $typeId;

	public function getRecipeId(){ return $this->recipeId;}
	public function getTypeId(){ return $this->typeId;}

	public function setRecipeId($recipeId){ $this->recipeId = $recipeId;}
	public function setTypeId($typeId){ $this->typeId = $typeId;}
}