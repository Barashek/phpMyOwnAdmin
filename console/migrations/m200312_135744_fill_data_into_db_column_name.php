<?php

use yii\db\Migration;

/**
 * Class m200312_135744_fill_data_into_db_column_name
 */
class m200312_135744_fill_data_into_db_column_name extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(
            'db_column_name',
            ['name', 'table_id', 'type_id', 'is_null'],
            [
                ['name', 1, 2, false],
                ['name', 2, 2, false],
                ['name', 3, 2, false],
                ['created_at', 1, 5, true],
                ['created_at', 2, 5, true],
                ['created_at', 3, 5, true],
                ['updated_at', 1, 5, true],
                ['updated_at', 2, 5, true],
                ['table_id', 2, 1, false],
                ['type_id', 2, 1, false],
                ['id', 1, 1, false],
                ['id', 2, 1, false],
                ['id', 3, 1, false],
                ['title', 1, 2, true],
                ['user_id', 2, 1, true],
                ['isNull', 2, 4, false],
                ['size', 2, 1, true]
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200312_135744_fill_data_into_db_column_name cannot be reverted.\n";

        return false;
    }
    */
}
