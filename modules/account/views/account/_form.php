<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Application $model */
/** @var array $branch */
/** @var array $services */
?>

<div class="form-card form-card--wide">
    <?php $form = ActiveForm::begin(); ?>

    <div class="row g-3">
        <div class="col-md-6">
            <?= $form->field($model, 'branch_id')->dropDownList($branch, ['prompt' => 'Выберите филиал']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'services_id')->dropDownList($services, ['prompt' => 'Выберите услугу']) ?>
        </div>
        <div class="col-12">
            <?= $form->field($model, 'date_str')->textInput(['type' => 'datetime-local', 'min' => date('Y-m-d') . 'T08:00']) ?>
        </div>
        <div class="col-12">
            <?= $form->field($model, 'problem')->textarea(['rows' => 3]) ?>
        </div>
    </div>

    <div class="d-flex gap-2 mt-4">
        <?= Html::submitButton('Сохранить', ['class' => 'btn-dc col']) ?>
        <?= Html::a('Мои записи', ['index'], ['class' => 'btn-dc-ghost col']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
