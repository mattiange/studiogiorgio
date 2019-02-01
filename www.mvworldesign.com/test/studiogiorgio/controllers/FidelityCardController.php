<?php

namespace app\controllers;

use Yii;
use app\models\FidelityCard;
use app\models\FidelityCardSearch;
use app\models\UploadForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

/**
 * FidelityCardController implements the CRUD actions for FidelityCard model.
 */
class FidelityCardController extends Controller
{
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
     * Updates an existing FidelityCard model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $upload_form = new UploadForm();
        
        //Non usati, elimare
        $cardFronte = $model->card_fronte;
        $cardRetro = $model->card_retro;
        //------
        
        if($model->load(Yii::$app->request->post())){
            if(!empty(UploadedFile::getInstance($model, 'card_fronte'))){
                $upload_form->immagine = UploadedFile::getInstance($model, 'card_fronte');
                $model->card_fronte = $upload_form->immagine->name;
                $upload_form->upload();
            }
            if(!empty(UploadedFile::getInstance($model, 'card_retro'))){
                $upload_form->immagine = UploadedFile::getInstance($model, 'card_retro');
                $model->card_retro = $upload_form->immagine->name;
                $upload_form->upload();
            }
            
            $model->save();
            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing FidelityCard model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FidelityCard model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FidelityCard the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FidelityCard::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
