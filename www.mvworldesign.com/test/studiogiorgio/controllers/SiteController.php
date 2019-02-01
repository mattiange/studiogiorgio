<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Categorie;
use app\models\FidelityCard;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = '@app/views/layouts/login.php';
        
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['admin/index']);
        }
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {            
            $this->layout = 'admin';
            
            return $this->redirect(['admin/index']);
            //return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    
    /**
     * Elenco di tutte le categorie del sito
     * 
     * @return type
     */
    public function actionCategorie(){
        $categorie = new \app\models\Categorie();
        
        return $this->render('categorie', [
            'model' => $categorie
        ]);
    }
    
    /**
     * 
     * @return type
    */
    public function actionCategory($id){
        $categoria = Categorie::findOne(['idCategoria' => $id]);
        
        return $this->render('category', [
            'model' => $categoria
        ]);
    }
    
    /**
     * Descrizione fidelity card
     * 
     * @return type
     */
    public function actionFidelity_card(){
        $model = FidelityCard::findOne(['id' => 1]);
                
        return $this->render('fidelity_card',[
            'model' => $model,
        ]);
    }


    /**
     * Logout
     * 
     * @return type
     */
    public function actionL(){

        Yii::$app->user->logout();

        return $this->goHome();
    }
}