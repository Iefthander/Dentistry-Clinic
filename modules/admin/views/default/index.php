<?php

use yii\bootstrap5\Html;

/** @var yii\web\View $this */

$this->title = 'Админ панель — Dentistry Clinic';
?>

<div class="dc-container section" style="padding-top:44px;">
    <div class="page-head" style="padding-top:0;">
        <h1 class="page-head__title">Админ панель</h1>
    </div>
    <div class="text-center mt-4">
        <?= Html::a('Перейти к заявкам', ['/admin/admin/index'], ['class' => 'btn-dc']) ?>
    </div>
</div>