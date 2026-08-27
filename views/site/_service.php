<?php

/** @var yii\web\View $this */
/** @var string $title */
/** @var string $subtitle */
/** @var string $image */
/** @var string $imageAlt */
/** @var array $paragraphs */
/** @var array $includes */

use yii\bootstrap5\Html;
?>

<section class="hero hero--page">
    <img class="hero__bg" src="<?= Yii::getAlias('@web/img/cover.jpg') ?>" alt="">
    <div class="dc-container">
        <h1 class="hero__title"><?= Html::encode($title) ?></h1>
        <p class="hero__text"><?= Html::encode($subtitle) ?></p>
    </div>
</section>

<section class="section">
    <div class="dc-container">
        <div class="service-detail__body">
            <div>
                <?php foreach ($paragraphs as $p): ?>
                    <p><?= $p ?></p>
                <?php endforeach; ?>
                <h3 class="mt-4 mb-3">Что включает приём</h3>
                <ul class="service-detail__list">
                    <?php foreach ($includes as $li): ?>
                        <li><?= Html::encode($li) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div>
                <img class="service-detail__img" src="<?= $image ?>" alt="<?= Html::encode($imageAlt) ?>">
            </div>
        </div>
        <div class="text-center mt-5">
            <?php if (!Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin): ?>
                <?= Html::a('Записаться на приём', ['/account/account/create'], ['class' => 'btn-dc']) ?>
            <?php else: ?>
                <?= Html::a('Записаться на приём', ['/site/login'], ['class' => 'btn-dc']) ?>
            <?php endif; ?>
            <?= Html::a('Все услуги', ['/site/services'], ['class' => 'btn-dc-outline ms-2']) ?>
        </div>
    </div>
</section>
