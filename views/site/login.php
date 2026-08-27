<?php

/** @var yii\web\View $this */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Вход — Dentistry Clinic';
?>

<div class="section">
    <div class="dc-container">
        <div class="page-head" style="padding-top:0;">
            <h1 class="page-head__title">Вход</h1>
            <p class="page-head__text">Пожалуйста, заполните следующие поля для входа</p>
        </div>
        <div class="form-card">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="d-grid mt-4">
                <?= Html::submitButton('Войти', ['class' => 'btn-dc', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            <div class="text-center mt-3">
                <?= Html::a('Нет аккаунта? Зарегистрироваться', ['/site/register'], ['class' => 'btn-dc-ghost']) ?>
            </div>
        </div>
    </div>
</div>
