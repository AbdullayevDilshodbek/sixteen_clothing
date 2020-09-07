<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .buqa:hover {
            color: #fdfdfd !important;
            background-color: #23a015;
            border-radius: 50%;
            padding: 2px;
        }

        #card_:hover {
            /*background-color: #23a015 !important;*/
            color: aliceblue !important;
            border-color: #ffffff !important;
            border-radius: 10%;
            /*padding: 2px;*/
        }
    </style>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<body>
<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- Header -->
<header class="">
    <!--    <button id="hello">Hello</button>-->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?= Yii::$app->helper->getActivePage(Yii::$app->controller->action->id, "index") ?>">
                        <a class="nav-link" href="<?= Yii::$app->urlManager->createUrl('/site/index') ?>">Home

                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.html">Our Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact Us</a>
                    </li>
                    <? if (Yii::$app->user->isGuest) : ?>
                        <li class='<?= Yii::$app->helper->getActivePage(Yii::$app->controller->action->id, 'login') ?>'>
                            <a class='nav-link' href='<?= Yii::$app->urlManager->createUrl("site/login") ?>'>Login</a>
                        </li>
                        <li class='<?= Yii::$app->helper->getActivePage(Yii::$app->controller->action->id, 'signup') ?>'>
                            <a class='nav-link' href='<?= Yii::$app->urlManager->createUrl("site/signup") ?>'>SignUp</a>
                        </li>
                    <? else: ?>
                        <li>
                            <?= Html::beginForm(['/site/logout'], 'post') ?>
                            <?= Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->login . ')',
                                [
                                    'style' => 'color: #fff; background-color:#232323;
                                 border: 1px solid #232323; margin-top: 16px;font-size:16px',
                                    'onclick'=>'(function() {localStorage.clear();})();'
                                ]
                            ) ?>
                            <?= Html::endForm() ?>
                        </li>
                    <? endif; ?>

                    <a id="test1" onclick="test()">
                        <li id="card_" class='fa fa-cart-plus' style="
                                        font-size:40px;
                                        height: 55px;
                                        color:#3c9d2b;
                                        /*border: 1px solid #3c9d2b;*/
                                        margin-left: 20px;">
                            <span id="card-count" style="font-size: 20px"></span>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!--<br><br><br><br><br><br><br><br>-->
<!-- Page Content -->
<?= $content ?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="inner-content">
                    <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.

                        - Design: <a rel="nofollow noopener" href="https://templatemo.com"
                                     target="_blank">TemplateMo</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<?
$script = "
     
    ";
$script2 = "
    $(document).ready(function(){
    var a = JSON.parse(localStorage.ids);
    var array = [];
    a.forEach(element => {
        if(element.id != null){
            array.push(element.id);
                }
            });
    // Enter code here
    alert('hello');
    $('#test1').attr('href',array);
});
";
//$this->registerJs($script2, yii\web\View::POS_END);
?>
<? //$this->registerJs($script,yii\web\View::POS_HEAD)?>
<? $this->registerJsFile("js/karzinka2.js") ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
