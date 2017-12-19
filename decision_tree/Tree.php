<?php
namespace app\decision_tree;

use Yii;
use app\decision_tree\Node;

/**
* 
*/
class Tree 
{
	
	private $nodes = [];
	private $index = 0;
	private $currentNode;
	function __construct()
	{
		# code...
		
	}

	function makeNode($fitur, $instance, $index){
		$node = new Node($fitur, $instance);
		$node->setIndex($index);
		// $this->index += 1;
		array_push($this->nodes, $node);
	}

	function getNodeAll(){
		return $this->nodes;
	}
	function getNodeOne($index){
		foreach ($this->nodes as $node) {
			# code...
			if($node->getIndex() == $index){
				return $node;
			}
		}
	}

	function getNodeFitur($index){
		return $this->node[$index]->getFitur();
	}

	function getNodeInstance($index){
		return $this->node[$index]->getInstance();
	}

	function setIndexNode(){

	}

	function setNextNode(){
		
	}


}