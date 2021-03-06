<?php

namespace app\controllers;

use Yii;
use app\models\Instituicao;
use app\models\Uf;
use app\models\InstituicaoSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InstituicaoController implements the CRUD actions for Instituicao model.
 */
class InstituicaoController extends Controller
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
     * Lists all Instituicao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InstituicaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $uf = new Uf();
        return $this->render('index', [
        		'searchModel' => $searchModel,
        		'dataProvider' => $dataProvider,
        		'listUfs' => $uf->getAllUfAsArray(),
        		]);
    }

    /**
     * Displays a single Instituicao model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Instituicao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Instituicao();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $uf = new Uf();
        return $this->render('create', [
        		'model' => $model,
        		'listUfs' => $uf->getAllUfAsArray(),
        		]);
    }

    /**
     * Updates an existing Instituicao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }


        $uf = new Uf();
        return $this->render('create', [
        		'model' => $model,
        		'listUfs' => $uf->getAllUfAsArray(),
        		]);
    }

    /**
     * Deletes an existing Instituicao model.
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
     * Finds the Instituicao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Instituicao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Instituicao::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
