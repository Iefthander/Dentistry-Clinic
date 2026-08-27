<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Branch $model */

$this->title = 'Информация о филиале — Dentistry Clinic';
?>

<div class="dc-container dc-container--narrow section" style="padding-top:44px;">
    <div class="page-head" style="padding-top:0;">
        <h1 class="page-head__title">Информация о филиале</h1>
    </div>

    <div class="toolbar-dc">
        <div><?= Html::a('Назад', ['index'], ['class' => 'btn-dc-ghost']) ?></div>
        <div class="d-flex gap-2">
            <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn-dc-outline']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], ['class' => 'btn-dc-danger', 'data' => [
                'confirm' => 'Удалить филиал?',
                'method' => 'post',
            ]]) ?>
        </div>
    </div>

    <div class="detail-dc mt-4">
        <?= DetailView::widget([
            'model' => $model,
            'options' => ['class' => 'table'],
            'attributes' => [
                'id',
                'title',
            ],
        ]) ?>
    </div>
</div>