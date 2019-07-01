<?php
//
//namespace app\models;
//
//use yii\data\Pagination;
//use yii\web\IdentityInterface;
//
//class User extends \yii\db\ActiveRecord implements IdentityInterface
//
//{
//    public $id;
//    public $username;
//    public $password;
//    public $authKey;
//    public $accessToken;
//
//    private static $users
//        = [
//            '100' => [
//                'id' => '100',
//                'username' => 'admin',
//                'password' => 'admin',
//                'authKey' => 'test100key',
//                'accessToken' => '100-token',
//            ],
//            '101' => [
//                'id' => '101',
//                'username' => 'demo',
//                'password' => 'demo',
//                'authKey' => 'test101key',
//                'accessToken' => '101-token',
//            ],
//            '102' => [
//                'id' => '102',
//                'username' => 'solnyshko2019',
//                'password' => 'solnyshko2019',
//                'authKey' => 'test102key',
//                'accessToken' => '102-token',
//            ],
//        ];
//
//
//    /**
//     * {@inheritdoc}
//     */
//    /**
//     * @inheritdoc
//     */
//    public static function tableName()
//    {
//        return 'reg';
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function rules()
//    {
//        return [
//            [['admin'], 'boolean'],
//            [['fname', 'sname', 'email', 'login', 'password'], 'string', 'max' => 255],
//        ];
//    }
//
//    /**
//     * @inheritdoc
//     */
//    public function attributeLabels()
//    {
//        return [
//            'id' => 'ID',
//            'fname' => 'First Name',
//            'sname' => 'Second Name',
//            'emaill' => 'Email',
//            'login' => 'Login',
//            'password' => 'Password',
//            'admin' => 'Admin',
//        ];
//    }
//

//}


namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property integer $isAdmin
 * @property string $photo
 *
 * @property Comment[] $comments
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reg';
    }

    public function rules()
    {
        return [
            [['admin'], 'boolean'],
            [['fname', 'sname', 'email', 'login', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fname' => 'First Name',
            'sname' => 'Second Name',
            'emaill' => 'Email',
            'login' => 'Login',
            'password' => 'Password',
            'admin' => 'Admin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */


    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public function getId()
    {
        return $this->id;
    }



    public static function findByUsername($username)
    {
        $user = self::find()->where(["login" => $username])->one();

        if (!count($user)) {
            return null;
        }

        return new static($user);
    }


//    public static function findIdentity($id)
//    {
//        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
//    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return ($this->password == $password) ? true : false;
    }

    public static function findByEmail($email)
    {
        return User::find()->where(['email' => $email])->one();
    }

    public function create()
    {
        return $this->save(false);
    }
}
