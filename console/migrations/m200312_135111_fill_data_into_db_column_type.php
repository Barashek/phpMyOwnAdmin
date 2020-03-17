<?php

use yii\db\Migration;

/**
 * Class m200312_135111_fill_data_into_db_column_name
 */
class m200312_135111_fill_data_into_db_column_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(
            'db_column_type',
            ['name'],
            [
                ['int'],
                ['varchar'],
                ['text'],
                ['bool'],
                ['timestamp'],
                ['float'],
                ['date'],
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
        echo "m200312_135111_fill_data_into_db_column_name cannot be reverted.\n";

        return false;
    }
    */
}
