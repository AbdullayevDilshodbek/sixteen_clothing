<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $categorys app\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form" style="margin-top: 60px ">
    <div style="background-color: #F1F3F4; padding: 10px 50px; margin-bottom: 10px; border-radius: 10px">
        <!--        'status' => md5($model->checkAdmin())-->
        <span ><a href="<?=Yii::$app->urlManager->createUrl(['admin/admin', 'status' => md5(10) ])?>">Admin</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/product'])?>">Product</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/category'])?>">Category</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/trading'])?>">Trading</a> </span>
    </div>
    <?
    echo '<label>Check Issue Date</label>';
    echo DatePicker::widget([
        'name' => 'check_issue_date',
        'value' => date('d-M-Y', strtotime('+2 days')),
        'options' => ['placeholder' => 'Select issue date ...'],
        'pluginOptions' => [
            'format' => 'dd-M-yyyy',
            'todayHighlight' => true
        ]
    ]);
    ?>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput(['placeholder' => "Chegirma miqdori => 10,15,..,99"]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'img')->fileInput(); ?>
<!--    --><?//= $form->field($model, 'category_id')->dropDownList(
//        ArrayHelper::map((array)$categorys, 'id', 'name'),
//        [
//            'prompt' => 'Categoryani tanlang...'
//        ]
//    ) ?>
    <?= $form->field($model, 'category_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map((array)$categorys, 'id', 'name'),
        'language' => 'uz',
        'options' => ['placeholder' => 'Categoryani tanlang...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
