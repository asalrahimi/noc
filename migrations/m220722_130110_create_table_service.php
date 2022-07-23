<?php

use yii\db\Migration;

/**
 * Class m220722_130110_create_table_service
 */
class m220722_130110_create_table_service extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%service}}',[

            'id'=>$this->primaryKey(),
            'name'=>$this->string(100)->notNull(),
            'type'=>$this->integer()->notNull(),
            'max_use_no'=>$this->integer()->notNull(),
            'pop_or_point'=>$this->integer()->notNull(),

        ]);

        
        $this->addForeignKey(
            'fk_service_pop',
            'service',
            'pop_or_point',
            'pop',
            'name'
        );
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%service}}');

    }

}
