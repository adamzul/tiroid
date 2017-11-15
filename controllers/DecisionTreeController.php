<?php

namespace app\controllers;
 
use Yii;
use app\decision_tree\DecisionTree;

class DecisionTreeController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$tes = new DecisionTree();
    	$dataReturn = $tes->main();
    	
        return $this->render('index'
        	, ['dataReturn' => $dataReturn]
        	);
    }

}
