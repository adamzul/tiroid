<?php
namespace app\decision_tree;

use Yii;
use app\decision_tree\DecisionTree;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\TabelRule;
use app\models\TabelDataset;
use app\models\TabelPrediksi;

class Prediksi
{
	public function getPrediksi($model){

		$label = 'tidak dapat ditentukan';
    	$dataRules = TabelRule::find()->asArray()->all();
    	$tabel = new TabelRule();
		$listFiturDataRule = $tabel->attribute();
		array_pop($listFiturDataRule);
		array_shift($listFiturDataRule);
    	foreach ($dataRules as $dataRule) {
    		$validate = true;
    		foreach ($listFiturDataRule as $key => $fitur) {
    			# code...
    			if($model->$key != null && $dataRule[$key] != null){
        			if (strpos($dataRule[$key], '[') !== false) {
        				$dataRule[$key] = str_replace('[', '', $dataRule[$key]);
        				$dataRule[$key] = str_replace(']', '', $dataRule[$key]);
        				$minmax = explode(',', $dataRule[$key]);
        				if($model->$key < $minmax[0] || $model->$key > $minmax[1]){
        					$validate = false;
        					break;
        				}
        			}elseif(strtolower($dataTes[$key]) != strtolower($dataRule[$key]))
                    {
                        $validate = false;
                        break;
                    }
        		}
    		}
    		$tes = null;
    		if($validate == true)
    		{
                $tes = $dataRule;
    			$label = $dataRule['label'];
    			break;
    		}
    	}
    	return $label;

	}
	public function removeBraket($data){
		$remove = preg_quote('[', '/');
		$regex = '/,'.$remove.'$|^'.$remove.',|^'.$remove.'$|,'.$remove.'(?=,)/';
		$data = preg_replace($regex, '', $data);
		$remove = preg_quote(']', '/');
		$regex = '/,'.$remove.'$|^'.$remove.',|^'.$remove.'$|,'.$remove.'(?=,)/';
		$data = preg_replace($regex, '', $data);
		return $data;
	}
}