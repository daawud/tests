<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%purchase_positions}}`.
 */
class m200221_072004_create_purchase_positions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$options = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci';
		$this->createTable('{{%purchase_positions}}', [
            'id' => $this->integer()->notNull()->comment('ID строки чека'),
            'purchase_id' => $this->integer()->notNull()->comment('ID покупки'),
            'product_id' => $this->integer()->notNull()->comment('ID товара'),
			'quantity' => $this->integer()->notNull()->comment('количество товара в строке чека'),
		], $options);
	
		// add foreign key for table `purchases`
		$this->addForeignKey(
			'fk-purchase_positions-purchase_id',
			'purchase_positions',
			'purchase_id',
			'purchases',
			'id',
			'CASCADE'
		);
	
		// add foreign key for table `products`
		$this->addForeignKey(
			'fk-purchase_positions-product_id',
			'purchase_positions',
			'product_id',
			'products',
			'id',
			'CASCADE'
		);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
		// drops foreign key for table `purchases`
		$this->dropForeignKey(
			'fk-purchase_positions-purchase_id',
			'purchase_positions'
		);
	
		// drops foreign key for table `products`
		$this->dropForeignKey(
			'fk-purchase_positions-product_id',
			'purchase_positions'
		);
    	
        $this->dropTable('{{%purchase_positions}}');
    }
}
