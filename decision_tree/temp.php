<?php 
function getLabel(){
		for ($i=0; $i < $this->jumData; $i++) { 
			# code...
			if(!in_array($this->dataset[$i]['label'], $this->label)){
				array_push($this->label, $this->dataset[$i]['label']);
			}
		}
	}
	function getEntropy($dataset, $instance, $label, $index){
		$q = [];
		$temp = [];
		$jumlahPerinstance = [];
		$entropy = 0;
		// $i = 0;
		$fitur = "fitur" . ($index+1);
		foreach ($instance as  $valueInstance) {
			# code...
			foreach ($label as   $valueLabel) {
				# code...
				array_push($temp, ["label" => $valueLabel, "instance" => $valueInstance, "jumlah" => 0]);
			}
		}
		foreach ($dataset as $valueDataset) {
			# code...
			for ($i=0; $i < count($temp); $i++) { 
			 	# code...
				if($valueDataset[$fitur] == $temp[$i]["instance"] && end($valueDataset) == $temp[$i]["label"]){
					$temp[$i]["jumlah"]++;
					break;
				}

			} 
		}

		foreach ($instance as $valueInstance) {
			# code...
			$jumlahPerinstance[$valueInstance] = 0;
		}
		foreach ($temp as $valueTemp) {
			# code...
			$jumlahPerinstance[$valueTemp["instance"]] += $valueTemp["jumlah"];
		}

		for ($i=0; $i < count($instance); $i++) { 
			# code...

			$q[$i] = 0;
			for ($j=0; $j < count($label); $j++) { 
				# code...
				if($temp[$j]["jumlah"] != 0){
					$temp2 = ($temp[$j]["jumlah"] / $jumlahPerinstance[$instance[$i]]);
					$q[$i] += -$temp2 * log($temp2, 2);
				}
				else
					$q[$i] = 0;
			}
			$entropy += ($jumlahPerinstance[$instance[$i]] / count($dataset)) * $q[$i];
		}

		return $entropy;
		
		
	}

	function getDataset(){

		$this->dataset = new Dataset(TabelDataset::find()->asArray()->all()) ;
		for ($i=0; $i < count($this->dataset); $i++) { 
			array_shift($this->dataset[$i]);
		}
		return $this->dataset;
	}

	function getJumData(){
		$this->jumData = count($this->dataset);
		return $this->jumData;
	}
	function getJumFitur(){
		$this->jumFitur = count($this->dataset[0]) - 1;
		return $this->jumFitur;
	}

	function getTerkecilDariArray($data){
		$fiturTerkecil = key($data);
		$terkecil = $data[$fiturTerkecil];
		foreach ($data as $keyData => $valueData) {
			# code...
			if($valueData < $terkecil)
			{
				$fiturTerkecil = $keyData;
				$terkecil = $valueData;
			}
		}
		return [$fiturTerkecil => $terkecil];
	}