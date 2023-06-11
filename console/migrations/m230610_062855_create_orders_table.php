<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 */
class m230610_062855_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'total_price'=> $this->integer(11)->notNull(),
            'status'=> $this->string(255)->notNull(),
            'firstname'=> $this->string(255)->notNull(),
            'lastname' => $this->string(255)->notNull(),
            'email' => $this->string(255),
            'transaction_id' => $this->string(255),
            'created_at'=>$this->integer(11),
            'created_by' =>$this->integer(11),
        ]);

        // create index for Column 'created_by'
        $this->createIndex(
            '{{%idx-orders-created_by}}',
            '{{%orders}}',
            'created_by'
        );
        $this->addForeignKey(
            '{{%fk-orders-created_by}}',
            '{{%orders}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%orders}}');
    }
}
