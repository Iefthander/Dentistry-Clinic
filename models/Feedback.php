<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * This is the model class for table "feedback".
 *
 * @property int $id
 * @property string $name

 * @property string $content
 * @property string $created_at_feedback
 * @property string $photo
 *
 */
class Feedback extends \yii\db\ActiveRecord
{

    public $imageFile;
    public bool $rules = false;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'content', 'imageFile'], 'required'],
            [['content'], 'string'],
            [['created_at_feedback'], 'safe'],
            [['name', 'photo'], 'string', 'max' => 255],
            ['rules', 'required', 'requiredValue' => 1, 'message' => 'Необходимо дать согласие на обработку персональных данных'],
           
            [['imageFile'], 'file', 'skipOnEmpty' => true,  'extensions' => 'png, jpg, jpeg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'doctor_id' => 'Врач',
            'content' => 'Комментарий',
            'created_at_feedback' => 'Дата создания',
            'imageFile' => 'Фотография',
            'rules' => 'Даю согласие на обработку персональных данных'
        ];
    }

    /**
     * Gets query for [[Doctor]].
     *
     * @return \yii\db\ActiveQuery
     */
    
    
    public function upload(string $filed = 'photo'){
        if ($this->validate()){
            $fileName = Yii::$app->security->generateRandomString(10)
                . '_'
                . time()
                . '.'
                . $this->imageFile->extension
                ;
            $this->imageFile->saveAs('feedbackimg/' . $fileName);
            $this->$filed = $fileName;
            return true;
        } else {
            return false;
        }
    }
}
