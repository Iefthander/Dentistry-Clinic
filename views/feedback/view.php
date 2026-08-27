<?php

/** @var yii\web\View $this */
/** @var app\models\Feedback[] $rows */

use yii\bootstrap5\Html;

$this->title = 'Отзывы — Dentistry Clinic';
?>

<section class="hero hero--page">
    <img class="hero__bg" src="<?= Yii::getAlias('@web/img/cover.jpg') ?>" alt="">
    <div class="dc-container">
        <h1 class="hero__title">Отзывы пациентов</h1>
        <p class="hero__text">Нам доверяют самое дорогое — здоровье. Вот что говорят пациенты.</p>
    </div>
</section>

<section class="section">
    <div class="dc-container">
        <div class="text-center mb-5">
            <?= Html::a('Оставить отзыв', ['index'], ['class' => 'btn-dc']) ?>
        </div>
        <?php if (empty($rows)): ?>
            <div class="text-center" style="color:var(--dc-muted);">Отзывов пока нет — станьте первым!</div>
        <?php else: ?>
            <div class="row g-4">
                <?php foreach (array_reverse($rows) as $row): ?>
                    <div class="col-lg-6">
                        <div class="card-dc review-card">
                            <div class="review-card__head">
                                <div class="review-card__avatar"><?= Html::encode(mb_strtoupper(mb_substr($row->name, 0, 1))) ?></div>
                                <div>
                                    <div class="review-card__name"><?= Html::encode($row->name) ?></div>
                                    <div class="review-card__date"><?= Html::encode(Yii::$app->formatter->asDate($row->created_at_feedback)) ?></div>
                                </div>
                            </div>
                            <div class="review-card__text"><?= Html::encode($row->content) ?></div>
                            <?php if (!empty($row->photo)): ?>
                                <img class="review-card__photo" src="<?= Yii::getAlias('@web/feedbackimg/' . $row->photo) ?>" alt="Фото отзыва">
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
