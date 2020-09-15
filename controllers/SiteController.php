<?php

namespace app\controllers;

use app\models\SignupForm;
use app\models\Trading;
use app\models\User;
use app\modules\admin\models\Product;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $products = new Product();
        $user = new User();
        return $this->render('index',[
            'products' => $products->getAll(),
            'user' => $user->getUser()
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionSale($id){
        $product = new Product();
        $trading = new Trading();
        $user = new User();

        if ($product->load(Yii::$app->request->post())){
            $profit = ($product->price * $product->discount - $product->cost) * $product->description;
            $trading->addSale($id,$product->description,$product->price,$profit,$product->discount,$user->getUser());
            if(!$trading->save()){
                \yii\helpers\VarDumper::dump($trading->getErrors(),10,true); die;
            }
//            \yii\helpers\VarDumper::dump($product,10,true); die;

        }

        return $this->render('sale',[
            'product' => $product->getProduct($id),
            'trading' => $trading,
            'user' => $user->getUser()
        ]);
    }

    public function actionKarzinka($product_ids)
    {
        $ids = explode(',', $product_ids);
//        \yii\helpers\VarDumper::dump($ids,10,true); die;
        $product = new Product();
        $trading = new Trading();
        $user = new User();

        if ($product->load(Yii::$app->request->post())) {
            $profit = $product->price - ($product->cost * $product->description);
            $trading->addSale($product->id, $product->description, $product->price, $profit, $product->discount, $user->getUser());
            if (!$trading->save()) {
                \yii\helpers\VarDumper::dump($trading->getErrors(), 10, true);
                die;
            }
        }

        return $this->render('karzinka', [
            'products' => $product->getSelected($ids),
            'trading' => $trading,
            'user' => $user->getUser()
        ]);
    }

//    public function actionAddAdmin() {
//        $model = User::find()->where(['username' => 'admin'])->one();
//        if (empty($model)) {
//            $user = new User();
//            $user->username = 'admin';
//            $user->email = 'admin@devreadwrite.com';
//            $user->setPassword('admin');
//            $user->generateAuthKey();
//            if ($user->save()) {
//                echo 'good';
//            }
//        }
//    }

    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

}
