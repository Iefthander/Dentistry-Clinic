<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */

use yii\helpers\Html;

$this->title = 'Ошибка — Dentistry Clinic';

$code = $exception instanceof \yii\web\HttpException ? $exception->statusCode : null;
?>

<div class="error-page">
    <div class="error-page__code"><?= $code ?? 'Ой' ?></div>
    <div class="error-page__title"><?= nl2br(Html::encode($name)) ?></div>
    <p class="error-page__text">
        <?= Html::encode($message ?: 'Такой страницы нет или произошла непредвиденная ошибка. Попробуйте вернуться на главную — там всё работает.') ?>
    </p>
    <a href="<?= Yii::$app->homeUrl ?>" class="btn-dc">Вернуться на главную</a>
</div>
