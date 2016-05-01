<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "hurahura".
 *
 * @property integer $hurahura_id
 * @property string $date
 * @property string $service
 * @property integer $owner_id
 * @property integer $quantity
 * @property double $price
 *
 * @property MOwner $owner
 */
class Hurahura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hurahura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'service', 'owner_id', 'quantity', 'price'], 'required'],
            [['date'], 'safe'],
            [['owner_id', 'quantity'], 'integer'],
            [['price'], 'number'],
            [['service'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hurahura_id' => 'Hurahura ID',
            'date' => 'Date',
            'service' => 'Service',
            'owner_id' => 'Owner ID',
            'quantity' => 'Quantity',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(MOwner::className(), ['owner_id' => 'owner_id']);
    }
}
