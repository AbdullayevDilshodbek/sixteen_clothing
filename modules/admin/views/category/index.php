<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p style="margin-top: 50px ">
    <div style="background-color: #F1F3F4; padding: 10px 50px; margin-bottom: 10px; border-radius: 10px">
        <span ><a href="<?=Yii::$app->urlManager->createUrl(['admin/admin', 'status' => md5(10)])?>">Admin</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/product'])?>">Product</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/category'])?>">Category</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/trading'])?>">Trading</a> </span>
    </div>
    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
