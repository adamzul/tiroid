<?php

namespace app\controllers;

use Yii;
use app\models\TabelPrediksi;
use app\models\TabelPrediksiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\decision_tree\Prediksi;
use app\connection_firebase\ConnectionFirebase;

/**
 * TabelPrediksiController implements the CRUD actions for TabelPrediksi model.
 */
class TabelPrediksiController extends Controller
{
    /**
     * {@inheritdoc}
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

    // public function beforeAction($event){
    //     $this->connection = (new ConnectionFirebase('checkUpResult'))->reference;
    //     return parent::beforeAction($event);
    // }

    /**
     * Lists all TabelPrediksi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TabelPrediksiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TabelPrediksi model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TabelPrediksi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TabelPrediksi();

        if ($model->load(Yii::$app->request->post())) {
            $model->hasil_prediksi = (new Prediksi())->getPrediksi($model);

            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id_prediksi]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TabelPrediksi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->hasil_prediksi = (new Prediksi())->getPrediksi($model);
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id_prediksi]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TabelPrediksi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TabelPrediksi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TabelPrediksi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TabelPrediksi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function saveToFirebase($model){
        $jenisPemeriksaan = TabelJenisPemeriksaan::findOne($model->id_jenis_pemeriksaan_pasien);
        $pasien = TabelPasien::findOne($model->id_pasien);
        $newPost = $this->connection->getChild($pasien->id_firebase.'/'.$model->id_prediksi)
            ->set(["name" => $pasien->nama_pasien, "gender" => $model->jenis_kelamin, "age" => $model->tanggal_pemeriksaan, "image" => $model->foto]); 
    }
}
