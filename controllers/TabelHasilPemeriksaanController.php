<?php

namespace app\controllers;

use Yii;
use app\models\TabelHasilPemeriksaan;
use app\models\TabelHasilPemeriksaanSearch;
use app\models\UploadImage;
use app\models\DownloadImage;
use app\models\DeleteImage;
use app\models\TabelPasien;
use app\models\TabelJenisPemeriksaan;

use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\connection_firebase\ConnectionFirebase;


/**
 * TabelHasilPemeriksaanController implements the CRUD actions for TabelHasilPemeriksaan model.
 */
class TabelHasilPemeriksaanController extends Controller
{
    public $connection;
    public $defaultImage = 'default_checkup_result.jpg';
    public $dropboxDirectory = 'checkup_result';
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
        $this->connection = (new ConnectionFirebase('checkUpResult'))->reference;
        return parent::beforeAction($event);
    }

    /**
     * Lists all TabelHasilPemeriksaan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TabelHasilPemeriksaanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TabelHasilPemeriksaan model.
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
     * Creates a new TabelHasilPemeriksaan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $directory = "../upload/hasil_pemeriksaan/";
        $nameImage = round(microtime(true) * 1000);
        $model = new TabelHasilPemeriksaan();
        $upload = new UploadImage($this->dropboxDirectory, $nameImage);
        // $storage = (new ConnectionFirebase())->storageRef;
        // $image = $storage->getChild

        if ($model->load(Yii::$app->request->post())) {
            $upload->imageFile = UploadedFile::getInstance($upload, 'imageFile');
            if($upload->upload()){
                $model->foto = $nameImage.'.'.$upload->imageFile->extension;
            }
            else{
                $model->foto = $this->defaultImage;
            }
            $model->save();
            $this->saveToFirebase($model);
            return $this->redirect(['view', 'id' => $model->id_hasil_pemeriksaan]);
        } else {
            return $this->render('create', [
                'model' => $model, 'upload' => $upload
            ]);
        }
    }

    /**
     * Updates an existing TabelHasilPemeriksaan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $directory = "../upload/hasil_pemeriksaan/";
        $nameImage = round(microtime(true) * 1000);
        $upload = new UploadImage($this->dropboxDirectory, $nameImage);

        if ($model->load(Yii::$app->request->post())) {
            $upload->imageFile = UploadedFile::getInstance($upload, 'imageFile');
            if($upload->upload()){
                (new DeleteImage($this->dropboxDirectory, $model->foto))->delete();
                $model->foto = $nameImage.'.'.$upload->imageFile->extension;
            }
            
            $model->save();
            $this->saveToFirebase($model);
            return $this->redirect(['view', 'id' => $model->id_hasil_pemeriksaan]);
        } else {
            return $this->render('update', [
                'model' => $model, 'upload' => $upload
            ]);
        }
    }

    /**
     * Deletes an existing TabelHasilPemeriksaan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $pasien = TabelPasien::findOne($model->id_pasien);
        $this->connection->getChild($pasien->id_firebase.'/'.$model->id_hasil_pemeriksaan)->remove();
        $model->delete();
        (new DeleteImage($this->dropboxDirectory, $model->foto))->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TabelHasilPemeriksaan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TabelHasilPemeriksaan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TabelHasilPemeriksaan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function saveToFirebase($model){
        $jenisPemeriksaan = TabelJenisPemeriksaan::findOne($model->id_jenis_pemeriksaan_pasien);
        $pasien = TabelPasien::findOne($model->id_pasien);
        $newPost = $this->connection->getChild($pasien->id_firebase.'/'.$model->id_hasil_pemeriksaan)
            ->set(["contentTitle" => $jenisPemeriksaan->jenis_pemeriksaan, "content" => $model->hasil_pemeriksaan, "date" => $model->tanggal_pemeriksaan, "image" => $model->foto]); 
    }
}
