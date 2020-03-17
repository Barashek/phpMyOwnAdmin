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
            'type_id' => $this->integer()->notNull(),
            'size' => $this->integer(),
            'is_null' => $this->boolean(),
            'created_at' => $this->timestamp()->defaultExpression('NOW()'),
            'updated_at' => $this->timestamp()->defaultExpression('NOW()')
        ]);


        $this->addForeignKey(
            'fk-table_id-db_table_name',
            'db_column_name',
            'table_id',
            'db_table_name',
            'id',
            'cascade',
            'cascade'
        );

        $this->addForeignKey(
            'fk-type_id-db_column_type',
            'db_column_name',
            'type_id',
            'db_column_type',
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
        $this->dropForeignKey('fk-type_id-db_column_type', 'db_column_name');
        $this->dropForeignKey('fk-table_id-db_table_name', 'db_column_name');
        $this->dropTable('{{%db_column_name}}');
    }
}
