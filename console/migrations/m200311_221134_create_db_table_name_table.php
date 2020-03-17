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
            'title' => $this->string(),
            'user_id' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('NOW()'),
            'updated_at' => $this->timestamp()->defaultExpression('NOW()')
        ]);

        $this->addForeignKey(
            'fk-user_id-user-table',
            'db_table_name',
            'user_id',
            'user',
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
        $this->dropForeignKey('fk-user_id-user-table', 'db_table_name');
        $this->dropTable('{{%db_table_name}}');
    }
}
