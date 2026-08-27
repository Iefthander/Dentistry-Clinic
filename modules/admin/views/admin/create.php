<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = 'Добавление заявки — Dentistry Clinic';
?>

<div class="dc-container dc-container--narrow section" style="padding-top:44px;">
    <div class="page-head" style="padding-top:0;">
        <h1 class="page-head__title">Добавление заявки</h1>
    </div>

    <div class="toolbar-dc">
        <div><?= Html::a('Назад', ['index'], ['class' => 'btn-dc-ghost']) ?></div>
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