<?php

use app\models\Status;
use yii\bootstrap5\LinkPager;
use yii\bootstrap5\Modal;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\AdminSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Админ панель — Dentistry Clinic';
?>

<div class="dc-container dc-container--wide section" style="padding-top:44px;">
    <div class="page-head" style="padding-top:0;">
        <h1 class="page-head__title">Админ панель</h1>
        <p class="page-head__text">Заявки на приём и управление филиалами</p>
    </div>

    <div class="toolbar-dc">
        <div><?= Html::a('Управление филиалами', ['/admin/branch'], ['class' => 'btn-dc-ghost']) ?></div>
    </div>

    <?php Pjax::begin([
        'id' => 'id-pjax-admin-index',
        'enablePushState' => false,
        'enableReplaceState' => false,
        'timeout' => 5000,
    ]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['class' => 'table-dc-wrap'],
        'tableOptions' => ['class' => 'table table-dc'],
        'layout' => "{items}\n{summary}\n{pager}",
        'summaryOptions' => ['class' => 'text-muted small mt-3'],
        'emptyText' => 'Заявок пока нет.',
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
                'value' => fn($model) => $branch[$model->branch_id] ?? '',
                'filter' => $branch,
            ],
            [
                'attribute' => 'status_id',
                'format' => 'raw',
                'value' => fn($model) => $this->render('//_status', ['title' => $status[$model->status_id] ?? '']),
                'filter' => $status,
            ],
            [
                'label' => 'Действия',
                'format' => 'raw',
                'filter' => false,
                'value' => fn($model) => '<div class="d-flex flex-wrap gap-2">' .
                    Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'btn-dc-outline btn-dc--sm']) .
                    ($model->status_id == Status::getStatusId('На рассмотрении')
                        ? Html::a('Принять', ['apply', 'id' => $model->id], ['class' => 'btn-dc-success btn-dc--sm btn-apply'])
                        : '') .
                    ($model->status_id == Status::getStatusId('На рассмотрении')
                        ? Html::a('Отклонить', ['deny', 'id' => $model->id], ['class' => 'btn-dc-danger btn-dc--sm btn-deny'])
                        : '') .
                    '</div>',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>

<?php if ($dataProvider->models): ?>
<?php
Modal::begin([
    'id' => 'id-modal-admin-apply',
    'title' => 'Принять заявку',
]);
?>
<?= $this->render('apply', ['model' => $model_apply]) ?>
<?php
Modal::end();
?>
<?php
Modal::begin([
    'id' => 'id-modal-admin-deny',
    'title' => 'Отклонить заявку',
]);
?>
<?= $this->render('deny', ['model' => $model_deny]) ?>
<?php
Modal::end();
?>
<?php endif ?>