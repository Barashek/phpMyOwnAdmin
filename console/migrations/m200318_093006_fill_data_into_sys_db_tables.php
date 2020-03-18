<?php

use yii\db\Migration;

/**
 * Class m200318_093006_fill_data_into_sys_db_tables
 */
class m200318_093006_fill_data_into_sys_db_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('db_table_name', [
            'name' => 'category'
        ]);

        $this->batchInsert(
            'db_column_name',
            ['name', 'table_id', 'type_id', 'is_null'],
            [
                ['name', 4, 2, false],
                ['id', 4, 1, false]
            ]);
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
        echo "m200318_093006_fill_data_into_sys_db_tables cannot be reverted.\n";

        return false;
    }
    */
}
