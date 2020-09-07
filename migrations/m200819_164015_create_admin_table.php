<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%admin}}`.
 */
class m200819_164015_create_admin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%admin}}', [
            'id' => $this->primaryKey(),
            'login' => 'VARCHAR(50)',
            'password' => 'VARCHAR(50)',
            'status' => 'integer',
            'authKey' => 'VARCHAR(255)',
            'accessToken' => 'VARCHAR(255)'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%admin}}');
    }
}
