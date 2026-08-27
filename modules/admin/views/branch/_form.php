<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Branch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="form-card">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="d-flex gap-2 mt-4">
        <?= Html::submitButton('Сохранить', ['class' => 'btn-dc col']) ?>
        <?= Html::a('Назад', ['index'], ['class' => 'btn-dc-ghost col']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>