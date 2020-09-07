<?php

namespace app\models;

use app\modules\admin\models\Product;
use Yii;


/**
 * This is the model class for table "{{%trading}}".
 *
 * @property int $id
 * @property int $product_id
 * @property int $number
 * @property double $pay_amount
 * @property double $profit
 * @property double $discount
 * @property int $user_id
 * @property string $pay_date
 *
 * @property Product $user
// * @property Useraw $user0
 */
class Trading extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%trading}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'number', 'user_id'], 'integer'],
            [['pay_amount', 'profit'], 'number'],
            [['discount'], 'double'],
            [['pay_date'], 'safe'],
            [['user_id'], 'safe'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
//            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['user_id' => 'id']],
//            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Useraw::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'number' => 'Number',
            'pay_amount' => 'Pay Amount',
            'profit' => 'Foyda',
            'user_id' => 'User ID',
            'pay_date' => 'Pay Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Product::className(), ['id' => 'user_id']);
    }

    /**
     * @param $product_id
     * @param $number
     * @param $pay_amount
     * @param $profit
     * @param $discount
     * @param $user_id
     * @return void
     */


    public function addSale($product_id,$number,$pay_amount,$profit,$discount,$user_id){
            $this->product_id = $product_id;
            $this->number = $number;
            $this->pay_amount = $pay_amount;
            $this->profit = $profit;
            $this->discount = $discount;
            $this->user_id = $user_id;
            $this->pay_date = date("Y-m-d");
            $this->save();
    }
}
