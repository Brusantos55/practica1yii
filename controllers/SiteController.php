<?php

namespace app\controllers;

use Yii;
//use yii\filters\AccessControl;
use yii\web\Controller;
//use yii\web\Response;
use yii\filters\VerbFilter;
//use app\models\LoginForm;
//use app\models\ContactForm;
use app\models\Entradas;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    /*public function behaviors()
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

    
     * {@inheritdoc}
     */
    public function actionListar(){
        $s=Entradas::find()->asArray()->all();
        
        return $this->render("listar",
                [
                    "datos"=>$s,
                ]);
    }
    public function actionListar1(){
        $salida=Entradas::find()->select(['texto'])->asArray()->all();
        return $this->render("listar",["datos"=>$salida,]);
    }
    public function actionListar2(){
        $salida=Entradas::find()->select(['texto'])->all();
        return $this->render("listar",["datos"=>$salida,]);
    }
    public function actionListar3(){
        $salida=new Entradas();
        
        return $this->render("listar",
                ["datos"=>$salida->find()->all(),]);
    }
    public function actionListar4(){
        $salida=new Entradas();
        
        return $this->render("listar",
                ["datos"=>$salida->findone(1),]);
    }
    public function actionListar5(){
        
        return $this->render("listar",
                ["datos"=>Yii::$app->db->createCommand("Select * from entradas")->queryAll(),]);
    }
    
    
    public function actionMostrar(){
        $dataProvider = new ActiveDataProvider([
            'query' => Entradas::find(),
        ]);
        return $this->render('mostrar',[
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionMostraruno(){
        
        return $this->render('mostrarUno',[
            'model' => Entradas::findOne(1),
        ]);
    }
    
    
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
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
