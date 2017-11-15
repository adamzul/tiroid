<?php
namespace app\decision_tree;

use Yii;

/**
* 
*/
class Label 
{
	private $label;
	
	function setLabel($label)
	{
		$this->label = $label;
	}
	
	function getLabel()
	{
		return $this->label;
	}
}