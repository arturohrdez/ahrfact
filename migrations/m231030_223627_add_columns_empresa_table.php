<?php

use yii\db\Migration;

/**
 * Class m231030_223627_add_columns_empresa_table
 */
class m231030_223627_add_columns_empresa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    /*public function safeUp()
    {

    }*/

    /**
     * {@inheritdoc}
     */
    /*public function safeDown()
    {
        echo "m231030_223627_add_columns_empresa_table cannot be reverted.\n";

        return false;
    }*/

    
    // Use up()/down() to run migration code without a transaction.
    public function up(){
        $this->addColumn('{{%empresa}}', 'tipo', $this->string(10),);
    }

    public function down(){
        $this->dropColumn('{{%empresa}}', 'tipo');
    }
    
}
