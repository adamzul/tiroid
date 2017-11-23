<?php
namespace app\decision_tree;

use Yii; 
use app\models\TabelDataset;
use app\decision_tree\ObjekJumlahPerlabelPersubset;
use app\decision_tree\Fitur;
use app\decision_tree\Dataset;
use app\decision_tree\Entropy;
use app\decision_tree\Instance;
use app\decision_tree\PohonTree;

class DecisionTree
{
	public $dataset;
	public $dataDibagi;
	public $jumFitur;
	public $instance = [];
	public $jumData ;
	public $label = [];
	public $entropy = [];
	public $terkecil;
	public $fitur = [];


	function getDataset(){

		$this->dataset = new Dataset(TabelDataset::find()->asArray()->all()) ;
		return $this->dataset;
	}
	function getJumData(){
		$this->jumData = $this->dataset->getJumlahData();
		return $this->jumData;
	}
	function getJumFitur(){
		$this->jumFitur = $this->dataset->getJumlahFitur();
		return $this->jumFitur;
	}

	function getFitur(){
		$tabel = new TabelDataset();
		$listFitur = $tabel->attributeLabels();
		array_pop($listFitur);
		array_shift($listFitur);
		foreach($listFitur as $keyListFitur => $valueListFitur){
			$fitur = new Fitur(strtolower($valueListFitur));
		    $row = TabelDataset::find()->select($valueListFitur)->asArray()->all();
		    $instance = [];
		    foreach ($row as $keyRow => $valueRow) {
		    	# code...
		    	if(!in_array($valueRow[$valueListFitur], $instance))
		    		array_push($instance, new Instance($valueRow[$valueListFitur]));
		    }
		    $fitur->setInstance($instance) ;
		    array_push($this->fitur, $fitur);
		}
	}

	
	function getLabel(){
		$key = 'label';
		$row = TabelDataset::find()->select($key)->asArray()->all();
		$label = new Label();
		$temp = [];
		foreach ($row as $keyRow => $valueRow) {
			# code...
			if(!in_array($valueRow[$key], $temp))
				array_push($temp, $valueRow[$key]);
		}
		$label->setLabel($temp);
		$this->label = $label;
	}
	
	function getEntropy($dataset, $fitur){
		$q = [];
		$objekJumlahPerlabelPersubset = [];
		$jumlahPerinstance = [];
		$entropy = 0;
		// $i = 0;
		foreach ($fitur->getInstanceAll() as  $valueInstance) {
			# code...
			foreach ($this->label->getLabel() as   $valueLabel) {
				# code...
				array_push($objekJumlahPerlabelPersubset, new ObjekJumlahPerlabelPersubset($valueLabel, $valueInstance));
			}
		}
		foreach ($dataset->getDataset() as $valueDataset) {
			# code...
			for ($i=0; $i < count($objekJumlahPerlabelPersubset); $i++) { 
			 	# code...
				if($valueDataset[$fitur->getFitur()] == $objekJumlahPerlabelPersubset[$i]->getInstance() && end($valueDataset) == $objekJumlahPerlabelPersubset[$i]->getLabel() ) {
					$objekJumlahPerlabelPersubset[$i]->tambah();
					break;
				}

			} 
		}

		foreach ($fitur->getInstanceAll() as $valueInstance) {
			# code...
			$jumlahPerinstance[$valueInstance] = 0;
		}
		foreach ($objekJumlahPerlabelPersubset as $valueObjekJumlahPerlabelPersubset) {
			# code...
			$jumlahPerinstance[$valueObjekJumlahPerlabelPersubset->getInstance()] += $valueObjekJumlahPerlabelPersubset->getJumlah();
		}

		for ($i=0; $i < count($fitur->getInstanceAll()); $i++) { 
			# code...

			$q[$i] = 0;
			for ($j=0; $j < count($this->label->getLabel()); $j++) { 
				# code...
				if($objekJumlahPerlabelPersubset[$j]->getJumlah() != 0){
					$temp2 = ($objekJumlahPerlabelPersubset[$j]->getJumlah() / $jumlahPerinstance[$fitur->getInstanceAll()[$i]]);
					$q[$i] += -$temp2 * log($temp2, 2);
				}
				else
					$q[$i] = 0;
			}
			$entropy += ($jumlahPerinstance[$fitur->getInstanceAll()[$i]] / $this->dataset->getJumlahData()) * $q[$i];
		}

		return $entropy;
		
		
	}
	
	function getTerkecilDariArray($entropy){
		$terkecil = $entropy[0];
		foreach ($entropy as $valueEntropy) {
			# code...
			if($valueEntropy->getEntropy() < $terkecil->getEntropy())
			{
				$terkecil = $valueEntropy;
			}
		}
		return $terkecil;
	}
	function bagiDataBerdasarFitur($fitur, $dataset){
		foreach ($fitur->getInstance() as $valueInstance) {
			# code...
			
		}
	}
	function makeTree(){
		$pohonTree = new PohonTree();
		$pohonTree->makeNode($this->fitur[0]->getFitur(), $this->fitur[0]->getInstanceOne(0));
		return $pohonTree->getNode();
	}


	function main(){
		$this->getDataset();
		$this->getJumData();
		$this->getJumFitur();
		// $this->getInstance();
		$this->getLabel();
		$this->getFitur();
		// $i=2;
		for ($i=0; $i < $this->jumFitur; $i++) { 
			# code...
			array_push($this->entropy, new Entropy($this->fitur[$i], $this->getEntropy($this->dataset, $this->fitur[$i]))); 
			// $this->entropy[$this->fitur[$i]->getFitur()] = $this->getEntropy($this->dataset, $this->fitur[$i]);
		}
		$this->terkecil = $this->getTerkecilDariArray($this->entropy);
		$node = $this->makeTree();
		return $this->makeTree();
	}
}
?> 