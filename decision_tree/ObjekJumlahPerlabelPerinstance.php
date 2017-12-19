<?php
namespace app\decision_tree;

use Yii;

class ObjekJumlahPerlabelPerinstance{

	private $label;
	private $instance;
	private $jumlah = 0;

	function __construct($label, $instance){
		$this->label = $label;
		$this->instance = $instance;
	}

	function getLabel(){
		return $this->label;
	}

	function getInstance(){
		return $this->instance;
	}

	function getJumlah(){
		return $this->jumlah;
	}
	
	function tambah(){
		$this->jumlah++;
	}

}