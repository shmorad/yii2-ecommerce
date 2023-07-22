<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_addresses}}`.
 */
class m230612_082955_create_order_addresses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_addresses}}', [
            'order_id'=> $this->primaryKey(),
            'address'=> $this->string(255)->notNull(),
            'city' =>$this->string(255)->notNull(),
            'state'=>$this->string(255)->notNull(),
            'country'=>$this->string(255)->notNull(),
            'zipcode' => $this->string(255),
        ]);

        // create index for Column 'order_id'
        $this->createIndex(
            '{{%idx-order_addresses-order_id}}',
            '{{%order_addresses}}',
            'order_id'
        );
        $this->addForeignKey(
            '{{%fk-order_addresses-order_id}}',
            '{{%order_addresses}}',
            'order_id',
            '{{%orders}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%order_addresses}}');
    }
}
