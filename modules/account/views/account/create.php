<?php

/** @var yii\web\View $this */
/** @var app\models\Application $model */

$this->title = 'Запись на приём — Dentistry Clinic';
?>

<div class="dc-container section" style="padding-top:44px;">
    <div class="page-head" style="padding-top:0;">
        <h1 class="page-head__title">Запись на приём к стоматологу</h1>
        <p class="page-head__text">Выберите филиал, услугу и удобное время — мы подтвердим запись</p>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'branch' => $branch,
        'services' => $services,
    ]) ?>
</div>
