<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\TradingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tradings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trading-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p style="padding-top: 55px ">
    <div style="background-color: #F1F3F4; padding: 10px 50px; margin-bottom: 10px; border-radius: 10px">
        <span><a href="<?= Yii::$app->urlManager->createUrl(['admin/admin', 'status' => md5(10)]) ?>">Admin</a> </span>
        <span style="margin-left: 10px"><a href="<?= Yii::$app->urlManager->createUrl(['admin/product']) ?>">Product</a> </span>
        <span style="margin-left: 10px"><a
                    href="<?= Yii::$app->urlManager->createUrl(['admin/category']) ?>">Category</a> </span>
        <span style="margin-left: 10px"><a href="<?= Yii::$app->urlManager->createUrl(['admin/trading']) ?>">Trading</a> </span>
    </div>
    <p>
        <?= Html::a('Create Trading', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-bordered table-condensed table-hover table-striped'
        ],
        'showHeader' => true,
        'showFooter' => true,
        'pager' => [
            'maxButtonCount' => 10,
            'nextPageLabel' => 'Keyingi >>',
            'prevPageLabel' => '<< Avvalgi',
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'product_id',
                'filter' => \yii\helpers\ArrayHelper::map($products, 'id', 'name'),
                'value' => 'product.name'
            ],
            'number',
            'pay_amount',
            [
                    'attribute' => 'profit',
                'value' => 'profit',
                'footer' => "Umumiy foyda: "
                    .\app\modules\admin\models\Trading::getTotalProfit($dataProvider->models,'profit')
                ." so`m"
            ],
            'discount',
            [
                'attribute' => 'user_id',
                'filter' => \yii\helpers\ArrayHelper::map($users, 'id', 'full_name'),
                'value' => 'user.full_name'
            ],
            'pay_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <? Pjax::end(); ?>
</div>
