<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'vendor/bootstrap/css/bootstrap.min.css',
        "assets/css/fontawesome.css",
        'assets/css/templatemo-sixteen.css',
        'assets/css/owl.css',
    ];
    public $js = [
        'vendor/bootstrap/js/bootstrap.bundle.min.js',
//        'vendor/jquery/jquery.min.js',
        'assets/js/custom.js',
        'assets/js/owl.js',
        'assets/js/slick.js',
        'assets/js/isotope.js',
        'assets/js/accordions.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
//        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
