<?php

namespace app\modules\account;

use Yii;

/**
 * account module definition class
 */
class Module extends \yii\base\Module
{
    public function behaviors()
{
    return [
        'access' => [
            'class' => \yii\filters\AccessControl::class,
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['@'],
                    'matchCallback' => fn() => !Yii::$app->user->identity->isAdmin
                ],
            ],
            'denyCallback' => fn() => Yii::$app->response->redirect('/site/register') && Yii::$app->session->setFlash('danger','Для записи на приём необходимо быть авторизованным пользователем!')
                
        ],
    ];
}
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\account\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
