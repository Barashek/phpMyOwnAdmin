<?php

use yii\db\Migration;

/**
 * Class m200312_131859_fill_data_into_db_table_name
 */
class m200312_131859_fill_data_into_db_table_name extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(
            '{{%db_table_name}}',
            ['name'],
            [
                ['db_table_name'],
                ['db_column_name'],
                ['db_column_type'],
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
        echo "m200312_131859_fill_data_into_db_table_name cannot be reverted.\n";

        return false;
    }
    */
}
