<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $full_name
 * @property string $password
 * @property string $auth_key
 * @property int $role_id
 * @property string $phone
 * @property string $email
 *
 * @property Application[] $applications
 * @property Role $role
 */
class RegisterForm extends \yii\base\Model
{
    public string $login = '';
    public string $full_name = '';
    public string $password = '';
    public string $password_repeat = '';
    public string $phone = '';
    public string $email  = '';
    public string $auth_key  = '';
    public string $role_id  = '';
    public bool $rules = false;
    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['login', 'full_name', 'password', 'phone', 'email'], 'required'],
            [['login', 'full_name', 'password', 'phone', 'email'], 'string', 'max' => 255],
            [['login', 'email'], 'unique', 'targetClass' => User::class,],
            ['email', 'email'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            ['password', 'string', 'min' => 6, 'tooShort' => 'Используйте не менее 6 символов'],
            ['login', 'string', 'min' => 4, 'tooShort' => 'Используйте не менее 4 символов'],
            ['login', 'match', 'pattern' => '/^[a-zA-Z0-9\-]+$/'],
            ['full_name', 'match', 'pattern' => '/^[а-яёА-ЯЁ\-\s]+$/u'],
            ['password', 'match', 'pattern' => '/^[a-zA-Z0-9]+$/'],
            ['password_repeat', 'match', 'pattern' => '/^[a-zA-Z0-9]+$/'],
            ['phone', 'match', 'pattern' => '/^(\+7\(\d{3}\)\-\d{3}\-\d{2}\-\d{2})+$/'],
            ['rules', 'required', 'requiredValue' => 1, 'message' => 'Должно быть отмечено']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'full_name' => 'ФИО',
            'password' => 'Пароль',
            'password_repeat' => 'Повтор пароля',
            'auth_key' => 'Auth Key',
            'role_id' => 'Role ID',
            'phone' => 'Телефон',
            'email' => 'Email',
            'rules' => 'Даю согласие на обработку персональных данных'
        ];
    }

    public function registerUser(){
        if ($this->validate()) {
            $user = new User();
            $user -> attributes = $this->attributes;
            $user -> password = Yii::$app->security->generatePasswordHash($this->password);
            $user -> auth_key = Yii::$app->security->generateRandomString();
            $user -> role_id = Role::getRoleId('user');
            if (!$user -> save()){
                Yii::$app->session->setFlash('danger', 'Регистрация не удалась');
            }
        }
        return $user ?? false;
    }

    
}
