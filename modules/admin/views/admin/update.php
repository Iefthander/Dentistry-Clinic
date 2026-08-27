<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = 'Редактирование заявки — Dentistry Clinic';
?>

<div class="dc-container dc-container--narrow section" style="padding-top:44px;">
    <div class="page-head" style="padding-top:0;">
        <h1 class="page-head__title">Редактирование заявки</h1>
    </div>

    <div class="toolbar-dc">
        <div><?= Html::a('Назад', ['view', 'id' => $model->id], ['class' => 'btn-dc-ghost']) ?></div>
    </div>

    <div class="mt-4">
        <?= $this->render('_form', [
            'model' => $model,
            'branch' => $branch,
            'services' => $services,
            'status' => $status,
        ]) ?>
    </div>
</div>