<?php

/** @var yii\web\View $this */
/** @var app\models\Feedback $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Оставить отзыв — Dentistry Clinic';
?>

<div class="section">
    <div class="dc-container">
        <div class="page-head" style="padding-top:0;">
            <h1 class="page-head__title">Оставить отзыв</h1>
            <p class="page-head__text">Расскажите о своём впечатлении о клинике — нам очень важно</p>
        </div>
        <div class="form-card">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name') ?>

            <?= $form->field($model, 'content')->textarea(['rows' => 5]) ?>

            <?= $form->field($model, 'imageFile')->fileInput() ?>

            <?= $form->field($model, 'rules')->checkbox() ?>

            <div class="d-grid mt-4">
                <?= Html::submitButton('Подтвердить', ['class' => 'btn-dc']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            <div class="text-center mt-3">
                <?= Html::a('Список отзывов', ['view'], ['class' => 'btn-dc-ghost']) ?>
            </div>
        </div>
    </div>
</div>
