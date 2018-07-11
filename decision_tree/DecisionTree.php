<?php
namespace app\decision_tree;

use Yii; 
use app\models\TabelDataset;
use app\models\TabelRule;
use app\decision_tree\ObjekJumlahPerlabelPerinstance;
use app\decision_tree\Fitur;
use app\decision_tree\Dataset;
use app\decision_tree\Entropy;
use app\decision_tree\Instance;
use app\decision_tree\Tree;

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
	public $tree;


	function getDataset($dataset){
		if($dataset == null)
			$this->dataset[0] = new Dataset(TabelDataset::find()->asArray()->all(),true) ;
		// $tabel = new TabelDataset();
		// $listFitur = $tabel->attributeLabels();
		// array_pop($listFitur);
		// array_shift($listFitur);
		// $this->dataset[0]->setNameFitur($listFitur) ; 
		else
			$this->dataset[0] = new Dataset($dataset, true) ;

		return $this->dataset[0];
	}
	function getJumData($index){
		$this->jumData = $this->dataset[$index]->getJumlahData();
		return $this->jumData;
	}
	function getJumFitur($index){
		$this->jumFitur = $this->dataset[$index]->getJumlahFitur();
		return $this->jumFitur;
	}

	function getFitur(){
		$tabel = new TabelDataset();
		$listFitur = $tabel->attribute();
		array_pop($listFitur);
		array_shift($listFitur);
		foreach($listFitur as $keyListFitur => $valueListFitur){
			$fitur = new Fitur($valueListFitur);
		    $row = TabelDataset::find()->select($valueListFitur)->asArray()->all();
		    $instance = [];
		    foreach ($row as $keyRow => $valueRow) {
		    	# code...
		    	if(!in_array(new Instance($valueRow[$valueListFitur]), $instance))
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
		$objekJumlahPerlabelPerinstance = [];
		$jumlahPerinstance = [];
		$entropy = 0;
		// $i = 0;
		foreach ($fitur->getInstanceAll() as  $valueInstance) {
			# code...
			foreach ($this->label->getLabel() as   $valueLabel) {
				# code...
				array_push($objekJumlahPerlabelPerinstance, new ObjekJumlahPerlabelPerinstance($valueLabel, $valueInstance));
			}
		}

		foreach ($dataset->getDataset() as $valueDataset) {
			# code...
			for ($i=0; $i < count($objekJumlahPerlabelPerinstance); $i++) { 
			 	# code...
				if($valueDataset[$fitur->getFitur()] == $objekJumlahPerlabelPerinstance[$i]->getInstance() && end($valueDataset) == $objekJumlahPerlabelPerinstance[$i]->getLabel() ) {
					$objekJumlahPerlabelPerinstance[$i]->tambah();
					break;
				}
			} 
		}

		foreach ($fitur->getInstanceAll() as $valueInstance) {
			# code...
			$jumlahPerinstance[$valueInstance] = 0;
		}
		foreach ($objekJumlahPerlabelPerinstance as $valueObjekJumlahPerlabelPerinstance) {
			# code...
			$jumlahPerinstance[$valueObjekJumlahPerlabelPerinstance->getInstance()] += $valueObjekJumlahPerlabelPerinstance->getJumlah();
		}

		// for ($i=0; $i < count($fitur->getInstanceAll()); $i++) { 
		// 	# code...

		// 	$q[$i] = 0;
		// 	for ($j=0; $j < count($this->label->getLabel()); $j++) { 
		// 		# code...
		// 		var_dump($objekJumlahPerlabelPerinstance[$j]);
		// 		if($objekJumlahPerlabelPerinstance[$j]->getJumlah() != 0){
		// 			$temp2 = ($objekJumlahPerlabelPerinstance[$j]->getJumlah() / $jumlahPerinstance[$fitur->getInstanceAll()[$i]]);
		// 			$q[$i] += -$temp2 * log($temp2, 2);
		// 		}
		// 		else
		// 			$q[$i] = 0;
		// 	}
		// 	$entropy += ($jumlahPerinstance[$fitur->getInstanceAll()[$i]] / $dataset->getJumlahData()) * $q[$i];
		// }

		for ($i=0; $i < count($fitur->getInstanceAll()); $i++) { 
			# code...

			$q[$i] = 0;
			for ($j=0; $j < count($objekJumlahPerlabelPerinstance); $j++) { 
				# code...
				if($objekJumlahPerlabelPerinstance[$j]->getInstance() == $fitur->getInstanceAll()[$i])
				{
					// var_dump($objekJumlahPerlabelPerinstance[$j]);
					if($objekJumlahPerlabelPerinstance[$j]->getJumlah() != 0){
						$temp2 = ($objekJumlahPerlabelPerinstance[$j]->getJumlah() / $jumlahPerinstance[$fitur->getInstanceAll()[$i]]);
						$q[$i] += -$temp2 * log($temp2, 2);
					}
					else
						$q[$i] = 0;
				}
			}
			$entropy += ($jumlahPerinstance[$fitur->getInstanceAll()[$i]] / $dataset->getJumlahData()) * $q[$i];
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
	function bagiDataBerdasarFitur($node, $dataset){
			// echo "<br><br><br>ganti loop<br>";
			// var_dump($node);
			// echo "<br><br>";
		foreach ($node->getInstanceAll() as $valueInstance) {
			# code...
			$temp = [];
			$fiturName = $node->getFiturName();
			foreach ($dataset->getDataset() as $data) {
				# code...
				if($data[$fiturName] == $valueInstance)
				{
					array_push($temp, $data);
				}
			}
			if($temp != [])
			{
				$temp2 = new Dataset($temp, false, $node->getIndex(), $valueInstance);
				$listFitur = $dataset->getNameFitur();
				array_push($listFitur, $fiturName);
				$temp2->setNameFitur($listFitur);
				array_push($this->dataset, $temp2);
				// var_dump(end($this->dataset));
				// echo "<br><br><br>";

			}

		}

	}
	function makeTree(){
		$tree = new Tree();
		$tree->makeNode($this->fitur[0]->getFitur(), $this->fitur[0]->getInstanceOne(0));
		return $pohonTree->getNode();
	}
	function addNode($entropy, $index){
		// for ($i=0; $i < count($entropy->getFiturObjek()->getInstanceAll()); $i++) { 
		// 	# code...
		// 	$this->tree->makeNode($entropy->getFitur(), $entropy->getFiturObjek()->getInstanceOne($i));
		// }
		$this->tree->makeNode($entropy->getFiturName(), $entropy->getFiturObjek()->getInstanceAll(), $index);
		return $this->tree;
	}


	function main($dataset = null){
		// inisialisasi
		$this->getDataset($dataset);
		$this->getJumFitur(0);
		$this->getLabel();
		$this->getFitur();
		$this->tree = new Tree();
		$berhenti = 0;
		$doLoop = true;
		// var_dump($this->dataset[0]);
		while($doLoop)
		{	
			$this->entropy = [];
			$index = null;
			for ($i=0; $i < count($this->dataset); $i++) {
				# code...
				if($this->dataset[$i]->getProcessed() == false){
					$this->dataset[$i]->findJustHaveOneLabel();
					if(!$this->dataset[$i]->getJustHaveOneLabel() && !$this->dataset[$i]->getAllDataSame())
					{
						$index = $i;
						break;
					}
					elseif($this->dataset[$i]->getAllDataSame() && !$this->dataset[$i]->getJustHaveOneLabel()){
						$this->tree->getNodeOne($this->dataset[$i]->getIndexNode())->setLabel($this->dataset[$i]->getInstance(), $this->dataset[$i]->getMostLabel());
					}
					else
						$this->tree->getNodeOne($this->dataset[$i]->getIndexNode())->setLabel($this->dataset[$i]->getInstance(), $this->dataset[$i]->getLabel());
					
				}
				
			}
			
			if($index === null)
			{
				break;
			}
			for ($i=0; $i < $this->jumFitur; $i++) { 

				if(!in_array($this->fitur[$i]->getFitur(), $this->dataset[$index]->getNameFitur()))
				array_push($this->entropy, new Entropy($this->fitur[$i], $this->getEntropy($this->dataset[$index], $this->fitur[$i]))); 
				// $this->entropy[$this->fitur[$i]->getFitur()] = $this->getEntropy($this->dataset, $this->fitur[$i]);
			}
			$this->terkecil = $this->getTerkecilDariArray($this->entropy);
			// var_dump($this->entropy);
			// echo "<br><br><br>";
			// $node = $this->makeTree();
			// return $this->entropy;
			$this->addNode($this->terkecil, $index);
			$this->tree->getNodeOne($this->dataset[$index]->getIndexNode())->setIndexNextNode($this->dataset[$index]->getInstance(), $index);

			$this->tree->getNodeOne($index)->setIndexPrevNode($this->dataset[$index]->getIndexNode());
			$this->tree->getNodeOne($index)->setInstancePrevNode($this->dataset[$index]->getInstance());

			// var_dump($this->tree->getNodeAll());
			$this->bagiDataBerdasarFitur($this->tree->getNodeOne($index), $this->dataset[$index]);
			$this->dataset[$index]->setProcessed(true);
			$berhenti++;
			// if($berhenti > 10)
			// 	$doLoop = false;


			
		}
		TabelRule::deleteAll();		
		foreach ($this->tree->getNodeAll() as $node) {
			foreach ($node->getLabelAll() as $key => $value) {
				$model = new TabelRule();
				$temp = $node->getFiturName();
				$model->$temp = $key;
				$model->label = $value;
				$temp = $node; 
				while($temp->getIndexPrevNode() !== null)
				{
					$temp3 = $temp;
					$temp = $this->tree->getNodeOne($temp->getIndexPrevNode());
					$temp2 = $temp->getFiturName();
					$model->$temp2 = $temp3->getInstancePrevNode();
					// echo $temp2;
				}
				$model->save(false);
			}
		}
		// foreach ($this->tree->getNodeAll() as $data) {
		// 	# code...
		// 	var_dump($data);
		// 	echo "<br><br>";
		// }
		// var_dump($this->entropy);
		// var_dump($this->dataset[0]);
		return $this->tree->getNodeAll();
	}
}
?> 