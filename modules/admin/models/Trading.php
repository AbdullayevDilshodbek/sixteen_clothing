<?php

namespace app\modules\admin\models;

use app\models\User;
use Yii;
use yii\data\Pagination;
/**
 * This is the model class for table "{{%trading}}".
 *
 * @property int $id
 * @property int $product_id
 * @property int $number
 * @property double $pay_amount
 * @property double $discount
 * @property int $user_id
 * @property string $pay_date
 *
 * @property User $user
 * @property Product $product
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
            [['pay_amount', 'discount','profit'], 'number'],
            [['discount'], 'required'],
            [['pay_date'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Maxsulot',
            'number' => 'Soni',
            'pay_amount' => 'Umumiy summa',
            'profit' => 'Foyda',
            'discount' => 'Chegirma',
            'user_id' => 'Mijoz',
            'pay_date' => 'Pay Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public static function getTotalProfit($provider,$fieldName){
        $total = 0;
        foreach($provider as $item){
            $total += $item['profit'];
        }
        return $total;
    }
}
