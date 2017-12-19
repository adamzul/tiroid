<?php
namespace app\decision_tree;

use Yii;
use app\decision_tree\Fitur;

/**
* 
*/
class Node 
{
	private $fitur;
	private $index = [];
	private $instance = [];
	private $indexNextNode = [];
	private $label;
	function __construct($fitur = null, $instance = [])
	{
		# code...
		$this->fitur = $fitur;
		$this->instance = $instance;
	}

	function setFitur($fitur){
		$this->fitur = $fitur;
	}

	function getFiturName()
	{
		return $this->fitur;
	}

	function setInstance($instance)
	{
		$this->instance = $instance;
	}
	function getInstanceOne($index){
		return $this->instance[$index]->getInstance();
	}
	function getInstanceAll()
	{
		return $this->instance;
	}

	function setIndex($index){
		$this->index = $index;
	}

	function getIndex(){
		return $this->index;
	}

	function setNextNode($indexInstance, $indexNextNode){
		$this->indexNextNode[$indexInstance] = $indexNextNode;
	}

	function getNextNode(){
		return $this->nextNode;
	}

	function setLabel($label){
		$this->label = $label;
	}

	function getLabel(){
		return $this->label;
	}
}