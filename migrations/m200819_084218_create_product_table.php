<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m200819_084218_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => 'VARCHAR(32)',
            'price' => 'double',
            'description' => 'string',
            'img' => 'string',
            'category_id' => 'integer',
            'added_date' => 'date'
        ]);

        $this->addForeignKey('product_categort','{{%product}}','category_id',
        '{{%category}}','id','CASCADE','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
