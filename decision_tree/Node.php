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
	private $index;
	private $instance;
	private $nextNode;
	private $label;
	function __construct($fitur, $instance)
	{
		# code...
		$this->fitur = $fitur;
		$this->instance = $instance;
	}

	function setFitur($fitur){
		$this->fitur = $fitur;
	}

	function getFitur()
	{
		return $this->fitur->getFitur();
	}

	function setInstance($instance)
	{
		$this->instance = $instance;
	}

	function getInstance()
	{
		return $this->instance;
	}

	function setIndex($index){
		$this->index = $index;
	}

	function getIndex(){
		return $this->index;
	}

	function setNextNode($index){
		$this->nextNode = $index;
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