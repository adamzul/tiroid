<?php

namespace app\controllers;

use Yii;
use app\models\TabelCatatanMedisPasien;
use app\models\TabelCatatanMedisPasienSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * TabelCatatanMedisPasienController implements the CRUD actions for TabelCatatanMedisPasien model.
 */
class TabelCatatanMedisPasienController extends Controller
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

    /**
     * Lists all TabelCatatanMedisPasien models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TabelCatatanMedisPasienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TabelCatatanMedisPasien model.
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
     * Creates a new TabelCatatanMedisPasien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TabelCatatanMedisPasien();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_pegawai = Yii::$app->user->identity->id_pegawai;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_catatan_medis_pasien]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TabelCatatanMedisPasien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_catatan_medis_pasien]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TabelCatatanMedisPasien model.
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
     * Finds the TabelCatatanMedisPasien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TabelCatatanMedisPasien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TabelCatatanMedisPasien::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
