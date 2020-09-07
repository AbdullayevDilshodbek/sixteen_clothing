<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $categorys app\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form" style="margin-top: 60px ">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput(['placeholder' => "Chegirma miqdori => 10,15,..,99"]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img')->fileInput(); ?>
    <?= $form->field($model, 'category_id')->dropDownList(
        ArrayHelper::map((array)$categorys, 'id', 'name'),
        [
            'prompt' => 'Categoryani tanlang...'
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
