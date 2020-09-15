<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Admin */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="admin-form" style="margin-top: 40px; margin-left: 20px;margin-right: 10px;">
    <div style="background-color: #F1F3F4; padding: 10px 50px; margin-bottom: 10px; border-radius: 10px">
        <!--        'status' => md5($model->checkAdmin())-->
        <span ><a href="<?=Yii::$app->urlManager->createUrl(['admin/admin', 'status' => md5(10) ])?>">Admin</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/product'])?>">Product</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/category'])?>">Category</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/trading'])?>">Trading</a> </span>
    </div>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(['10']) ?>

<!--    --><?//= $form->field($model, 'authKey')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'accessToken')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
