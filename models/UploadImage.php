<?php

namespace app\models;

use yii\base\model;
use yii\web\UploadFile;
use app\connection_firebase\ConnectionFirebase;
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;
use Kunnu\Dropbox\DropboxFile;

class UploadImage extends model{

	public $imageFile = null;
	private $directory, $newImageName, $dropbox;
	

	public function rules(){
		return [
			[['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg']
		];
	}

	public function __construct ($directory, $newImageName){
		$this->directory = $directory;
		$this->newImageName = $newImageName;
		$app = new DropboxApp("tdsqq1b3toxnjqy", "spajuw0r3mcmyh8", "5reuEf-znFAAAAAAAAAALmlc0AIal46TKPLnK6EaQn8V0azUdLfhUj8od7XT69Yt");
		$this->dropbox = new Dropbox($app);
		parent::__construct();
	}

	public function upload(){
		// var_dump($this->imageFile);
		
		if($this->validate() && $this->imageFile != null){
			// $imageRef = (new ConnectionFirebase())->storageRef->getChild($directory)->getChild($this->newImageName.'.'.$this->imageFile->extension);
			// $imageRef->put($this->imageRef);
			// $this->imageFile->saveAs($this->directory.$this->newImageName.'.'.$this->imageFile->extension);
			echo "tidak null";
			$dropboxFile = new DropboxFile($this->imageFile->tempName);
			$file = $this->dropbox->upload($dropboxFile, '/'.$this->newImageName.'.'.$this->imageFile->extension, ['autorename' => true]);
			// var_dump($file->getName());
			return true;
		}
		else{
			return false;
		}
	}
}