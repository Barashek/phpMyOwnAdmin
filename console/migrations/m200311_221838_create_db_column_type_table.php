<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%db_column_type}}`.
 */
class m200311_221838_create_db_column_type_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%db_column_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'created_at' => $this->timestamp()->defaultExpression('NOW()')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%db_column_type}}');
    }
}
