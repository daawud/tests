<?php

namespace app\modules\salesanalysis\models;

use Yii;

/**
 * This is the model class for table "purchases".
 *
 * @property int $id ID покупки
 * @property int|null $price сумма чека
 * @property int|null $user_id ID пользователя
 * @property string|null $purchase_date время и дата пробития чека
 *
 * @property PurchasePositions[] $purchasePositions
 */
class Purchases extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'purchases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'user_id'], 'integer'],
            [['purchase_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID чека',
            'price' => 'Сумма покупки',
            'user_id' => 'ID клиента',
            'purchase_date' => 'Дата покупки',
        ];
    }

    /**
     * Gets query for [[PurchasePositions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchasePositions()
    {
        return $this->hasMany(PurchasePositions::className(), ['purchase_id' => 'id']);
    }
    
}
