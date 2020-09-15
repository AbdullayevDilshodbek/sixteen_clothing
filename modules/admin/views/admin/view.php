<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Admin */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Admins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="admin-view" style="padding-top: 40px; padding-left: 20px;padding-right: 10px;">

    <h1><?= Html::encode($this->title) ?></h1>
    <div style="background-color: #F1F3F4; padding: 10px 50px; margin-bottom: 10px; border-radius: 10px">
        <!--        'status' => md5($model->checkAdmin())-->
        <span ><a href="<?=Yii::$app->urlManager->createUrl(['admin/admin', 'status' => md5(10) ])?>">Admin</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/product'])?>">Product</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/category'])?>">Category</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/trading'])?>">Trading</a> </span>
    </div>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'login',
            'password',
            'status',
            'authKey',
//            'accessToken',
        ],
    ]) ?>

</div>
