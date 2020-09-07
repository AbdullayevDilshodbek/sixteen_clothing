<?php
/* @var $model Admin */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use app\modules\admin\models\Admin;

$form = ActiveForm::begin();
?>
    <h1 style="text-align: center;padding-top: 100px;">KIRISH</h1>
<div style=" padding: 0px 50px">
<?= $form->field($model, 'login'); ?>
<?= $form->field($model, 'password')->passwordInput(); ?>

<?= Html::submitButton('Kirish', ['class' => 'btn btn-info']); ?>

<? ActiveForm::end(); ?>
</div>
