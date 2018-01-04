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
	private $instance = [];
	private $indexNextNode ;
	private $label = [];
	private $indexPrevNode;
	private $instancePrevNode; 
	
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

	function setIndexNextNode($indexInstance, $indexNextNode){
		$this->indexNextNode[$indexInstance] = $indexNextNode;
	}

	function getIndexNextNode(){
		return $this->nextNode;
	}

	function setLabel($indexLabel, $label){
		$this->label[$indexLabel] = $label;
	}

	function getLabelOne($indexLabel){
		return $this->label[$indexLabel];
	}
	function getLabelAll(){
		return $this->label;
	}
	function setIndexPrevNode($index){
		$this->indexPrevNode = $index;
	}
	function getIndexPrevNode(){
		return $this->indexPrevNode;
	}
	function setInstancePrevNode($instance){
		$this->instancePrevNode = $instance;
	}
	function getInstancePrevNode(){
		return $this->instancePrevNode;
	}
}