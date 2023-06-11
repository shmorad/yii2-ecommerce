<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_addresses}}`.
 */
class m230609_052855_create_user_addresses_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_addresses}}', [
            'id' => $this->primaryKey(),
            'user_id'=> $this->integer(11)->notNull(),
            'address'=> $this->string(255)->notNull(),
            'city'=> $this->string(255)->notNull(),
            'country' => $this->string(255)->notNull(),
            'zipcode' => $this->string(255),
        ]);

        // create index for Column 'user_id'
        $this->createIndex(
            '{{%idx-user_addresses-user_id}}',
            '{{%user_addresses}}',
            'user_id'
        );
        $this->addForeignKey(
            '{{%fk-user_addresses-user_id}}',
            '{{%user_addresses}}',
            'user_id',
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
        $this->dropTable('{{%user_addresses}}');
    }
}
