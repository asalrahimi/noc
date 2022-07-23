<?php

use yii\db\Migration;

/**
 * Class m220722_135549_create_table_reserved_service
 */
class m220722_135549_create_table_reserved_service extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reserved_service}}', [

            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'user_name' => $this->string(50)->notNull(),
            'user_family' => $this->string(50)->notNull(),
            'user_address' => $this->string(100)->notNull(),
            'service_id' => $this->integer()->notNull(),
            'service_name' => $this->string(100)->notNull(),
            'service_type' => $this->string(60)->notNull(),
            'pop_id' => $this->integer()->notNull(),
            'pop_name' => $this->string(100)->notNull(),
            'pop_type' => $this->string(100)->notNull(),
        ]);



        $this->addForeignKey(
            'fk_resesrvedService_user',
            'reserved_service',
            'user_id',
            'user',
            'id'
        );


        $this->addForeignKey(
            'fk_resesrvedService_service',
            'reserved_service',
            'service_id',
            'service',
            'id'
        );


        $this->addForeignKey(
            'fk_resesrvedService_pop',
            'reserved_service',
            'pop_id',
            'pop',
            'id'
        );
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reserved_service}}');
    }
}
