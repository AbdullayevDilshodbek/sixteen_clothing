<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%review}}`.
 */
class m200819_145301_create_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%review}}', [
            'id' => $this->primaryKey(),
            'product_id' => 'integer',
            'review' => 'string',
            'user_id' => 'integer',
            'added_date' => 'date'
        ]);

        $this->addForeignKey('review_product','{{%review}}','product_id',
            '{{%product}}','id','CASCADE','CASCADE');

        $this->addForeignKey('review_user','{{%review}}','user_id',
            '{{%users}}','id','CASCADE','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%review}}');
    }
}
