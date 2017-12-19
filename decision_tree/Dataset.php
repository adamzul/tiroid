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

	function __construct($dataset, $shift = false)
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
		$dataset = ($this->getDataset());
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
	}
	function getJustHaveOneLabel(){
		return $this->justHaveOneLabel;
	}
	
}