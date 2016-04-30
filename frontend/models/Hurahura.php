<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "hurahura".
 *
 * @property integer $hurahura_id
 * @property string $service
 * @property string $owner
 * @property integer $quantity
 * @property double $price
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
            [['service', 'owner', 'quantity', 'price'], 'required'],
            [['quantity'], 'integer'],
            [['price'], 'number'],
            [['service'], 'string', 'max' => 50],
            [['owner'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hurahura_id' => 'Hurahura ID',
            'service' => 'Service',
            'owner' => 'Owner',
            'quantity' => 'Quantity',
            'price' => 'Price',
        ];
    }
}
