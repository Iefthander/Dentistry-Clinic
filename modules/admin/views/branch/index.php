<?php

use yii\bootstrap5\LinkPager;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\BranchSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Управление филиалами — Dentistry Clinic';
?>

<div class="dc-container dc-container--narrow section" style="padding-top:44px;">
    <div class="page-head" style="padding-top:0;">
        <h1 class="page-head__title">Управление филиалами</h1>
    </div>

    <div class="toolbar-dc">
        <div><?= Html::a('Назад', ['/admin'], ['class' => 'btn-dc-ghost']) ?></div>
        <div><?= Html::a('Добавить филиал', ['create'], ['class' => 'btn-dc']) ?></div>
    </div>

    <?php Pjax::begin([
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
        'emptyText' => 'Филиалов пока нет.',
        'pager' => [
            'class' => LinkPager::class,
            'options' => ['class' => 'pagination justify-content-center mt-4'],
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
                'filter' => false,
            ],
            [
                'attribute' => 'title',
                'filter' => false,
            ],
            [
                'label' => 'Действия',
                'format' => 'raw',
                'filter' => false,
                'value' => fn($model) => '<div class="d-flex flex-wrap gap-2">' .
                    Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'btn-dc-outline btn-dc--sm']) .
                    Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn-dc-ghost btn-dc--sm']) .
                    Html::a('Удалить', ['delete', 'id' => $model->id], ['class' => 'btn-dc-danger btn-dc--sm', 'data' => [
                        'confirm' => 'Удалить филиал?',
                        'method' => 'post',
                    ]]) .
                    '</div>',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>