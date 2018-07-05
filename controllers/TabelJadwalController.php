<?php

namespace app\controllers;

use Yii;
use app\models\TabelJadwal;
use app\models\TabelJadwalSearch;
use app\models\TabelPegawai;
use app\models\TabelHari;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use app\connection_firebase\ConnectionFirebase;

/**
 * TabelJadwalController implements the CRUD actions for TabelJadwal model.
 */
class TabelJadwalController extends Controller
{
    public $connection;
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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [['actions' => ['index', 'create', 'update', 'delete', 'view',],'allow' => true,'roles' => ['@']],
                ]
            ],
        ];
    }
    public function beforeAction($event){
        $this->connection = (new ConnectionFirebase('doctorSchedule'))->reference;
        return parent::beforeAction($event);
    }

    /**
     * Lists all TabelJadwal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TabelJadwalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TabelJadwal model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TabelJadwal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TabelJadwal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             $this->saveToFirebase($model);
            return $this->redirect(['view', 'id' => $model->id_jadwal_dokter]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TabelJadwal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->saveToFirebase($model);
            return $this->redirect(['view', 'id' => $model->id_jadwal_dokter]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TabelJadwal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $newPost = $this->connection->getChild($model->id_pegawai.'/'.$model->id_jadwal_dokter)->remove();
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TabelJadwal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TabelJadwal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TabelJadwal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function saveToFirebase($model){
        $dokter = TabelPegawai::find()->where(['id_pegawai' => $model->id_pegawai])->one();
        $hari = TabelHari::find()->where(['id_hari' => $model->id_hari_jadwal])->one();
        $newPost = $this->connection->getChild($model->id_pegawai.'/'.$model->id_jadwal_dokter)
        ->set(["doctorName" => $dokter->nama_pegawai, "day" => $hari->hari, "code" => $hari->code, 'timeStart' => $model->jam_mulai_jadwal, 'timeStop' => $model->jam_berakhir_jadwal]);
    }
}
