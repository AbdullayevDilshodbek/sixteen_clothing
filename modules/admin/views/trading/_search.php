<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\TradingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trading-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'number') ?>

    <?= $form->field($model, 'pay_amount') ?>

    <?= $form->field($model, 'discount') ?>

    <?php  echo $form->field($model, 'user_id') ?>

    <?php  echo $form->field($model, 'pay_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
