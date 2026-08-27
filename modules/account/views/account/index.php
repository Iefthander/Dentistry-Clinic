<?php

use app\models\Status;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\LinkPager;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\account\models\AccountSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Личный кабинет — Dentistry Clinic';
?>

<div class="dc-container dc-container--wide section" style="padding-top:44px;">
    <div class="page-head" style="padding-top:0;">
        <h1 class="page-head__title">Личный кабинет</h1>
        <p class="page-head__text">Ваши записи на приём и их статусы</p>
    </div>

    <div class="toolbar-dc">
        <div><?= Html::a('Мои записи', ['index'], ['class' => 'btn-dc-ghost']) ?></div>
        <div><?= Html::a('Записаться на приём', ['create'], ['class' => 'btn-dc']) ?></div>
    </div>

    <?php Pjax::begin([
        'id' => 'id-pjax-account-index',
        'enablePushState' => false,
        'enableReplaceState' => false,
        'timeout' => 5000,
    ]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'table-dc-wrap'],
        'tableOptions' => ['class' => 'table table-dc'],
        'layout' => "{items}\n{summary}\n{pager}",
        'summaryOptions' => ['class' => 'text-muted small mt-3'],
        'emptyTextOptions' => ['class' => 'text-center py-4'],
        'emptyText' => 'У вас пока нет записей — запишитесь на приём!',
        'pager' => [
            'class' => LinkPager::class,
            'options' => ['class' => 'pagination justify-content-center mt-4'],
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'created_at',
                'filter' => false,
            ],
            [
                'attribute' => 'date_str',
                'filter' => false,
            ],
            [
                'attribute' => 'branch_id',
                'filter' => false,
                'value' => fn($model) => $branch[$model->branch_id],
            ],
            [
                'attribute' => 'status_id',
                'filter' => false,
                'format' => 'raw',
                'value' => fn($model) => $this->render('//_status', ['title' => $status[$model->status_id]]),
            ],
            [
                'attribute' => 'services_id',
                'filter' => false,
                'value' => fn($model) => $services[$model->services_id],
            ],
            [
                'label' => 'Действия',
                'format' => 'raw',
                'filter' => false,
                'value' => fn($model) => '<div class="d-flex flex-wrap gap-2">' .
                    Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'btn-dc-outline btn-dc--sm']) .
                    ($model->status_id == Status::getStatusId('На рассмотрении')
                        ? Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn-dc-ghost btn-dc--sm'])
                        : '') .
                    ($model->status_id == Status::getStatusId('На рассмотрении')
                        ? Html::a('Удалить', ['delete', 'id' => $model->id], ['class' => 'btn-dc-danger btn-dc--sm btn-delete'])
                        : '') .
                    '</div>',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>

<?php
Modal::begin([
    'id' => 'id-modal-account',
    'title' => 'Действительно хотите удалить запись?',
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
