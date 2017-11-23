<?php
namespace app\decision_tree;

use Yii;
use app\models\TabelDataset;

/**
* 
*/
class Entropy 
{
	private $fitur;
	private $entropy;

	function __construct($fitur, $entropy)
	{
		# code...
		$this->fitur = $fitur;
		$this->entropy = $entropy;
	}

	private function setFitur($fitur){
		$this->fitur = $fitur;
	}

	function getFitur(){
		return $this->fitur->getFitur();
	}

	private function setEntropy($entropy){
		$this->entropy = $entropy;
	}

	function getEntropy(){
		return $this->entropy;
	}

}