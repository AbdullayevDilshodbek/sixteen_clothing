<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'My Yii Application';
$index = 0;
?>
    <div class="site-index">
        <!-- Banner Starts Here -->
        <div class="banner header-text">
            <div class="owl-banner owl-carousel">
                <div class="banner-item-01">
                    <div class="text-content">
                        <h4>Best Offer</h4>
                        <h2>New Arrivals On Sale</h2>
                    </div>
                </div>
                <div class="banner-item-02">
                    <div class="text-content">
                        <h4>Flash Deals</h4>
                        <h2>Get your best products</h2>
                    </div>
                </div>
                <div class="banner-item-03">
                    <div class="text-content">
                        <h4>Last Minute</h4>
                        <h2>Grab last minute deals</h2>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Ends Here -->

        <div class="latest-products">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>Eng yangi maxsulotlar</h2>
                            <a href="products.html">barcha maxsulotlarni ko'rish <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <? foreach ($products as $product): ?>
                        <div class="col-md-4">
                            <div class="product-item">
                                <a href="#"><img src="http://yii/sixteen_clothing/web/uploads/<?= $product->img ?>"
                                                 width="370px" height="170px" alt=""></a>
                                <div class="down-content">
                                    <? if ($user > 0): ?>
                                        <?= Html::a('Sotib olaman', ['site/sale', 'id' => $product->id], ['class' => 'btn btn-success', 'id' => 'modalButtonn']) ?>
                                    <? else: ?>
                                        <?= Html::a('Sotib olaman', ['site/login'], ['class' => 'btn btn-success', 'id' => 'modalButtonn']) ?>
                                    <? endif; ?>
                                    <h6 style="border-collapse: collapse"><?= $product->price ?> so`m</h6>
                                    <b onclick="addCar(<?=$product->id?>);test();" class="fa fa-cart-plus buqa" style="
                                        font-size:25px;
                                        color:#639843;
                                        margin-left: 20px;">
                                    </b>
                                    <p><?= $product->description ?></p>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span>Reviews (24)</span>
                                </div>
                            </div>
                        </div>
                        <? Modal::begin([
                        'header' => '<h1>Sotib olish</h1>',
                        'id' => 'modal'
                    ]) ?>
                        <div id="modalContent"></div>
                        <? Modal::end() ?>
                    <? endforeach; ?>
                </div>
            </div>
        </div>

        <div class="best-features">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>About Sixteen Clothing</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="left-content">
                            <h4>Looking for the best products?</h4>
                            <p><a rel="nofollow" href="https://templatemo.com/tm-546-sixteen-clothing" target="_parent">This
                                    template</a> is free to use for your business websites. However, you have no
                                permission
                                to
                                redistribute the downloadable ZIP file on any template collection website. <a
                                        rel="nofollow"
                                        href="https://templatemo.com/contact">Contact
                                    us</a> for more info.</p>
                            <ul class="featured-list">
                                <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                                <li><a href="#">Consectetur an adipisicing elit</a></li>
                                <li><a href="#">It aquecorporis nulla aspernatur</a></li>
                                <li><a href="#">Corporis, omnis doloremque</a></li>
                                <li><a href="#">Non cum id reprehenderit</a></li>
                            </ul>
                            <a href="about.html" class="filled-button">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="right-image">
                            <img src="assets/images/feature-image.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="call-to-action">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="inner-content">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet
                                        elite
                                        author nulla.</p>
                                </div>
                                <div class="col-md-4">
                                    <a href="#" class="filled-button">Purchase Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
//$this->registerJsFile("js/jQuery.js");
$script = "
    $('#modalButton').click(function(e){
        e.preventDefault();
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('href'));
    });
";
$this->registerJs($script, yii\web\View::POS_END);
$this->registerJsFile("js/karzinka.js")

?>