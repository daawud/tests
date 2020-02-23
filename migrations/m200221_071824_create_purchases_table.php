<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%purchases}}`.
 */
class m200221_071824_create_purchases_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$options = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci';
		$this->createTable('{{%purchases}}', [
            'id' => $this->primaryKey()->comment('ID покупки'),
			'price' => $this->integer()->defaultValue('0')->comment('сумма чека'),
			'user_id' => $this->integer()->comment('ID пользователя'),
			'purchase_date' => $this->dateTime()->comment('время и дата пробития чека'),
		], $options);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%purchases}}');
    }
}
