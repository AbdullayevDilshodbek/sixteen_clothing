<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Admins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">
    <h1 style="padding-bottom: 50px"><?= Html::encode($this->title) ?></h1>
<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div style="background-color: #F1F3F4; padding: 10px 50px; margin-bottom: 10px; border-radius: 10px">
<!--        'status' => md5($model->checkAdmin())-->
        <span ><a href="<?=Yii::$app->urlManager->createUrl(['admin/admin', 'status' => md5(10) ])?>">Admin</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/product'])?>">Product</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/category'])?>">Category</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/trading'])?>">Trading</a> </span>
    </div>
    <p>
        <?= Html::a('Create Admin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
            'tableOptions' =>[
                    'class' => 'table table-hover table-border table-s'
            ],
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'login',
            'password',
            'status',
            'authKey',
            //'accessToken',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
