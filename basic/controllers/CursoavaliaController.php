<?php

namespace app\controllers;

use Yii;
use app\models\Cursoavalia;
use app\models\CursoavaliaSearch;
use app\models\Instituicao;
use app\models\Curso;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CursoavaliaController implements the CRUD actions for Cursoavalia model.
 */
class CursoavaliaController extends Controller
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
     * Lists all Cursoavalia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CursoavaliaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		$instituicao = new Instituicao();
		$curso = new Curso();
		return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        	'listInstituicoes' => $instituicao->getAllInstituicaoAsArray(),
			'listCursos' => $curso->getAllCursoAsArray(),
        ]);
    }

    /**
     * Displays a single Cursoavalia model.
     * @param string $ano
     * @param integer $instituicao_id
     * @param integer $curso_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ano, $instituicao_id, $curso_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ano, $instituicao_id, $curso_id),
        ]);
    }

    /**
     * Creates a new Cursoavalia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cursoavalia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ano' => $model->ano, 'instituicao_id' => $model->instituicao_id, 'curso_id' => $model->curso_id]);
        }

        $instituicao = new Instituicao();
		$curso = new Curso();
        return $this->render('create', [
        		'model' => $model,
        		'listInstituicoes' => $instituicao->getAllInstituicaoAsArray(),
				'listCursos' => $curso->getAllCursoAsArray(),
		]);
    }

    /**
     * Updates an existing Cursoavalia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $ano
     * @param integer $instituicao_id
     * @param integer $curso_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ano, $instituicao_id, $curso_id)
    {
        $model = $this->findModel($ano, $instituicao_id, $curso_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ano' => $model->ano, 'instituicao_id' => $model->instituicao_id, 'curso_id' => $model->curso_id]);
        }

        $instituicao = new Instituicao();
		$curso = new Curso();
        return $this->render('update', [
        		'model' => $model,
        		'listInstituicoes' => $instituicao->getAllInstituicaoAsArray(),
				'listCursos' => $curso->getAllCursoAsArray(),
		]);
    }

    /**
     * Deletes an existing Cursoavalia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $ano
     * @param integer $instituicao_id
     * @param integer $curso_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ano, $instituicao_id, $curso_id)
    {
        $this->findModel($ano, $instituicao_id, $curso_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cursoavalia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ano
     * @param integer $instituicao_id
     * @param integer $curso_id
     * @return Cursoavalia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ano, $instituicao_id, $curso_id)
    {
        if (($model = Cursoavalia::findOne(['ano' => $ano, 'instituicao_id' => $instituicao_id, 'curso_id' => $curso_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
