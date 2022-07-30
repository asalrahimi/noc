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
            'service_id' => $this->integer()->notNull(),
            'pop_id' => $this->integer()->notNull(),
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
