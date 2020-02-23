<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m200221_071919_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$options = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci';
		$this->createTable('{{%products}}', [
            'id' => $this->primaryKey()->comment('ID товара'),
			'name' => $this->string()->notNull()->unique()->comment('наименование'),
			'sku' => $this->string()->notNull()->comment('SKU товара'),
        ], $options);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
