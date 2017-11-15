<?php
namespace app\decision_tree;

use Yii;
use app\models\TabelDataset;

/**
* 
*/
class Dataset 
{
	private $dataset;
	private $jumlahData;

	function __construct($dataset)
	{
		# code...
		$this->dataset = $dataset;
		$this->setJumlahData();
		for ($i=0; $i < $this->jumlahData; $i++) { 
			array_shift($this->dataset[$i]);
		}
		$this->setJumlahFitur();
	}

	private function setJumlahData(){
		$this->jumlahData = count($this->dataset);
	}

	function getJumlahData(){
		return $this->jumlahData;
	}

	private function setJumlahFitur(){
		$this->jumlahFitur = count($this->dataset[0]) - 1;
	}

	function getJumlahFitur(){
		return $this->jumlahFitur;
	}

	function setDataset($dataset){
		$this->__construct($dataset);
	}

	function getDataset(){
		return $this->dataset;
	}

	
}