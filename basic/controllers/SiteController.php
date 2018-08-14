<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use app\models\Instituicao;
use app\models\Instituicaoavalia;
use app\models\InstituicaoavaliaSearch;
use app\models\Cursoavalia;
use app\models\CursoavaliaSearch;
use app\models\Curso;
use app\models\Alunoavalia;



class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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
    	$searchModelInstituicao = new InstituicaoavaliaSearch();
    	$dataProviderInstituicao = $searchModelInstituicao->search(Yii::$app->request->queryParams);
    	$instituicao = new Instituicao();
    	
    	$searchModelCurso = new CursoavaliaSearch();
    	$dataProviderCurso = $searchModelCurso->search(Yii::$app->request->queryParams);
    	$curso = new Curso();
    	 
    	return $this->render('index', [
    			'searchModelInstituicao' => $searchModelInstituicao,
    			'dataProviderInstituicao' => $dataProviderInstituicao,
    			'listInstituicoes' => $instituicao->getAllInstituicaoAsArray(),
    			'searchModelCurso' => $searchModelCurso,
    			'dataProviderCurso' => $dataProviderCurso,
    			'listCursos' => $curso->getAllCursoAsArray(),
				]);
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
