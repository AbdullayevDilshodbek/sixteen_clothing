<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trading}}`.
 */
class m200819_120657_create_trading_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trading}}', [
            'id' => $this->primaryKey(),
            'product_id' => 'integer',
            'number' => 'integer',
            'pay_amount' => 'double',
            'user_id' => 'integer',
            'pay_date' => 'date'
        ]);

        $this->addForeignKey('trading_user','{{%trading}}','user_id',
        '{{%users}}','id','CASCADE','CASCADE');

        $this->addForeignKey('trading_product','{{%trading}}','user_id',
        '{{%product}}','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%trading}}');
    }
}
