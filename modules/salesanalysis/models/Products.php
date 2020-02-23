<?php

namespace app\modules\salesanalysis\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id ID товара
 * @property string $name наименование
 * @property string $sku SKU товара
 *
 * @property PurchasePositions[] $purchasePositions
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'sku'], 'required'],
            [['name', 'sku'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'sku' => 'Sku',
        ];
    }

    /**
     * Gets query for [[PurchasePositions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPurchasePositions()
    {
        return $this->hasMany(PurchasePositions::className(), ['product_id' => 'id']);
    }
}
