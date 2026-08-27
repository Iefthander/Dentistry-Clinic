<?php

/** @var string $title */

use yii\bootstrap5\Html;

$class = match (true) {
    mb_stripos($title, 'рассмотр') !== false => 'badge-dc--pending',
    mb_stripos($title, 'принят') !== false => 'badge-dc--accepted',
    default => 'badge-dc--denied',
};

echo Html::tag('span', Html::encode($title), ['class' => 'badge-dc ' . $class]);
