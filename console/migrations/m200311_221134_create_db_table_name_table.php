<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%db_table_name}}`.
 */
class m200311_221134_create_db_table_name_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%db_table_name}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp()
        ]);

//        $this->insert('{{%db_table_name}}',
//            [
//                'name' => 'db_table_name',
//                'created_at' => date("Y-m-d H-i-s")
//            ]
//        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%db_table_name}}');
    }
}
