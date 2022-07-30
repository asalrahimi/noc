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
<<<<<<< HEAD
            'phone'=> $this->string(11)->notNull(),
=======
<<<<<<< HEAD
            'phone'=> $this->string(11)->notNull(),
=======
            'phone'=> $this->integer(11)->notNull(),
>>>>>>> 4d6b9e2206d5b6f9676307fdad550c006ac14bd6
>>>>>>> ea3cea29e22933ddd4f7073f48ee1ad59c9f63a5
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
