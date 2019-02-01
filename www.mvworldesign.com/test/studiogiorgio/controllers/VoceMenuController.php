<?php

namespace app\controllers;

use Yii;
use app\models\VoceMenu;
use app\models\VoceMenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VoceMenuController implements the CRUD actions for VoceMenu model.
 */
class VoceMenuController extends Controller
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
     * Lists all VoceMenu models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VoceMenuSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single VoceMenu model.
     * @param integer $idVoceMeu
     * @param integer $menu_id
     * @return mixed
     */
    public function actionView($idVoceMeu, $menu_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($idVoceMeu, $menu_id),
        ]);
    }

    /**
     * Creates a new VoceMenu model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new VoceMenu();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idVoceMeu' => $model->idVoceMeu, 'menu_id' => $model->menu_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing VoceMenu model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idVoceMeu
     * @param integer $menu_id
     * @return mixed
     */
    public function actionUpdate($idVoceMeu, $menu_id)
    {
        $model = $this->findModel($idVoceMeu, $menu_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idVoceMeu' => $model->idVoceMeu, 'menu_id' => $model->menu_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing VoceMenu model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idVoceMeu
     * @param integer $menu_id
     * @return mixed
     */
    public function actionDelete($idVoceMeu, $menu_id)
    {
        $this->findModel($idVoceMeu, $menu_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the VoceMenu model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idVoceMeu
     * @param integer $menu_id
     * @return VoceMenu the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idVoceMeu, $menu_id)
    {
        if (($model = VoceMenu::findOne(['idVoceMeu' => $idVoceMeu, 'menu_id' => $menu_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
