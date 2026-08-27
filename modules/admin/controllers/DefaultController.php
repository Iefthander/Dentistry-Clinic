<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return \yii\web\Response
     */
    public function actionIndex()
    {
        return $this->redirect(['/admin/admin/index']);
    }
}
