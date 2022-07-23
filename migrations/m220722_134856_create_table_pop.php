<?php

use yii\db\Migration;

/**
 * Class m220722_134856_create_table_pop
 */
class m220722_134856_create_table_pop extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pop}}',[

            'id'=>$this->primaryKey(),
            'name'=>$this->string(100)->notNull(),
            'type'=>$this->string(10)->notNull(),
            'max_use_no'=>$this->integer()->notNull(),
        ]);

            }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pop}}');

    }

}
