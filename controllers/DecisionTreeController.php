<?php

namespace app\controllers;
 
use Yii;
use app\decision_tree\DecisionTree;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\TabelRule;


class DecisionTreeController extends \yii\web\Controller
{
	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
    	return $this->render('index');
    }
    public function actionLearning()
    {
    	$tes = new DecisionTree();
    	$dataReturn = $tes->main();
        return $this->redirect(['decision-tree/index']);
    }
    public function actionValidate()
    {
    	$model = new TabelRule();

        if ($model->load(Yii::$app->request->post())) {
        	$dataRules = TabelRule::find()->asArray()->all();
        	$tabel = new TabelRule();
			$listFitur = $tabel->attributeLabels();
			array_pop($listFitur);
			array_shift($listFitur);
			$temp = $model->fitur1;
        	foreach ($dataRules as $dataRule) {
        		$validate = true;
        		foreach ($listFitur as $key => $fitur) {
        			# code...
        			if($model->$key != null)
        				if(strtolower($model->$key) != strtolower($dataRule[$key]))
        				{
        					$validate = false;
        					break;
        				}
        		}
        		if($validate == true)
        		{
        			$label = $dataRule['label'];
        			break;
        		}
        	}
        	return $this->render('result', ['label' => $label]);

        } else {
            return $this->render('validate', [
                'model' => $model,
            ]);
        }
    }

}
