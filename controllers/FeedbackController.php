<?php

namespace app\controllers;

use app\models\Branch;
use app\models\Doctor;
use app\models\Feedback;
use GuzzleHttp\Psr7\UploadedFile;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile as WebUploadedFile;

class FeedbackController extends \yii\web\Controller
{
    public function actionIndex()
{
    
    $model = new \app\models\Feedback();
    

    if ($model->load(Yii::$app->request->post())) {
        $model->imageFile = WebUploadedFile::getInstance($model, 'imageFile');
        if ($model->upload()) {
            if ($model->save(false)){
                Yii::$app->session->setFlash('success','Спасибо, отзыв успешно оставлен!');
                return $this->redirect('/feedback/view');
            }
        }
    }
    

    return $this->render('index', [
        'model' => $model,
        
    ]);
    
}

public function actionView()
{
    $model = new \app\models\Feedback();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            // form inputs are valid, do something here
            return;
        }
    }
   $rows = Feedback::find()->all();
    return $this->render('view', [
        'model' => $model,
        'rows'=>$rows,
        
        'branch' => Branch::getBranch()
    ]);
}
//public function actionFeedback(){
//    $rows = Feedback::find()->all();
//    return $this->render('feedback', ['rows'=>$rows]);
//}

}
