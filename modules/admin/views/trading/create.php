<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Trading */

$this->title = 'Create Trading';
$this->params['breadcrumbs'][] = ['label' => 'Tradings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trading-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
