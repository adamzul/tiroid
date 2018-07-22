<?php

namespace app\controllers;

use Yii;
use app\models\TabelArtikel;
use app\models\TabelArtikelSearch;
use app\models\UploadImage;
use app\models\DownloadImage;
use app\models\DeleteImage;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\DropboxApp;

use yii\web\UploadedFile;
use app\connection_firebase\ConnectionFirebase;
use app\decision_tree\DecisionTree;
/**
 * TabelArtikelController implements the CRUD actions for TabelArtikel model.
 */
class TabelArtikelController extends Controller
{

    public $connection;
    public $defaultImage = 'default_article.png';
    public $dropboxDirectory = 'article';

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
        $nameImage = round(microtime(true) * 1000);
        $upload = new UploadImage($this->dropboxDirectory, $nameImage);
        
        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $upload->imageFile = UploadedFile::getInstance($upload, 'imageFile');
                if($upload->upload()){
                    // return 0;
                    $model->foto = $nameImage.'.'.$upload->imageFile->extension;
                }
                else{
                    $model->foto = $this->defaultImage;
                }
                $model->save();
                $newPost = $this->connection->getChild($model->id_artikel)
                ->set(["contentTitle" => $model->judul_artikel, "content" => $model->konten_artikel, "image" => $model->foto]);
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
                'model' => $model, 'upload' => $upload
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
        $nameImage = round(microtime(true) * 1000);
        $upload = new UploadImage($this->dropboxDirectory, $nameImage);

        if ($model->load(Yii::$app->request->post())) {
            try {
                $upload->imageFile = UploadedFile::getInstance($upload, 'imageFile');
                if($upload->upload()){
                    if($model->foto != $defaultImage){
                        (new DeleteImage($this->dropboxDirectory, $model->foto))->delete();
                    }
                    $model->foto = $nameImage.'.'.$upload->imageFile->extension;
                }
                $model->save();
                $newPost = $this->connection->getChild($model->id_artikel)
                ->set(["contentTitle" => $model->judul_artikel, "content" => $model->konten_artikel, "image" => $model->foto]);  
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
                'model' => $model, 'upload' => $upload
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
        $model = $this->findModel($id);
        if($model->foto != $defaultImage){
            (new DeleteImage($this->dropboxDirectory, $model->foto))->delete();
        }
        $this->connection->getChild($id)->remove();
        $model->delete();
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
