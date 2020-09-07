<?php

namespace app\modules\admin\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%admin}}".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property int $status
 * @property string $authKey
 * @property string $accessToken
 */
class Admin extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%admin}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['login', 'password'], 'string', 'max' => 50],
            [['login', 'password'],'required'],
            [['authKey', 'accessToken'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Parol',
            'status' => 'Maqom',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    public static function findIdentity($id){
        return static::findOne($id);
    }

    public static function findByUsername($login){
        return static::findOne(['login'=>$login]);
    }

    public function getId(){
        return $this->id;
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

    public function checkAdmin(){
        $admin = static::findOne(['password' => md5($this->password)]);
        if ($admin->status == 10){
            return 10;
        } elseif ($admin->status == 1){
            return 1;
        }
        else{
            return 0;
        }
    }
}
