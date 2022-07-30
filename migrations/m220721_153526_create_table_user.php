<?php

use yii\db\Migration;

/**
 * Class m220721_153526_create_table_user
 */
class m220721_153526_create_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'name'=> $this->string(30)->notNull(),
            'family'=> $this->string(30)->notNull(),
            'address'=> $this->string(200)->notNull(),
            'phone'=> $this->string(20)->notNull(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }

}
