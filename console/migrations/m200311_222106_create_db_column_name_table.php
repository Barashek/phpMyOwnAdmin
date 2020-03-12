<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%db_column_name}}`.
 */
class m200311_222106_create_db_column_name_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%db_column_name}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'table_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp()
        ]);

//        $this->insert('db_table_name',
//            [
//                'name' => 'db_column_name',
//                'created_at' => date("Y-m-d H-i-s")
//            ]
//        );

        $this->addForeignKey(
            'fk-table_id-db_table_name',
            'db_column_name',
            'table_id',
            'db_table_name',
            'id',
            'cascade',
            'cascade'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-table_id-db_table_name', 'db_column_name');
        $this->dropTable('{{%db_column_name}}');
    }
}
