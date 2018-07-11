<?php

namespace app\controllers;
 
use Yii;
use app\decision_tree\DecisionTree;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\TabelRule;
use app\models\TabelDataset;


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
    	$tes->main();
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
            $tes ;
        	foreach ($dataRules as $dataRule) {
        		$validate = true;
        		foreach ($listFitur as $key => $fitur) {
        			# code...
        			if($model->$key != null && $dataRule[$key] != null)
        				if(strtolower($model->$key) != strtolower($dataRule[$key]))
        				{
        					$validate = false;

        					break;
        				}
        		}
        		if($validate == true)
        		{
                    $tes = $dataRule;
        			$label = $dataRule['label'];
        			break;
        		}
        	}
        	return $this->render('result', ['label' => $label, 'tes' => $tes]);

        } else {
            return $this->render('validate', [
                'model' => $model,
            ]);
        }
    }

    public function actionLeaveOneOut()
    {

        $dataset =  TabelDataset::find()->asArray()->all(); 
        $jumlahDataset = count($dataset);       
        $dataRules = TabelRule::find()->asArray()->all();
        $tabel = new TabelRule();
        $listFitur = $tabel->attributeLabels();
        array_pop($listFitur);
        array_shift($listFitur);
        $prediksiBenar = 0;

        for($i = 0; $i<$jumlahDataset; $i++)
        {
            $datasetTemp = $dataset;
            $dataTes = $datasetTemp[$i];
            array_splice($datasetTemp, $i, 1);
            $decisionTree = new DecisionTree();
            $decisionTree->main($datasetTemp);
            $dataRules = TabelRule::find()->asArray()->all();

            foreach ($dataRules as $dataRule) {
                $validate = true;
                foreach ($listFitur as $key => $fitur) {
                    # code...
                    if($dataTes[$key] != null && $dataRule[$key] != null)
                        if(strtolower($dataTes[$key]) != strtolower($dataRule[$key]))
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
            if($dataTes['label'] == $label)
                $prediksiBenar++;
        }
        
        $akurasi = ($prediksiBenar/$jumlahDataset)*100;
        
        return $this->render('akurasi', [
            'akurasi' => $akurasi
        ]);
    }
    public function actionTenCross()
    {

        $k = 10;
        $akurasi = 100;
        $dataset =  TabelDataset::find()->asArray()->all(); 
        $jumlahDataset = count($dataset);       
        // $dataRules = TabelRule::find()->asArray()->all();
        $tabel = new TabelRule();
        $listFitur = $tabel->attributeLabels();
        array_pop($listFitur);
        array_shift($listFitur);
        $prediksiBenar = 0;
        $perFold = ceil($jumlahDataset/$k); 
        $prediksiBenar = 0;
        for($i = 0; $i<$k; $i++)
        {
            $datasetTemp = $dataset;
            $dataTes = array_slice($datasetTemp,$i*$perFold , $perFold);
            array_splice($datasetTemp, $i*$perFold, $perFold);
            $decisionTree = new DecisionTree();
            $decisionTree->main($datasetTemp);
            $dataRules = TabelRule::find()->asArray()->all();

            // $label = null;
            foreach ($dataTes as $model) {
                foreach ($dataRules as $dataRule) {
                    $validate = true;
                    foreach ($listFitur as $key => $fitur) {
                        # code...
                        if($model[$key] != null && $dataRule[$key] != null)
                            if(strtolower($model[$key]) != strtolower($dataRule[$key]))
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
                if($model['label'] == $label)
                    $prediksiBenar++;
            }
        }
        $akurasi = ($prediksiBenar/$jumlahDataset)*100;
        (new DecisionTree())->main();
        return $this->render('akurasi', [
            'akurasi' => $akurasi
        ]);
    }
    public function actionAkurasi()
    {
        $dataset =  TabelDataset::find()->asArray()->all(); 
        $jumlahDataset = count($dataset);       
        $dataRules = TabelRule::find()->asArray()->all();
        $tabel = new TabelRule();
        $listFitur = $tabel->attributeLabels();
        array_pop($listFitur);
        array_shift($listFitur);
        $eutiroidEutiroid = 0;
        $eutiroidHipertiroid = 0;
        $eutiroidhipotiroid = 0;
        $hipertiroidHipertiroid = 0;
        $hipertiroidEutiroid = 0;
        $hipertiroidHipotiroid = 0;
        $hipotiroidHipertiroid = 0;
        $hipotiroidEutiroid = 0;
        $hipotiroidHipotiroid = 0;
        $dataAkurasi = ['Euthyroid' => ['Euthyroid' => 0, 'Hypothyroid' => 0, 'Hiperthyroid' => 0],
                        'Hypothyroid' => ['Euthyroid' => 0, 'Hypothyroid' => 0, 'Hiperthyroid' => 0],
                        'Hiperthyroid' => ['Euthyroid' => 0, 'Hypothyroid' => 0, 'Hiperthyroid' => 0]];
        
        $prediksiBenar = 0;
        // $label = null;
        foreach ($dataset as $model) {
            # code...
        
            foreach ($dataRules as $dataRule) {
                $validate = true;
                foreach ($listFitur as $key => $fitur) {
                    # code...
                    if($model[$key] != null && $dataRule[$key] != null)
                        if(strtolower($model[$key]) != strtolower($dataRule[$key]))
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
            $dataAkurasi[$model['label']][$label]++;
            if($model['label'] == $label)
                $prediksiBenar++;
        }
        $tes['Euthyroid']['precision'] = $dataAkurasi['Euthyroid']['Euthyroid']*100/($dataAkurasi['Euthyroid']['Euthyroid']+$dataAkurasi['Hiperthyroid']['Euthyroid']+$dataAkurasi['Euthyroid']['Hypothyroid']);
        $tes['Hiperthyroid']['precision'] = $dataAkurasi['Hiperthyroid']['Hiperthyroid']*100/($dataAkurasi['Euthyroid']['Hiperthyroid']+$dataAkurasi['Hiperthyroid']['Hiperthyroid']+$dataAkurasi['Hiperthyroid']['Hypothyroid']);
        $tes['Hypothyroid']['precision'] = $dataAkurasi['Hypothyroid']['Hypothyroid']*100/($dataAkurasi['Euthyroid']['Hypothyroid']+$dataAkurasi['Hiperthyroid']['Hypothyroid']+$dataAkurasi['Hypothyroid']['Hypothyroid']);

            $akurasi = ($prediksiBenar/$jumlahDataset)*100;
        return $this->render('akurasi', [
            'akurasi' => $akurasi
        ]);
        
    }

}
