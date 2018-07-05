<?php

namespace app\models;

use yii\base\model;
use yii\web\UploadFile;
use app\connection_firebase\ConnectionFirebase;
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;
use Kunnu\Dropbox\DropboxFile;

class DownloadImage {

	public $imageFile;
	private $imageName, $dropbox;
	
	public function __construct ($imageName){
		$this->imageName = $imageName;
		$app = new DropboxApp("tdsqq1b3toxnjqy", "spajuw0r3mcmyh8", "5reuEf-znFAAAAAAAAAALmlc0AIal46TKPLnK6EaQn8V0azUdLfhUj8od7XT69Yt");
		$this->dropbox = new Dropbox($app);
	}

	public function download(){
		$file = $this->dropbox->download($this->imageName);
		$metadata = $file->getMetadata();
		$metadata->getName();
		// file_put_contents(__DIR__ . "/wew.jpg", $file->getContents());
		$base64 = "data:image/" . "jpg" . ";base64," . base64_encode($file->getContents());
		// var_dump($file->getContents());
		return $base64;
	}
}