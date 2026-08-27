<?php

use app\models\Doctor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Feedback $model */
/** @var ActiveForm $form */
$this->title = 'Denistry Clinic'; ?>
<head>
<!DOCTYPE html>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,regular,500,600,700,800,900,100italic,200italic,300italic,italic,500italic,600italic,700italic,800italic,900italic" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css">
    <title>Denistry Clinic</title>
</head>
<br><br><br><br>
    <div class="feedback-view indexcontainer">
    <div class="application__header header-block d-flex">
        <hr class ="col"> <h2 id="" class="header-block__title col-6 application__header__title">Список отзывов</h2> <hr class ="col">
    </div>
    <?= Html::a('Оставить отзыв', ['index'], ['class' => 'btn btn-custom buttonformaccept col']) ?>
    <br><br>
    <table>
        <!--<tr><th>Имя</th><th>Врач</th><th>Отзыв</th><th>Дата создания</th><th>Фотография</th></tr>-->
        <?
        foreach($rows as $row){
            echo "{$row['name']}<br>{$row['doctor_id']}<br>{$row['created_at_feedback']}{$row['content']}<br><br><br>
            ";
        }
        ?>
    </table>
    
</div><!-- feedback-view -->
