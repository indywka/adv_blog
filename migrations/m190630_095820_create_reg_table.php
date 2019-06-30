<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reg}}`.
 */
class m190630_095820_create_reg_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reg}}', [
            'id' => $this->primaryKey(),
            'fname' => $this->string(),
            'sname' => $this->string(),
            'email' => $this->string(),
            'login' => $this->string(),
            'password' => $this->string(),
            'admin' => $this->boolean()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reg}}');
    }
}
