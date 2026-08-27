<?php

/** @var yii\web\View $this */
/** @var app\models\RegisterForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\widgets\MaskedInput;

$this->title = 'Регистрация — Dentistry Clinic';
?>

<div class="section">
    <div class="dc-container">
        <div class="page-head" style="padding-top:0;">
            <h1 class="page-head__title">Регистрация</h1>
            <p class="page-head__text">Пожалуйста, заполните следующие поля для регистрации</p>
        </div>
        <div class="form-card">
            <?php $form = ActiveForm::begin(['id' => 'registration-form']); ?>

            <?= $form->field($model, 'login', ['enableAjaxValidation' => true]) ?>
            <?= $form->field($model, 'full_name') ?>
            <?= $form->field($model, 'email', ['enableAjaxValidation' => true]) ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'password_repeat')->passwordInput() ?>
            <?= $form->field($model, 'phone')->widget(MaskedInput::class, ['mask' => '+7(999)-999-99-99']) ?>
            <?= $form->field($model, 'rules')->checkbox() ?>

            <div class="d-grid mt-4">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn-dc']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            <div class="text-center mt-3">
                <?= Html::a('Уже есть аккаунт? Войти', ['/site/login'], ['class' => 'btn-dc-ghost']) ?>
            </div>
        </div>
    </div>
</div>
