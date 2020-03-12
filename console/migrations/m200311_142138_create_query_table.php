<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%query}}`.
 */
class m200311_142138_create_query_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%query}}', [
            'id' => $this->primaryKey(),
            'query' => $this->text(),
            'created_at' => $this->timestamp()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%query}}');
    }
}
