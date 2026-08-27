<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Application $model */
?>

<?php $form = ActiveForm::begin([
    'id' => 'id-active-form-admin-apply',
]); ?>
    <p class="text-muted">Введите сообщение пользователю:</p>
    <?= $form->field($model, 'message')->textInput() ?>

    <div class="d-flex gap-2">
        <?= Html::submitButton('Подтвердить', ['class' => 'btn-dc-success col']) ?>
        <?= Html::a('Отмена', ['/admin'], ['class' => 'btn-dc-ghost col btn-close-apply']) ?>
    </div>
<?php ActiveForm::end(); ?>