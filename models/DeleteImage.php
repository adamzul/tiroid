<?php

namespace app\models;

use yii\base\model;
use yii\web\UploadFile;
use app\connection_firebase\ConnectionFirebase;
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;
use Kunnu\Dropbox\DropboxFile;

class DeleteImage {

	public $imageFile;
	private $imageName, $dropbox;
	
	public function __construct ($directoryPath, $imageName){
		$this->directoryPath = $directoryPath;
		$this->imageName = $imageName;
		$app = new DropboxApp("tdsqq1b3toxnjqy", "spajuw0r3mcmyh8", "5reuEf-znFAAAAAAAAAALmlc0AIal46TKPLnK6EaQn8V0azUdLfhUj8od7XT69Yt");
		$this->dropbox = new Dropbox($app);
	}

	public function delete(){
		$file = $this->dropbox->delete('/'.$this->directoryPath.'/'.$this->imageName);
		return $file;
	}
}