<?php
namespace app\decision_tree;

use Yii;
use app\decision_tree\Node;

/**
* 
*/
class PohonTree 
{
	
	private $nodes = [];
	private $index = 0;
	private $currentNode;
	function __construct()
	{
		# code...
		
	}

	function makeNode($fitur, $instance){
		$node = new Node($fitur, $instance);
		$node->setIndex($this->index);
		$this->index += 1;
		array_push($this->nodes, $node);
	}

	function getNode(){
		return $this->nodes;
	}

	function getNodeFitur($index){
		return $this->node[$index]->getFitur();
	}

	function getNodeInstance($index){
		return $this->node[$index]->getInstance();
	}

	function setNextNode(){
		
	}


}