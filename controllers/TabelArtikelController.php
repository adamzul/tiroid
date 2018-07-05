<?php

namespace app\controllers;

use Yii;
use app\Models\TabelArtikel;
use app\models\TabelArtikelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use app\connection_firebase\ConnectionFirebase;
use app\decision_tree\DecisionTree;
/**
 * TabelArtikelController implements the CRUD actions for TabelArtikel model.
 */
class TabelArtikelController extends Controller
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
        $this->connection = (new ConnectionFirebase('article'))->reference;
        return parent::beforeAction($event);
    }

    /**
     * Lists all TabelArtikel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TabelArtikelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TabelArtikel model.
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
     * Creates a new TabelArtikel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TabelArtikel();
        $model->id_pegawai = Yii::$app->user->identity->id_pegawai;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                
                $newPost = $this->connection->getChild($model->id_artikel)
                ->set(["contentTitle" => $model->judul_artikel, "content" => $model->konten_artikel]);
                $transaction->commit();  
            }
            catch(Exception $e){
                $transaction->rollback();
                return $this->render('create', [
                'model' => $model,
            ]);
        
            }
            
            return $this->redirect(['view', 'id' => $model->id_artikel]);

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TabelArtikel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $post = $this->connection->getChild($id)->getValue();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            try {
                
                $newPost = $this->connection->getChild($model->id_artikel)
                ->set(["contentTitle" => $model->judul_artikel, "content" => $model->konten_artikel]);  
            }
            catch(Exception $e){
                $transaction->rollback();
                return $this->render('create', [
                'model' => $model,
            ]);
        
            }
            return $this->redirect(['view', 'id' => $model->id_artikel]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TabelArtikel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $this->connection->getChild($id)->remove();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TabelArtikel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TabelArtikel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TabelArtikel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
