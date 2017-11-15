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
	function __construct($fitur, $index)
	{
		# code...
		$this->fitur = $fitur;
		$this->index = $index;
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
}