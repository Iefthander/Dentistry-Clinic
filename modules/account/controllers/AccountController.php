<?php

namespace app\modules\account\controllers;

use app\models\Application;
use app\models\Branch;
use app\models\Services;
use app\models\Status;
use app\modules\account\models\AccountSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AccountController implements the CRUD actions for Application model.
 */
class AccountController extends Controller
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
        $searchModel = new AccountSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'branch' => Branch::getBranch(),
            'status' => Status::getStatus(),
            'services' => Services::getServices(),
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
        $branch = Branch::getBranch();
        $status = Status::getStatus();
        $services = Services::getServices();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'branch' => $branch,
            'status' => $status,
            'services' => $services
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

        if ($this->request->isPost) {
                if ($model->load($this->request->post())) {
                    $model->user_id = Yii::$app->user->id;
                    $model->status_id = Status::getStatusId('На рассмотрении');
                    if ($model->save(false)){
                        Yii::$app->session->setFlash('success','Запись на приём успешно произведена!');
                        return $this->redirect(['view', 'id' => $model->id]);
                    }

                }
            
        } else {
            $model->loadDefaultValues();
        }
        return $this->render('create', [
            'model' => $model,
            'branch' => Branch::getBranch(),
            'services' => Services::getServices(),
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
            Yii::$app->session->setFlash('success','Запись успешно изменена!');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'branch' => Branch::getBranch(),
            'status' => Status::getStatus(),
            'services' => Services::getServices(),
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
        Yii::$app->session->setFlash('success','Запись успешно удалена!');
        return $this->redirect(['index']);
    }
    
    //public function checkDate(){
    //    if ($this->id){
    //        $res = self::find()
    //            ->where(['date_str' => $this->date_str])
    //            ->andWhere(['!=' , 'id', $this->id])
    //            ->count();
    //        if ($res){
    //            $this->addError('date_str', 'Выберите другую дату и время');
    //        }
    //    }
    //}

    

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
