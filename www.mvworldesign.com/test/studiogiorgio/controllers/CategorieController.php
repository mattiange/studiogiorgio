<?php
namespace app\controllers;

use Yii;
use app\models\Categorie;
use app\models\CategorieSearch;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategorieController implements the CRUD actions for Categorie model.
 */
class CategorieController extends Controller
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
        ];
    }
    
    /**
     * 
     * @param type $id
     * @param type $module
     * @param type $config
     * @return type
     */
    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
        
        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }else{
            $this->layout = 'admin';
        }
    }

    /**
     * Lists all Categorie models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
            return $this->goHome();
        }
        
        $this->layout = 'admin';
        
        $searchModel = new CategorieSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categorie model.
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
     * Creates a new Categorie model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * 
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categorie();
        
        $upload_form = new UploadForm();
        
        /**
         * Carico il file e i dati inviati tramite form
         */
        if($model->load(Yii::$app->request->post())){            
            $upload_form->immagine = UploadedFile::getInstance($model, 'immagine');
            
            if(!empty($upload_form->immagine->name)){
                $upload_form->immagine->name = $upload_form->generateFilename().".".$upload_form->immagine->extension;
            }else{
                $upload_form->immagine = "";
            }
            $model->immagine = $upload_form->immagine->name;
            $model->immagine_categoria = ($model->immagine_categoria=='')?'':$model->immagine_categoria;
            $model->descrizione = ($model->descrizione=='')?'':$model->descrizione;
            $model->intro_text = ($model->intro_text=='')?'':$model->intro_text;
            
            if($upload_form->upload() || $model->immagine == ""){
                $model->save();
                
                return $this->redirect(['view', 'id' => $model->idCategoria]);
            }
        }else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Updates an existing Categorie model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * 
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $upload_form = new UploadForm();
        
        $immagine           = $model->immagine;
        $immagine_categoria = $model->immagine_categoria;
        
        if($model->load(Yii::$app->request->post())){
            //Controlla se bisogna cancellare l'immagine dal database
            if(Yii::$app->request->post()['delete-immagine'] != 'delete'){
                $model->immagine = $immagine;
            }else{
                $model->immagine = '';
            }
            if(Yii::$app->request->post()['delete-immagine_title'] != 'delete'){
                $model->immagine_categoria = $immagine_categoria;
            }else{
                $model->immagine_categoria = '';
            }
            
            
            /*----------------------------------------
             * Caricamento dell'immagine di categoria
            ----------------------------------------*/
            if(!empty(UploadedFile::getInstance($model, 'immagine'))){
                $upload_form->immagine = UploadedFile::getInstance($model, 'immagine');
                $model->immagine = $upload_form->generateFilename();
                $upload_form->immagine->name = $model->immagine.".".$upload_form->immagine->extension;
                $model->immagine = $upload_form->immagine->name;
                $upload_form->upload();
            }
            
            /*--------------------------------------------------------
             * Caricamento dell'immagine di sfondo della categoria
            --------------------------------------------------------*/
            if(!empty(UploadedFile::getInstance($model, 'immagine_categoria'))){
                $upload_form->immagine = UploadedFile::getInstance($model, 'immagine_categoria');
                
                $model->immagine_categoria = $upload_form->generateFilename();
                $upload_form->immagine->name = $model->immagine_categoria.".".$upload_form->immagine->extension;
                
                $model->immagine_categoria = $upload_form->immagine->name;
                
                $upload_form->upload();
            }
            
            $model->save();
            
            return $this->redirect(['view', 'id' => $model->idCategoria]);
        }else{
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Categorie model.
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
     * Finds the Categorie model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categorie the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categorie::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
