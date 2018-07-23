<?php

namespace app\controllers;

use Yii;
use app\models\TabelPrediksi;
use app\models\TabelPasien;
use app\models\TabelPrediksiSearch;
use app\models\TabelJenisKelamin;
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
    public $connection;
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

     public function beforeAction($event){
         $this->connection = (new ConnectionFirebase('diagnose'))->reference;
         return parent::beforeAction($event);
     }

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
            $pasien = TabelPasien::findOne($model->id_pasien);
            $birthDate = explode("-", $pasien->tanggal_lahir);
            $model->usia = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], 
                $birthDate[1]))) > date("md")? ((date("Y") - $birthDate[0]) - 1)
                : (date("Y") - $birthDate[0]));
            $model->hasil_prediksi = (new Prediksi())->getPrediksi($model);
            $jenisKelamin = TabelJenisKelamin::findOne($pasien->id_jenis_kelamin_pasien);
            $model->jenis_kelamin =$jenisKelamin->jenis_kelamin;
            $model->save(false);
            $this->saveToFirebase($model);
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
            $this->saveToFirebase($model);
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
        $model = $this->findModel($id);
        $pasien = TabelPasien::findOne($model->id_pasien);
        $this->connection->getChild($pasien->id_firebase.'/'.$model->id_prediksi)->remove();
        $model->delete();
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

    private function saveToFirebase(TabelPrediksi $model){
        $pasien = TabelPasien::findOne($model->id_pasien);
        // $jenisKelamin = TabelJenisKelamin::findOne($model->jenisKelamin);
        $this->connection->getChild($pasien->id_firebase.'/'.$model->id_prediksi)
            ->set(["name" => $pasien->nama_pasien, "gender" => $model->jenis_kelamin,
                "age" => $model->usia, "thyroidHistory" => $model->riwayat_penyakit_tiroid, 
                "diastolicPulse" => $model->tekanan_diastolik, "sistolicPulse" => $model->tekanan_sistolik,
                "TSH" => $model->TSH, "T4" => $model->T4, "date" => $model->tanggal_input, "prediction" => $model->hasil_prediksi]); 
    }
}
