<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p style="margin-top: 50px ">
    <div style="background-color: #F1F3F4; padding: 10px 50px; margin-bottom: 10px; border-radius: 10px">
        <span ><a href="<?=Yii::$app->urlManager->createUrl(['admin/admin', 'status' => md5(10)])?>">Admin</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/product'])?>">Product</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/category'])?>">Category</a> </span>
        <span style="margin-left: 10px"><a href="<?=Yii::$app->urlManager->createUrl(['admin/trading'])?>">Trading</a> </span>
    </div>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'cost',
            [
                'label' => 'Price( So`m)',
                'attribute' => 'price',
                'value' => 'price'
            ],
            'discount',
            'description',
            [
                'label' => 'Rasm',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->img)
                        return "<img src='http://yii/sixteen_clothing/web/uploads/" . $model->img . "' style='width:60px'> ";
                    return "google";
                }
            ],
            [
                'label' => 'Category',
                'attribute' => 'category_id',
                'filter' => ArrayHelper::map($categorys, 'id', 'name'),
                'value' => 'category.name'
            ],
            'added_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
