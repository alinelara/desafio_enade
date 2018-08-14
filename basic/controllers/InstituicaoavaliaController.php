<?php

namespace app\controllers;

use Yii;
use app\models\Instituicaoavalia;
use app\models\InstituicaoavaliaSearch;
use app\models\Instituicao;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InstituicaoavaliaController implements the CRUD actions for Instituicaoavalia model.
 */
class InstituicaoavaliaController extends Controller
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
     * Lists all Instituicaoavalia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InstituicaoavaliaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $instituicao = new Instituicao();
        return $this->render('index', [
        		'searchModel' => $searchModel,
        		'dataProvider' => $dataProvider,
        		'listInstituicoes' => $instituicao->getAllInstituicaoAsArray(),
   		]);
    }

    /**
     * Displays a single Instituicaoavalia model.
     * @param string $ano
     * @param integer $instituicao_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ano, $instituicao_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ano, $instituicao_id),
        ]);
    }

    /**
     * Creates a new Instituicaoavalia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Instituicaoavalia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ano' => $model->ano, 'instituicao_id' => $model->instituicao_id]);
        }

        $instituicao = new Instituicao();
        return $this->render('create', [
            'model' => $model,
        	'listInstituicoes' => $instituicao->getAllInstituicaoAsArray(),
        ]);
    }

    /**
     * Updates an existing Instituicaoavalia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $ano
     * @param integer $instituicao_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ano, $instituicao_id)
    {
        $model = $this->findModel($ano, $instituicao_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ano' => $model->ano, 'instituicao_id' => $model->instituicao_id]);
        }

        $instituicao = new Instituicao();
        return $this->render('update', [
            'model' => $model,
        	'listInstituicoes' => $instituicao->getAllInstituicaoAsArray(),
        ]);
    }

    /**
     * Deletes an existing Instituicaoavalia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $ano
     * @param integer $instituicao_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ano, $instituicao_id)
    {
        $this->findModel($ano, $instituicao_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Instituicaoavalia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ano
     * @param integer $instituicao_id
     * @return Instituicaoavalia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ano, $instituicao_id)
    {
        if (($model = Instituicaoavalia::findOne(['ano' => $ano, 'instituicao_id' => $instituicao_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
