<?php

use yii\db\Migration;

/**
 * Class m231030_182331_update_columns_empresa_table
 */
class m231030_182331_update_columns_empresa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    /*public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m231030_182331_update_columns_empresa_table cannot be reverted.\n";

        return false;
    }*/

    
    // Use up()/down() to run migration code without a transaction.
    public function up(){
        $this->alterColumn('{{%empresa}}', 'no_exterior', $this->string(45)->notNull());
        $this->alterColumn('{{%empresa}}', 'localidad', $this->string(100));
    }

    public function down()
    {
        $this->alterColumn('{{%empresa}}', 'no_exterior', $this->integer()->notNull());
        $this->alterColumn('{{%empresa}}', 'estado', $this->string()->notNull());
    }

}
