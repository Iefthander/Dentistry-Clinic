<?php

/** @var yii\web\View $this */

use yii\bootstrap5\Html;

$this->title = 'Dentistry Clinic — стоматологическая клиника в Санкт-Петербурге';
?>

<section class="hero">
    <img class="hero__bg" src="<?= Yii::getAlias('@web/img/cover.jpg') ?>" alt="">
    <div class="dc-container">
        <h1 class="hero__title">Максимальная ответственность и&nbsp;профессионализм</h1>
        <p class="hero__text">Dentistry Clinic — современная стоматология в Санкт-Петербурге. Лечим, восстанавливаем и возвращаем уверенность в улыбке без очередей и боли.</p>
        <div class="hero__buttons">
            <?php if (!Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin): ?>
                <?= Html::a('Записаться на приём', ['/account/account/create'], ['class' => 'btn-dc-light']) ?>
            <?php elseif (Yii::$app->user->isGuest): ?>
                <?= Html::a('Записаться на приём', ['/site/login'], ['class' => 'btn-dc-light']) ?>
            <?php endif; ?>
            <?= Html::a('Наши услуги', ['/site/services'], ['class' => 'btn-dc-light', 'style' => 'background:transparent;color:#fff;']) ?>
        </div>
    </div>
</section>

<section class="stats">
    <div class="dc-container">
        <div class="row">
            <div class="col-6 col-md-3">
                <div class="stats__item">
                    <div class="stats__value">20 лет</div>
                    <div class="stats__label">заботимся о здоровье пациентов</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stats__item">
                    <div class="stats__value">3</div>
                    <div class="stats__label">филиала рядом с метро</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stats__item">
                    <div class="stats__value">30</div>
                    <div class="stats__label">врачей в нашей команде</div>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="stats__item">
                    <div class="stats__value">12 000+</div>
                    <div class="stats__label">пациентов доверили нам улыбку</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="dc-container">
        <h2 class="section-title">Популярные услуги</h2>
        <p class="section-subtitle">Полный спектр стоматологической помощи для взрослых и детей — от профилактики до сложного протезирования.</p>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card-dc service-card">
                    <div class="service-card__icon"><img src="<?= Yii::getAlias('@web/img/svg/01.svg') ?>" alt=""></div>
                    <div class="service-card__title">Профилактика и гигиена</div>
                    <div class="service-card__text">Профессиональная чистка, снятие зубных отложений и подбор средств гигиены.</div>
                    <?= Html::a('Подробнее', ['/site/hygiene'], ['class' => 'service-card__link']) ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card-dc service-card">
                    <div class="service-card__icon"><img src="<?= Yii::getAlias('@web/img/svg/02.svg') ?>" alt=""></div>
                    <div class="service-card__title">Терапия</div>
                    <div class="service-card__text">Лечение кариеса и его осложнений, эстетические реставрации зубов.</div>
                    <?= Html::a('Подробнее', ['/site/therapy'], ['class' => 'service-card__link']) ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card-dc service-card">
                    <div class="service-card__icon"><img src="<?= Yii::getAlias('@web/img/svg/05.svg') ?>" alt=""></div>
                    <div class="service-card__title">Имплантация</div>
                    <div class="service-card__text">Восстановление зубов на имплантах под ключ с гарантией результата.</div>
                    <?= Html::a('Подробнее', ['/site/implantation'], ['class' => 'service-card__link']) ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card-dc service-card">
                    <div class="service-card__icon"><img src="<?= Yii::getAlias('@web/img/svg/04.svg') ?>" alt=""></div>
                    <div class="service-card__title">Ортодонтия</div>
                    <div class="service-card__text">Исправление прикуса брекет-системами и элайнерами для взрослых и детей.</div>
                    <?= Html::a('Подробнее', ['/site/orthodontics'], ['class' => 'service-card__link']) ?>
                </div>
            </div>
        </div>
        <div class="text-center mt-5">
            <?= Html::a('Все услуги', ['/site/services'], ['class' => 'btn-dc-outline']) ?>
        </div>
    </div>
</section>

