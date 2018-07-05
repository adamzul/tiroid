<?php

namespace app\controllers;

use Yii;
use app\Models\TabelPegawai;
use app\models\TabelPegawaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use app\connection_firebase\ConnectionFirebase;


/**
 * TabelPegawaiController implements the CRUD actions for TabelPegawai model.
 */
class TabelPegawaiController extends Controller
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
        $this->connection = (new ConnectionFirebase('doctor'))->reference;
        return parent::beforeAction($event);
    }

    /**
     * Lists all TabelPegawai models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TabelPegawaiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TabelPegawai model.
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
     * Creates a new TabelPegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TabelPegawai();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->password_pegawai = md5($model->password_pegawai);
            $model->save();
            if($model->id_role_pegawai == 1){
                $this->connection->getChild($model->id_pegawai)->set(['name' => $model->nama_pegawai]);
            }
            

            return $this->redirect(['view', 'id' => $model->id_pegawai]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TabelPegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->id_role_pegawai == 1){
                $this->connection->getChild($model->id_pegawai)->set(['name' => $model->nama_pegawai]);
            }
            return $this->redirect(['view', 'id' => $model->id_pegawai]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TabelPegawai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TabelPegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TabelPegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TabelPegawai::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
