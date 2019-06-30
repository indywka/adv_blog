<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mypage".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_news
 *
 * @property Blog $news
 * @property Reg $user
 */
class Mypage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mypage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_news'], 'integer'],
            [['id_news'], 'exist', 'skipOnError' => true, 'targetClass' => Blog::className(), 'targetAttribute' => ['id_news' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => Reg::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'id_news' => 'Id News',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasOne(Blog::className(), ['id' => 'id_news']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Reg::className(), ['id' => 'id_user']);
    }
}
