<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $full_name
 * @property double $wallet
 * @property string $login
 * @property string $password
 * @property string $password_hash
 * @property string $authKey
 * @property string $accessToken
 *
 * @property-read mixed $user
 * @property Trading[] $tradings
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @var mixed|string|null
     */

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wallet'], 'number'],
//            [['full_name', 'login', 'password','password_hash', 'authKey', 'accessToken'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'wallet' => 'Wallet',
            'login' => 'Login',
            'password' => 'Password',
            'authKey' => 'Auth Key',
//            'accessToken' => 'Access Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTradings()
    {
        return $this->hasMany(Trading::className(), ['user_id' => 'id']);
    }

    public static function findIdentity($id){
        return static::findOne($id);
    }

    public static function findByUsername($login){
        return static::findOne(['login'=>$login]);
    }

    public function getId(){
        return $this->getPrimaryKey();
    }

    public function getAuthKey(){
        return $this->authKey;
    }

    public function validateAuthKey($authKey){
        return $this->authKey === $authKey;
    }

    public function validatePassword($password){
        return $this->password === md5($password);
    }

    public static function findIdentityByAccessToken($token,$type=null){
        return static::findOne(['accessToken'=>$token]);
    }

    public function generateAuthKey()
    {
        $this->authKey = Yii::$app->security->generateRandomString();
//        $this->authKey = 'kshdksh';
    }

    public function getUser(){
        return Yii::$app->user->id;
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
//        $this->password_hash = md5($password);
    }

    public function getAllUsers()
    {
        return static::find()->all();
    }
}
