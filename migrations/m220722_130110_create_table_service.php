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
            'max_use_no'=>$this->integer()->notNull(),

        ]);

            }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%service}}');

    }

}
