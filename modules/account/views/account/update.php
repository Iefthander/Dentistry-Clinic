<?php

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = 'Изменить запись — Dentistry Clinic';
?>

<div class="dc-container section" style="padding-top:44px;">
    <div class="page-head" style="padding-top:0;">
        <h1 class="page-head__title">Изменить запись</h1>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'branch' => $branch,
        'services' => $services,
    ]) ?>
</div>
