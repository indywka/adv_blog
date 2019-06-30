<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comm}}`.
 */
class m190630_115752_create_comm_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comm}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'id_news' => $this->integer(),
            'comment' => $this->text()
        ]);

        $this->createIndex(
            'idx-post-id_user',
            'comm',
            'id_user'
        );
        $this->addForeignKey(
            'fk-post-id_user',
            'comm',
            'id_user',
            'reg',
            'id'
        );


        $this->createIndex(
            'idx-post-id_news',
            'comm',
            'id_news'
        );
        $this->addForeignKey(
            'fk-post-id_news',
            'comm',
            'id_news',
            'blog',
            'id'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%comm}}');
    }
}
