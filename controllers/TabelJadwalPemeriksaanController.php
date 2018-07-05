<?php

namespace app\controllers;

use Yii;
use app\Models\TabelJadwalPemeriksaan;
use app\Models\TabelJadwalPemeriksaanSearch;
use app\Models\TabelPasien;
use app\Models\TabelJenisPemeriksaan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\connection_firebase\ConnectionFirebase;


/**
 * TabelJadwalPemeriksaanController implements the CRUD actions for TabelJadwalPemeriksaan model.
 */
class TabelJadwalPemeriksaanController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [['actions' => ['index', 'create', 'update', 'delete', 'view',],'allow' => true,'roles' => ['@']],
                    ]
            ],
        ];
    }
    public function beforeAction($event){
        $this->connection = (new ConnectionFirebase('schedule'))->reference;
        return parent::beforeAction($event);
    }

    /**
     * Lists all TabelJadwalPemeriksaan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TabelJadwalPemeriksaanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TabelJadwalPemeriksaan model.
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
     * Creates a new TabelJadwalPemeriksaan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TabelJadwalPemeriksaan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->saveToFirebase($model);
            return $this->redirect(['view', 'id' => $model->id_jadwal_pemeriksaan]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TabelJadwalPemeriksaan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->saveToFirebase($model);
            return $this->redirect(['view', 'id' => $model->id_jadwal_pemeriksaan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TabelJadwalPemeriksaan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $jenisPemeriksaan = TabelJenisPemeriksaan::findOne($model->id_jenis_pemeriksaan);
        $pasien = TabelPasien::findOne($model->id_pasien);
        $newPost = $this->connection->getChild($pasien->id_firebase.'/'.$model->id_jadwal_pemeriksaan)
            ->remove();
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TabelJadwalPemeriksaan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TabelJadwalPemeriksaan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TabelJadwalPemeriksaan::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    private function saveToFirebase($model){
        $jenisPemeriksaan = TabelJenisPemeriksaan::findOne($model->id_jenis_pemeriksaan);
        $pasien = TabelPasien::findOne($model->id_pasien);
        $newPost = $this->connection->getChild($pasien->id_firebase.'/'.$model->id_jadwal_pemeriksaan)
            ->set(["contentTitle" => $jenisPemeriksaan->jenis_pemeriksaan,  "date" => $model->jadwal_pemeriksaan]); 
    }
}
