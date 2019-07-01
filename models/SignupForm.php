<?php


namespace app\models;

 use yii\base\Model;

class SignupForm extends Model{

    public $login;
    public $password;


    public static function tableName()
    {
        return 'reg';
    }

    public function rules() {
        return [
            [['login', 'password'], 'required', 'message' => 'Заполните поле'],
        ];
    }

    public function attributeLabels() {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
        ];
    }

    public function signup()
    {
        if($this->validate())
        {
            $user = new User();
            $user->attributes = $this->attributes;
            return $user->create();
        }
    }


}