<?php


namespace frontend\models\forms;


use frontend\models\User;
use Yii;
use yii\base\Model;

class LoginForm extends Model
{

    public $username;
    public $password;

    private $_user = false;

    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'validateUsername'],
            ['password', 'required'],
            ['password', 'validatePassword'],
        ];
    }

    public function login()
    {
        if ($this->validate()) {
//            $user = User::findByUsername($this->username);
            return Yii::$app->user->login($this->getUser(),  3600*24*30);
        }
        return false;
    }

    public function validateUsername($attribute, $params) {
        $user = User::findByUsername($this->username);

        if (!$user) {
            $this->addError($attribute, 'Неверно указан пользователь');
        }
    }

    public function validatePassword($attribute, $params)
    {
        $user = User::findByUsername($this->username);

        if (!$user || !$user->validatePassword($this->password)) {
            $this->addError($attribute, 'Неверный пароль');
        }
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

}