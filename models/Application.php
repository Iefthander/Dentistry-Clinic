<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property string|null $message
 * @property string $problem
 * @property int $branch_id
 * @property string $date_str
 * @property string $created_at
 * @property int $status_id
 * @property int $user_id
 * @property int $services_id
 *
 * @property Branch $branch
 * @property Services $services
 * @property Status $status
 * @property User $user
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['problem', 'branch_id', 'status_id', 'user_id', 'services_id'], 'required'],
            [['problem'], 'string'],
            [['branch_id', 'status_id', 'user_id', 'services_id'], 'integer'],
            [['date_str', 'created_at'], 'safe'],
            [['message'], 'string', 'max' => 255],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => Branch::class, 'targetAttribute' => ['branch_id' => 'id']],
            [['services_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::class, 'targetAttribute' => ['services_id' => 'id']],
            ['problem', 'string', 'max' => 40, 'tooLong' => 'Комментарий должен содержать не более 50 символов!']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID Пользователя',
            'message' => 'Сообщение',
            'problem' => 'Краткое описание проблемы',
            'branch_id' => 'Филиал',
            'date_str' => 'Желаемая дата приёма',
            'created_at' => 'Дата создания',
            'status_id' => 'Статус',
            'user_id' => 'ID Пользователя',
            'services_id' => 'Услуга',
        ];
    }

    /**
     * Gets query for [[Branch]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBranch()
    {
        return $this->hasOne(Branch::class, ['id' => 'branch_id']);
    }

    /**
     * Gets query for [[Services]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasOne(Services::class, ['id' => 'services_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
