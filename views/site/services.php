<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;

$this->title = 'Услуги — Dentistry Clinic';

$services = [
    ['icon' => '01.svg', 'title' => 'Профилактика и гигиена', 'text' => 'Профессиональная чистка, профилактика кариеса и подбор домашней гигиены.', 'url' => ['/site/hygiene']],
    ['icon' => '02.svg', 'title' => 'Терапия', 'text' => 'Лечение кариеса, пульпита и периодонтита, эстетические реставрации.', 'url' => ['/site/therapy']],
    ['icon' => '03.svg', 'title' => 'Протезирование', 'text' => 'Коронки, виниры, съёмные и несъёмные протезы, протезирование на имплантах.', 'url' => ['/site/prosthetics']],
    ['icon' => '04.svg', 'title' => 'Ортодонтия', 'text' => 'Исправление прикуса брекет-системами и элайнерами у взрослых и детей.', 'url' => ['/site/orthodontics']],
    ['icon' => '05.svg', 'title' => 'Имплантация зубов', 'text' => 'Восстановление зубов на имплантах под ключ с гарантией результата.', 'url' => ['/site/implantation']],
    ['icon' => '06.svg', 'title' => 'Детская стоматология', 'text' => 'Бережное лечение молочных зубов и формирование доверия к врачу у ребёнка.', 'url' => ['/site/childrendentistry']],
    ['icon' => '07.svg', 'title' => 'Челюстно-лицевая хирургия', 'text' => 'Удаления любой сложности, зубосохраняющие операции, лечение воспалений.', 'url' => ['/site/facialsurgery']],
    ['icon' => '08.svg', 'title' => 'Массаж', 'text' => 'Лечебный и эстетический массаж лица и шейно-воротниковой зоны.', 'url' => ['/site/massage']],
];
?>

<section class="hero hero--page">
    <img class="hero__bg" src="<?= Yii::getAlias('@web/img/cover.jpg') ?>" alt="">
    <div class="dc-container">
        <h1 class="hero__title">Услуги</h1>
        <p class="hero__text">Полный спектр стоматологической помощи для всей семьи — выберите направление, чтобы узнать подробнее.</p>
    </div>
</section>

<section class="section">
    <div class="dc-container">
        <div class="row g-4">
            <?php foreach ($services as $s): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="card-dc service-card">
                        <div class="service-card__icon"><img src="<?= Yii::getAlias('@web/img/svg/' . $s['icon']) ?>" alt=""></div>
                        <div class="service-card__title"><?= $s['title'] ?></div>
                        <div class="service-card__text"><?= $s['text'] ?></div>
                        <?= Html::a('Подробнее', $s['url'], ['class' => 'service-card__link']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--cta">
    <div class="dc-container cta-band">
        <div>
            <h2 class="cta-band__title">Не знаете, с чего начать?</h2>
            <p class="cta-band__text">Запишитесь на консультацию — врач составит индивидуальный план лечения.</p>
        </div>
        <?php if (!Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin): ?>
            <?= Html::a('Записаться на приём', ['/account/account/create'], ['class' => 'btn-dc-light']) ?>
        <?php else: ?>
            <?= Html::a('Записаться на приём', ['/site/login'], ['class' => 'btn-dc-light']) ?>
        <?php endif; ?>
    </div>
</section>
