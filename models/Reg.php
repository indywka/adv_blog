<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reg".
 *
 * @property int $id
 * @property string $fname
 * @property string $sname
 * @property string $email
 * @property string $login
 * @property string $password
 * @property int $admin
 *
 * @property Comm[] $comms
 * @property Mypage[] $mypages
 */
class Reg extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reg';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin'], 'integer'],
            [['fname', 'sname', 'email', 'login', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fname' => 'Fname',
            'sname' => 'Sname',
            'email' => 'Email',
            'login' => 'Login',
            'password' => 'Password',
            'admin' => 'Admin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComms()
    {
        return $this->hasMany(Comm::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMypages()
    {
        return $this->hasMany(Mypage::className(), ['id_user' => 'id']);
    }
}
