<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = 'Информация о заявке — Dentistry Clinic';
?>

<div class="dc-container dc-container--narrow section" style="padding-top:44px;">
    <div class="page-head" style="padding-top:0;">
        <h1 class="page-head__title">Информация о заявке</h1>
    </div>

    <div class="toolbar-dc">
        <div><?= Html::a('Назад', ['index'], ['class' => 'btn-dc-ghost']) ?></div>
        <div class="d-flex gap-2">
            <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn-dc-outline']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], ['class' => 'btn-dc-danger btn-delete']) ?>
        </div>
    </div>

    <?php Pjax::begin([
        'id' => 'id-pjax-account-view',
        'enablePushState' => false,
        'enableReplaceState' => false,
        'timeout' => 5000,
    ]); ?>

    <div class="detail-dc mt-4">
        <?= DetailView::widget([
            'model' => $model,
            'options' => ['class' => 'table'],
            'attributes' => [
                'id',
                [
                    'attribute' => 'problem',
                ],
                [
                    'attribute' => 'message',
                    'visible' => (bool)$model->message,
                ],
                [
                    'attribute' => 'status_id',
                    'format' => 'raw',
                    'value' => $this->render('//_status', ['title' => $status[$model->status_id] ?? '']),
                ],
                [
                    'attribute' => 'branch_id',
                    'value' => $branch[$model->branch_id] ?? '',
                ],
                [
                    'attribute' => 'services_id',
                    'value' => $services[$model->services_id] ?? '',
                ],
                'date_str',
                'created_at',
                'user_id',
            ],
        ]) ?>
    </div>

    <?php Pjax::end(); ?>
</div>

<?php
Modal::begin([
    'id' => 'id-modal-account',
    'title' => 'Действительно хотите удалить заявку?',
]);
?>
<?php $form = ActiveForm::begin([
    'id' => 'id-active-form-account-index',
]); ?>
    <div class="d-flex gap-2">
        <?= Html::submitButton('Удалить', ['class' => 'btn-dc-danger col']) ?>
        <?= Html::a('Отмена', ['index'], ['class' => 'btn-dc-ghost col btn-close-account']) ?>
    </div>
<?php ActiveForm::end(); ?>
<?php
Modal::end();
?>