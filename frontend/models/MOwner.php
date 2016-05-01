<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "m_owner".
 *
 * @property integer $owner_id
 * @property string $owner_name
 *
 * @property Hurahura[] $hurahuras
 */
class Mowner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'm_owner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner_name'], 'required'],
            [['owner_name'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'owner_id' => 'Owner ID',
            'owner_name' => 'Owner Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHurahuras()
    {
        return $this->hasMany(Hurahura::className(), ['owner_id' => 'owner_id']);
    }
}
