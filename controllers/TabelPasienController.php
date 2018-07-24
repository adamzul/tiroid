<?php

namespace app\controllers;

use Yii;
use app\models\TabelPasien;
use app\models\TabelPasienSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\connection_firebase\ConnectionFirebase;

/**
 * TabelPasienController implements the CRUD actions for TabelPasien model.
 */
class TabelPasienController extends Controller
{
    public $auth;
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
                'rules' => [['actions' => ['index', 'create', 'update', 'delete', 'view',],'allow' => true,'roles' => ['@'],
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
        $this->auth = (new ConnectionFirebase())->auth;
        return parent::beforeAction($event);
    }

    /**
     * Lists all TabelPasien models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TabelPasienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TabelPasien model.
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
     * Creates a new TabelPasien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TabelPasien();

        if ($model->load(Yii::$app->request->post())) {
            $userProperties = [
                'email' => $model->email_pasien,
                'emailVerified' => false,
                'password' => $model->password_pasien,
                'disabled' => false,
            ];
            $createdUser = $this->auth->createUser($userProperties);
            $model->password_pasien = md5($model->password_pasien);
            // $newPost = $this->connection->getChild($model->id_artikel)
                // ->set(["contentTitle" => $model->judul_artikel, "content" => $model->konten_artikel]);
            $model->id_firebase = $createdUser->uid;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_pasien]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TabelPasien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $passwordHash = $model->password_pasien;
        if ($model->load(Yii::$app->request->post())) {
            $userProperties = [
                'email' => $model->email_pasien,
            ];
            if($passwordHash != $model->password_pasien){
                $userProperties['password'] = $model->password_pasien;
                $model->password_pasien = md5($model->password_pasien);
            }
            $upadateUser = $this->auth->updateUser($model->id_firebase, $userProperties);
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_pasien]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TabelPasien model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $this->auth->deleteUser($model->id_firebase);
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the TabelPasien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TabelPasien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TabelPasien::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
