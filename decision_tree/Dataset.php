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
	private $processed = false;
	private $justHaveOneLabel = false;
	private $indexNode;
	private $instance;
	private $label = null;
	private $allDataSame;
	private $nameFitur = [];
	private $mostLabel;

	function __construct($dataset, $shift = false, $indexNode = null, $instance = null)
	{
		# code...
		$this->dataset = $dataset;
		$this->setJumlahData();
		if($shift == true){
			for ($i=0; $i < $this->jumlahData; $i++) { 
				array_shift($this->dataset[$i]);
			}
		}
		
		$this->setJumlahFitur();
		$this->indexNode = $indexNode;
		$this->instance = $instance;
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

	function setProcessed($processed){
		$this->processed = $processed;
	}
	function getProcessed(){
		return $this->processed;
	}

	function findJustHaveOneLabel(){
		$dataset = $this->getDataset();
		$label = end($dataset[0]);
		// var_dump($label);
		foreach ($this->getDataset() as $data) {
			# code...
			// var_dump($data['label']);
			// echo "<br><br>";
			if($data['label'] != $label){
				// echo 'keluar';
				return ;
			}
		}
		$this->justHaveOneLabel = true;
		$this->label = $label;
	}
	function getJustHaveOneLabel(){
		return $this->justHaveOneLabel;
	}
	function setIndexNode($index){
		$this->indexNode = $index;
	}
	function getIndexNode(){
		return $this->indexNode;
	}
	function setInstance($instance){
		$this->instance = $instance;
	}
	function getInstance(){
		return $this->instance;
	}
	function getLabel(){
		return $this->label;
	}
	function getAllDataSame(){
		for ($i=0; $i < count($this->dataset) - 1; $i++) { 
			foreach ($this->dataset[0] as $key => $value) {
				if($key == "label")
					break;
				if($this->dataset[$i][$key] != $this->dataset[$i+1][$key])
				{
					// $this->allDataSame = false;
					return false;
				}
			}return true;
			// $this->allDataSame = true;
		}
	}
	function setNameFitur($fitur){
		$this->nameFitur = $fitur;
	}
	function getNameFitur(){
		return $this->nameFitur;
	}
	function getMostLabel(){
		$label = [];
		foreach ($this->dataset as $value) {
			array_push($label, $value["label"]);
		}
		$c = array_count_values($label); 
		$val = array_search(max($c), $c);
		return $val;
	}
	
}