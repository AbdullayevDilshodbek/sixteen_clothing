<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id
 * @property string $name
 * @property double $cost
 * @property double $price
 * @property double $discount
 * @property string $description
 * @property string $img
 * @property int $category_id
 * @property string $added_date
 *
 * @property Category $category
 * @property Review[] $reviews
 * @property Trading[] $tradings
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['category_id','cost','price','name','description','discount'], 'required'],
            [['category_id','discount'], 'integer'],
            [['added_date'], 'safe'],
            [['img'],'file','maxSize'=>1024000],
            [['name'], 'string', 'max' => 32],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '',
            'name' => 'Name',
            'cost' => 'Tan_narxi',
            'price' => 'Narxi',
            'discount' => 'Chegirma',
            'description' => 'Description',
            'img' => 'Rasm',
            'category_id' => 'Category',
            'added_date' => 'Added Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTradings()
    {
        return $this->hasMany(Trading::className(), ['user_id' => 'id']);
    }

    public function getAll(){
        return static::find()->all();
    }

    public function getProduct($id){
        return static::findOne(['id'=>$id]);
    }

    public function getSelected($ids){
//        $ids = [10,11];
        $ozgaruvchi = "(".join(',',$ids).")";
        return static::find()->where("id IN 
           {$ozgaruvchi} 
        ")->all();
    }
}
