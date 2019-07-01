<?php


namespace app\models;

use yii\base\Model;

class SignupForm extends Model
{

    public $login;
    public $password;
    public $fname;
    public $sname;
    public $email;


    public static function tableName()
    {
        return 'reg';
    }

    public function rules()
    {
        return [
            [['fname', 'sname', 'email', 'login', 'password'], 'required', 'message' => 'Заполните поле'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'fname' => 'Fname',
            'sname' => 'Sname',
            'email' => 'Email',
            'login' => 'Login',
            'password' => 'Password',
        ];
    }

    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->attributes = $this->attributes;
            return $user->create();
        }
    }


}