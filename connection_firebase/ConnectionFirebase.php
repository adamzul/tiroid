<?php
namespace app\connection_firebase;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class ConnectionFirebase
{
	public $serviceAccount, $firebase, $database, $reference, $storageRef, $auth;

	function __construct($argument = null)
	{
		$this->serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/../testing-1b24f-firebase-adminsdk-ggn4f-6c7b865bb0.json');
    	$this->firebase = (new Factory)->withServiceAccount($this->serviceAccount)->create();
    	$this->database = $this->firebase->getDatabase();
    	$this->storageRef = $this->firebase->getStorage();
    	$this->auth = $this->firebase->getAuth();
    	// var_dump($this->firebase);
		if($argument != null){
			$this->reference = $this->database->getReference($argument);
		}
	}

	public function setReference($argument){
		$this->reference = $this->database->getReference($argument);
	}
}