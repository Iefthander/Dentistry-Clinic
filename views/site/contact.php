<?php

/** @var yii\web\View $this */

$this->title = 'Контакты — Dentistry Clinic';
?>

<section class="hero hero--page">
    <img class="hero__bg" src="<?= Yii::getAlias('@web/img/cover.jpg') ?>" alt="">
    <div class="dc-container">
        <h1 class="hero__title">Контакты</h1>
        <p class="hero__text">Три филиала в Санкт-Петербурге — выбирайте удобный и приходите без очередей.</p>
    </div>
</section>

<section class="section">
    <div class="dc-container">
        <div class="contact-cards">
            <div class="card-dc contact-card">
                <div class="contact-card__title">Адреса филиалов</div>
                <div class="contact-card__text">
                    ул. Дыбенко (м. Ул. Дыбенко)<br>
                    пр. Энергетиков (м. Ладожская)<br>
                    ул. Ильюшина, д. 10 (м. Комендантский пр.)
                </div>
            </div>
            <div class="card-dc contact-card">
                <div class="contact-card__title">Режим работы</div>
                <div class="contact-card__text">
                    Пн–Вс с 9:00 до 22:00<br>
                    Без выходных<br>
                    Приём только по записи
                </div>
            </div>
            <div class="card-dc contact-card">
                <div class="contact-card__title">Связаться с нами</div>
                <div class="contact-card__text">
                    <a href="tel:+78123495987">8 (812) 349-59-87</a><br>
                    <a href="tel:+79516636616">8 (951) 663-66-16</a><br>
                    <a href="mailto:denistryclinic-spb@yandex.ru">denistryclinic-spb@yandex.ru</a>
                </div>
            </div>
        </div>
        <iframe class="map-frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1998.0063394191957!2d30.266801027092733!3d59.94862903786946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4696312d956bc111%3A0x3a60c856823f306d!2z0KDQsNC00LjQvtGC0LXRhdC90LjRh9C10YHQutC40Lkg0JrQvtC70LvQtdC00LY!5e0!3m2!1sru!2sru!4v1715682725477!5m2!1sru!2sru" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Dentistry Clinic на карте"></iframe>
    </div>
</section>
