<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? 'Dentistry Clinic — стоматологическая клиника в Санкт-Петербурге. Максимальная ответственность и профессионализм.']);
$this->registerLinkTag(['rel' => 'preconnect', 'href' => 'https://fonts.googleapis.com']);
$this->registerLinkTag(['rel' => 'preconnect', 'href' => 'https://fonts.gstatic.com', 'crossorigin' => '']);
$this->registerLinkTag(['rel' => 'stylesheet', 'href' => 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/svg+xml', 'href' => Yii::getAlias('@web/img/logo.svg')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?= Html::encode($this->title ?? 'Dentistry Clinic') ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/img/logo.svg', ['alt' => 'Dentistry Clinic']) . 'Dentistry Clinic',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => ['class' => 'navbar-dc navbar-expand-lg fixed-top'],
    ]);

    $items = [
        ['label' => 'Главная', 'url' => ['/site/index']],
        ['label' => 'Услуги', 'url' => ['/site/services']],
        ['label' => 'Специалисты', 'url' => ['/site/personal']],
        ['label' => 'Отзывы', 'url' => ['/feedback/view']],
        ['label' => 'Контакты', 'url' => ['/site/contact']],
    ];

    if (!Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin) {
        $items[] = ['label' => 'Личный кабинет', 'url' => ['/account/account/index']];
        $items[] = '<li class="nav-item ms-lg-2">'
            . Html::a('Записаться на приём', ['/account/account/create'], ['class' => 'btn-dc-light'])
            . '</li>';
    }

    if (!Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin) {
        $items[] = ['label' => 'Админ панель', 'url' => ['/admin']];
    }

    if (Yii::$app->user->isGuest) {
        $items[] = ['label' => 'Регистрация', 'url' => ['/site/register']];
        $items[] = '<li class="nav-item ms-lg-2">'
            . Html::a('Вход', ['/site/login'], ['class' => 'btn-dc-light'])
            . '</li>';
    } else {
        $items[] = '<li class="nav-item">'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Выход (' . Html::encode(Yii::$app->user->identity->login) . ')',
                ['class' => 'nav-link btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ms-auto align-items-lg-center'],
        'items' => $items,
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" role="main">
    <?php if (!empty($this->params['breadcrumbs'])): ?>
        <div class="dc-container">
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        </div>
    <?php endif ?>
    <?= Alert::widget() ?>
    <?= $content ?>
</main>

<footer id="footer" class="footer-dc">
    <div class="dc-container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <div class="footer-dc__brand">
                    <?= Html::img('@web/img/logo.svg', ['alt' => 'Dentistry Clinic']) ?>
                    Dentistry Clinic
                </div>
                <p>Стоматологическая клиника в Санкт-Петербурге. Диагностируем, предупреждаем и лечим заболевания полости рта по всем основным направлениям стоматологии.</p>
                <div class="footer-dc__social">
                    <a href="#" aria-label="Facebook"><img src="<?= Yii::getAlias('@web/img/social/facebook.png') ?>" alt="Facebook"></a>
                    <a href="#" aria-label="Instagram"><img src="<?= Yii::getAlias('@web/img/social/inst.png') ?>" alt="Instagram"></a>
                    <a href="#" aria-label="WhatsApp"><img src="<?= Yii::getAlias('@web/img/social/whatsapp.png') ?>" alt="WhatsApp"></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-6">
                <div class="footer-dc__title">Навигация</div>
                <ul>
                    <li><?= Html::a('Главная', ['/site/index']) ?></li>
                    <li><?= Html::a('Услуги', ['/site/services']) ?></li>
                    <li><?= Html::a('Специалисты', ['/site/personal']) ?></li>
                    <li><?= Html::a('Отзывы', ['/feedback/view']) ?></li>
                    <li><?= Html::a('Контакты', ['/site/contact']) ?></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="footer-dc__title">Услуги</div>
                <ul>
                    <li><?= Html::a('Профилактика и гигиена', ['/site/hygiene']) ?></li>
                    <li><?= Html::a('Терапия', ['/site/therapy']) ?></li>
                    <li><?= Html::a('Протезирование', ['/site/prosthetics']) ?></li>
                    <li><?= Html::a('Ортодонтия', ['/site/orthodontics']) ?></li>
                    <li><?= Html::a('Имплантация', ['/site/implantation']) ?></li>
                    <li><?= Html::a('Детская стоматология', ['/site/childrendentistry']) ?></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-dc__title">Контакты</div>
                <ul>
                    <li>г. Санкт-Петербург,<br>ул. Ильюшина, д. 10</li>
                    <li>Пн–Вс с 9:00 до 22:00</li>
                    <li><a href="tel:+78123495987">8 (812) 349-59-87</a></li>
                    <li><a href="mailto:denistryclinic-spb@yandex.ru">denistryclinic-spb@yandex.ru</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-dc__bottom">
        <div class="dc-container d-flex flex-column flex-md-row justify-content-between gap-2">
            <div>&copy; Dentistry Clinic <?= date('Y') ?></div>
            <div class="footer-dc__disclaimer">Имеются противопоказания. Необходима консультация специалиста.</div>
        </div>
    </div>
</footer>

<button type="button" class="totop" id="dc-totop" aria-label="Наверх">&uarr;</button>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
