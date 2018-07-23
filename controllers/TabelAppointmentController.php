<?php

namespace app\controllers;

use Yii;
use app\models\TabelAppointment;
use app\models\TabelAppointmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\connection_firebase\ConnectionFirebase;


/**
 * TabelAppointmentController implements the CRUD actions for TabelAppointment model.
 */
class TabelAppointmentController extends Controller
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
                'rules' => [['actions' => ['index', 'create', 'update', 'delete', 'view', 'konfirmasi', 'tolak', 'hapus'],'allow' => true,'roles' => ['@'],
                            'matchCallback'=>function(){
                                return (
                                    Yii::$app->user->identity->id_role_pegawai=='2'
                                );
                            }],

                ]
            ],
        
        ];
    }
    public function beforeAction($event){
        $this->connection = (new ConnectionFirebase('appointment'))->reference;
        return parent::beforeAction($event);
    }

    /**
     * Lists all TabelAppointment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TabelAppointmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $appointmentList = $this->connection->getValue();
        foreach ($appointmentList as $key => $appointment) {
            # code...
            if(array_key_exists('approved', $appointment) && $appointment['approved'] == false){
                unset($appointmentList[$key]);
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'appointmentList' => $appointmentList
        ]);
    }

    /**
     * Displays a single TabelAppointment model.
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
     * Creates a new TabelAppointment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TabelAppointment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_appointment]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TabelAppointment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_appointment]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TabelAppointment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionKonfirmasi($idPasien){
        $this->connection->getChild($idPasien)->getChild('approved')->set(true);
        $appointmentApproved = $this->connection->getChild($idPasien)->getValue();
        $appointmentList = $this->connection->getValue();
        foreach ($appointmentList as $key => $appointment) {
            # code...
            if((!array_key_exists('approved', $appointment) && 
                $appointment['idDoctor'] == $appointmentApproved['idDoctor'] && 
                $appointment['date'] == $appointmentApproved['date'] ) && $key != $idPasien){
                $this->connection->getChild($key)->getChild("approved")->set(false);
            }
        }
        return $this->redirect(['index']);
    }

    public function actionTolak($idPasien){
        $this->connection->getChild($idPasien)->getChild("approved")->set(false);
        return $this->redirect(['index']);
    }

    public function actionHapus($idPasien){
        $this->connection->getChild($idPasien)->remove();
        return $this->redirect(['index']);
    }

    /**
     * Finds the TabelAppointment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TabelAppointment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TabelAppointment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
