<?php
namespace app\decision_tree;

use Yii;

/**
* 
*/
class Fitur 
{
	private $fitur;
	private $instance;
	function __construct($fitur)
	{
		# code...
		$this->fitur = $fitur;
	}

	function setFitur($fitur){
		$this->fitur = $fitur;
	}

	function getFitur()
	{
		return $this->fitur;
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