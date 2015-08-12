<?php
namespace CookingAssist\Model;


class Quantities
{
	private $id;
	private $value;
	private $unitId;

	public function getId(){ return $this->id;}
	public function getValue(){ return $this->value;}
	public function getUnitId(){ return $this->unitId;}

	public function setId($id){ $this->id = $id;}
	public function setValue($value){ $this->value = $value;}
	public function setUnitId($unitId){ $this->unitId = $unitId;}
}