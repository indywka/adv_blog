<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%my_page}}`.
 */
class m190630_120557_create_my_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%mypage}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer(),
            'id_news' => $this->integer()
        ]);


        $this->createIndex(
            'idx-page-id_user',
            'mypage',
            'id_user'
        );
        $this->addForeignKey(
            'fk-page-id_user',
            'mypage',
            'id_user',
            'reg',
            'id'
        );


        $this->createIndex(
            'idx-page-id_news',
            'mypage',
            'id_news'
        );
        $this->addForeignKey(
            'fk-page-id_news',
            'mypage',
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
        $this->dropTable('{{%my_page}}');
    }
}
