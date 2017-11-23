<?php
namespace app\decision_tree;

use Yii;

/**
* 
*/
class instance 
{
	private $instance;
	function __construct($instance)
	{
		# code...
		$this->instance = $instance;
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