<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "branch".
 *
 * @property int $id
 * @property string $title
 *
 * @property Application[] $applications
 */
class Branch extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'branch';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'title' => 'Филиал',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['branch_id' => 'id']);
    }

    public static function getBranch(){
        return (new Query())
            ->select('title')
            ->from('branch')
            ->indexBy('id')
            ->column();
    }
}
