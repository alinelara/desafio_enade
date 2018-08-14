<?php

namespace app\controllers;

use Yii;
use app\models\Alunoavalia;
use app\models\AlunoavaliaSearch;
use app\models\Instituicao;
use app\models\Curso;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AlunoavaliaController implements the CRUD actions for Alunoavalia model.
 */
class AlunoavaliaController extends Controller
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
     * Lists all Alunoavalia models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlunoavaliaSearch();
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
     * Displays a single Alunoavalia model.
     * @param string $ano
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ano, $id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ano, $id),
        ]);
    }

    /**
     * Creates a new Alunoavalia model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Alunoavalia();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ano' => $model->ano, 'id' => $model->id]);
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
     * Updates an existing Alunoavalia model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $ano
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ano, $id)
    {
        $model = $this->findModel($ano, $id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ano' => $model->ano, 'id' => $model->id]);
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
     * Deletes an existing Alunoavalia model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $ano
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ano, $id)
    {
        $this->findModel($ano, $id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Alunoavalia model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ano
     * @param integer $id
     * @return Alunoavalia the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ano, $id)
    {
        if (($model = Alunoavalia::findOne(['ano' => $ano, 'id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
