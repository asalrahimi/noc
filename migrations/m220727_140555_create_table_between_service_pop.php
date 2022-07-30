<?php

use yii\db\Migration;

/**
 * Class m220727_140555_create_table_between_service_pop
 */
class m220727_140555_create_table_between_service_pop extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%service_pop}}',[

            'id'=>$this->primaryKey(),
            'service_id'=>$this->integer()->notNull(),
            'pop_id'=>$this->integer()->notNull(),

        ]);

        $this->addForeignKey(
            'fk_service',
            'service_pop',
            'service_id',
            'service',
            'id'
        );


        $this->addForeignKey(
            'fk_pop',
            'service_pop',
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
        $this->dropTable('{{%service_pop}}');
    }
}