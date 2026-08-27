<?php

namespace app\modules\admin\controllers;

use app\models\Application;
use app\models\Branch;
use app\models\Services;
use app\models\Status;
use app\modules\admin\models\AdminSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for Application model.
 */
class AdminController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Application models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        
        $model_apply = false;
        $model_deny = false;

        if ($dataProvider->models){
            $model_apply = Application::findOne($dataProvider->models[0]->id);

            $model_deny = Application::findOne($dataProvider->models[0]->id);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'branch' => Branch::getBranch(),
            'status' => Status::getStatus(),
            'model_deny' => $model_deny,
            'model_apply' => $model_apply,
        ]);
    }

    /**
     * Creates a new Application model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Application();
        $model->user_id = Yii::$app->user->id;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'branch' => Branch::getBranch(),
            'services' => Services::getServices(),
            'status' => Status::getStatus(),
        ]);
    }

    /**
     * Displays a single Application model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'status' => Status::getStatus(),
            'branch' => Branch::getBranch(),
            'services' => Services::getServices(),
        ]);
    }

    /**
     * Creates a new Application model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionApply($id)
    {
        if ($model = Application::findOne($id));

        if ($model->load($this->request->post())) {
            $model->user_id = Yii::$app->user->id;
            $model->status_id = Status::getStatusId('Принято');
            if ($model->save(false)){
                return $this->redirect(['index']);
            }
        }
        return $this->render('apply', [
            'model' => $model,
        ]);
    }
    public function actionDeny($id)
    {
        if ($model = Application::findOne($id));

        if ($model->load($this->request->post())) {
            $model->user_id = Yii::$app->user->id;
            $model->status_id = Status::getStatusId('Отклонено');
            if ($model->save(false)){
                return $this->redirect(['index']);
            }

        }
        return $this->render('deny', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Application model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'services' => Services::getServices(),
            'status' => Status::getStatus(),
            'branch' => Branch::getBranch()
        ]);
    }

    /**
     * Deletes an existing Application model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Application model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Application the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Application::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