<section class="section section--tint">
    <div class="dc-container">
        <h2 class="section-title">О клинике</h2>
        <div class="about-grid mt-4">
            <div class="about-grid__text">
                <p>Dentistry Clinic работает в Санкт-Петербурге более 20 лет. Мы диагностируем, предупреждаем и лечим заболевания полости рта по всем основным направлениям стоматологии: терапия, ортодонтия, имплантация, протезирование, детская стоматология и челюстно-лицевая хирургия.</p>
                <p>Более 90% наших пациентов полностью довольны обслуживанием и результатом лечения, что подтверждают их отзывы. Наш принцип — «не навреди», а цель — как можно больше здоровых и довольных пациентов.</p>
                <p>Благодаря предварительной записи и чёткой работе администраторов мы работаем без очередей и задержек, а обращение в клинику не требует лишних формальностей.</p>
            </div>
            <div>
                <img class="service-detail__img" src="<?= Yii::getAlias('@web/img/services.jpg') ?>" alt="Dentistry Clinic">
            </div>
        </div>
        <div class="about-facts">
            <div class="card-dc about-fact">
                <img src="<?= Yii::getAlias('@web/img/001.png') ?>" alt="">
                <div class="about-fact__value">20 лет</div>
                <div class="about-fact__text">заботимся о здоровье пациентов с 2003 года</div>
            </div>
            <div class="card-dc about-fact">
                <img src="<?= Yii::getAlias('@web/img/002.png') ?>" alt="">
                <div class="about-fact__value">3 клиники рядом с метро</div>
                <div class="about-fact__text">открываем новые филиалы в разных районах города, чтобы быть доступнее</div>
            </div>
            <div class="card-dc about-fact">
                <img src="<?= Yii::getAlias('@web/img/003.png') ?>" alt="">
                <div class="about-fact__value">30 врачей</div>
                <div class="about-fact__text">ежедневно заботятся о вашем здоровье</div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="dc-container">
        <h2 class="section-title">Почему выбирают нас</h2>
        <p class="section-subtitle">Мы строим сервис вокруг пациента: честно, комфортно и без боли.</p>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="card-dc advantage-card">
                    <div class="advantage-card__icon"><img src="<?= Yii::getAlias('@web/img/svg/06.svg') ?>" alt=""></div>
                    <div class="advantage-card__title">Современное оборудование</div>
                    <div class="advantage-card__text">Диагностика и лечение на уровне актуальных клинических протоколов.</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card-dc advantage-card">
                    <div class="advantage-card__icon"><img src="<?= Yii::getAlias('@web/img/svg/07.svg') ?>" alt=""></div>
                    <div class="advantage-card__title">Лечение без боли</div>
                    <div class="advantage-card__text">Эффективная анестезия и бережные протоколы — комфортно даже детям.</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card-dc advantage-card">
                    <div class="advantage-card__icon"><img src="<?= Yii::getAlias('@web/img/svg/03.svg') ?>" alt=""></div>
                    <div class="advantage-card__title">Гарантия качества</div>
                    <div class="advantage-card__text">Работаем по стандартам и даём гарантию на выполненные работы.</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card-dc advantage-card">
                    <div class="advantage-card__icon"><img src="<?= Yii::getAlias('@web/img/svg/08.svg') ?>" alt=""></div>
                    <div class="advantage-card__title">Без очередей</div>
                    <div class="advantage-card__text">Удобная онлайн-запись и точное время приёма без ожидания.</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section--tint">
    <div class="dc-container">
        <h2 class="section-title">Как нас найти</h2>
        <p class="section-subtitle">Три филиала в разных районах города — выбирайте удобный.</p>
        <div class="contact-cards">
            <div class="card-dc contact-card">
                <div class="contact-card__title">Ул. Дыбенко</div>
                <div class="contact-card__text">м. Улица Дыбенко</div>
            </div>
            <div class="card-dc contact-card">
                <div class="contact-card__title">Пр. Энергетиков</div>
                <div class="contact-card__text">м. Ладожская</div>
            </div>
            <div class="card-dc contact-card">
                <div class="contact-card__title">Ул. Ильюшина, д. 10</div>
                <div class="contact-card__text">м. Комендантский проспект</div>
            </div>
        </div>
        <iframe class="map-frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1998.0063394191957!2d30.266801027092733!3d59.94862903786946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4696312d956bc111%3A0x3a60c856823f306d!2z0KDQsNC00LjQvtGC0LXRhdC90LjRh9C10YHQutC40Lkg0JrQvtC70LvQtdC00LY!5e0!3m2!1sru!2sru!4v1715682725477!5m2!1sru!2sru" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Dentistry Clinic на карте"></iframe>
    </div>
</section>

<section class="section section--cta">
    <div class="dc-container cta-band">
        <div>
            <h2 class="cta-band__title">Готовы подарить вам здоровую улыбку</h2>
            <p class="cta-band__text">Запишитесь на приём — администратор подберёт удобное время и ответит на все вопросы.</p>
        </div>
        <?php if (!Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin): ?>
            <?= Html::a('Записаться на приём', ['/account/account/create'], ['class' => 'btn-dc-light']) ?>
        <?php elseif (Yii::$app->user->isGuest): ?>
            <?= Html::a('Записаться на приём', ['/site/login'], ['class' => 'btn-dc-light']) ?>
        <?php else: ?>
            <?= Html::a('Перейти в кабинет', ['/account/account/index'], ['class' => 'btn-dc-light']) ?>
        <?php endif; ?>
    </div>
</section>
