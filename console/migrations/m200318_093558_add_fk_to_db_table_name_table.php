<?php

use yii\db\Migration;

/**
 * Class m200318_093558_add_fk_to_db_table_name_table
 */
class m200318_093558_add_fk_to_db_table_name_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-category_id-category-table',
            'db_table_name',
            'category_id',
            'category',
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
        $this->dropForeignKey('fk-category_id-category-table', 'db_table_name');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200318_093558_add_fk_to_db_table_name_table cannot be reverted.\n";

        return false;
    }
    */
}
