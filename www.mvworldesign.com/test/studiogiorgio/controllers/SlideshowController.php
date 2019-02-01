<?php

namespace app\controllers;

use Yii;
use app\models\Slideshow;
use app\models\SlideshowSearch;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SlideshowController implements the CRUD actions for Slideshow model.
 */
class SlideshowController extends Controller
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
     * Lists all Slideshow models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $this->layout = 'admin';
        
        $searchModel = new SlideshowSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slideshow model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $this->layout = 'admin';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Slideshow model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $this->layout = 'admin';
        $model = new Slideshow();
        
        $upload_form = new UploadForm();

        if ($model->load(Yii::$app->request->post())) {
            if(!empty(UploadedFile::getInstance($model, 'immagine'))){
                $upload_form->immagine = UploadedFile::getInstance($model, 'immagine');
                
                $model->immagine = $upload_form->generateFilename();
                $upload_form->immagine->name = $model->immagine.".".$upload_form->immagine->extension;
                
                $model->immagine = $upload_form->immagine->name;
                
                $model->save();
                $upload_form->upload('slideshow/');
            }
            
            return $this->redirect(['view', 'id' => $model->idSlideshow]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Gestione dello slideshow
     * 
     * @return type
     */
    public function actionSlideshow(){
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $this->layout = 'admin';
        $model = new Slideshow();
        $upload_form = new UploadForm();
        
        if ($model->load(Yii::$app->request->post())) {            
            $idSlideshow = Yii::$app->request->post()['Slideshow']['idSlideshow'];
            $posizione = Yii::$app->request->post()['Slideshow']['posizione'];
            
            foreach ($model->immagine as $k => $v){//Record da aggiornare
                if($k < (count($model->immagine)-1) && $idSlideshow[$k] != 0){
                    $old_model = $this->findModel($idSlideshow[$k]);
                    if(!empty(UploadedFile::getInstance($model, 'immagine['.$k.']'))){
                        echo "--->OK<br>";
                        //Dati dell'immagine caricata
                        $upload_form->immagine = UploadedFile::getInstance($model, 'immagine['.$k.']');

                        //Assegno un nome univoco all'immaigne caricata
                        $old_model->immagine = $upload_form->generateFilename();
                        $upload_form->immagine->name = $old_model->immagine.".".$upload_form->immagine->extension;
                        $old_model->immagine = $upload_form->immagine->name;
                        
                        $upload_form->upload('slideshow/');
                    }
                    
                    $old_model->posizione = $posizione[$k];
                    
                    if(empty($model->immagine[$k])){
                        $old_model->immagine[$k] = $old_model->immagine;
                    }
                    
                    /*echo "<pre>";
                    print_r($old_model);
                    echo "</pre>";*/
                    
                    $old_model->save();
                    
                }elseif($k < (count($model->immagine)-1)){//Nuovo record
                    $model->posizione = $posizione[$k];
                    
                    if(!empty(UploadedFile::getInstance($model, 'immagine['.$k.']'))){
                        //Dati dell'immagine caricata
                        $upload_form->immagine = UploadedFile::getInstance($model, 'immagine['.$k.']');

                        //Assegno un nome univoco all'immaigne caricata
                        $model->immagine = $upload_form->generateFilename();
                        $upload_form->immagine->name = $model->immagine.".".$upload_form->immagine->extension;
                        $model->immagine = $upload_form->immagine->name;
                        
                        $upload_form->upload('slideshow/');
                    }
                    
                    $model->save();
                }
                
                
            }
            
            
            return $this->redirect(
                            ['slideshow', 'models' => $model]
                        );
        }else{
            return $this->render('slideshow', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Slideshow model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $this->layout = 'admin';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idSlideshow]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Slideshow model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $this->layout = 'admin';
        $this->findModel($id)->delete();

        //return $this->redirect(['index']);
        return $this->redirect(['slideshow']);
    }

    /**
     * Finds the Slideshow model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slideshow the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slideshow::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
