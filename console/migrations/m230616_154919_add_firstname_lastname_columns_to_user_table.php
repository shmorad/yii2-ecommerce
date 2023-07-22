<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m230616_154919_add_firstname_lastname_columns_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user','firstname',$this->string(255)->after('id'));
        $this->addColumn('user','lastname',$this->string(255)->after('firstname'));
        // $this->addColumn('contacts', 'email', $this->string(64)->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }
}
