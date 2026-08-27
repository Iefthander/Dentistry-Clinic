<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;

$this->title = 'Специалисты — Dentistry Clinic';

$doctors = [
    ['photo' => 'svg/Ellipse 1.svg', 'name' => 'Павлов Владислав Витальевич', 'role' => 'Главный врач'],
    ['photo' => 'svg/Ellipse 2.svg', 'name' => 'Фистерова Светлана Дмитриевна', 'role' => 'Врач-стоматолог терапевт'],
    ['photo' => 'svg/Ellipse 3.svg', 'name' => 'Александров Игорь Сергеевич', 'role' => 'Врач-стоматолог общей практики'],
    ['photo' => 'svg/Ellipse 4.svg', 'name' => 'Шульмина Елена Михайловна', 'role' => 'Врач-стоматолог терапевт'],
    ['photo' => 'svg/nester_new.svg', 'name' => 'Нестеренко Виктор Викторович', 'role' => 'Стоматолог-ортопед, терапевт, хирург-имплантолог'],
    ['photo' => 'svg/kabakova.svg', 'name' => 'Кабакова Анастасия Алексеевна', 'role' => 'Врач-стоматолог общей практики, детский стоматолог'],
];
?>

<section class="hero hero--page">
    <img class="hero__bg" src="<?= Yii::getAlias('@web/img/cover.jpg') ?>" alt="">
    <div class="dc-container">
        <h1 class="hero__title">Наши специалисты</h1>
        <p class="hero__text">Команда врачей, которым спокойно доверить свою улыбку.</p>
    </div>
</section>

<section class="section">
    <div class="dc-container">
        <div class="row g-4">
            <?php foreach ($doctors as $d): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card-dc doctor-card">
                        <div class="doctor-card__photo"><img src="<?= Yii::getAlias('@web/img/' . $d['photo']) ?>" alt="<?= Html::encode($d['name']) ?>"></div>
                        <div class="doctor-card__name"><?= Html::encode($d['name']) ?></div>
                        <div class="doctor-card__role"><?= Html::encode($d['role']) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--cta">
    <div class="dc-container cta-band">
        <div>
            <h2 class="cta-band__title">Запишитесь к нужному специалисту</h2>
            <p class="cta-band__text">Администратор подберёт врача и удобное время визита.</p>
        </div>
        <?php if (!Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin): ?>
            <?= Html::a('Записаться на приём', ['/account/account/create'], ['class' => 'btn-dc-light']) ?>
        <?php else: ?>
            <?= Html::a('Записаться на приём', ['/site/login'], ['class' => 'btn-dc-light']) ?>
        <?php endif; ?>
    </div>
</section>
