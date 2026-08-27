<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

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
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'full_name', 'password', 'auth_key', 'role_id', 'phone', 'email'], 'required'],
            [['role_id'], 'integer'],
            [['login', 'full_name', 'password', 'auth_key', 'phone', 'email'], 'string', 'max' => 255],
            [['login'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'full_name' => 'Full Name',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'role_id' => 'Role ID',
            'phone' => 'Phone',
            'photo' => 'Photo',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'role_id']);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }
    
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password,$this->password);
    }

    public static function findByUsername($login)
    {
        return static::findOne(['login' => $login]);
    }

    public function getIsAdmin(){
        return $this->role_id == Role::getRoleId('admin');
    }

    //public function getIsAdmin(){
    //    return $this->role_id == Role::getRoleId('admin');
    //}
}
