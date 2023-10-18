<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%clientes}}`.
 */
class m231017_235154_create_clientes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable('{{%clientes}}', [
            'id'              => $this->primaryKey(),
            'nombre'          => $this->string(150)->notNull(),
            'apellidpPaterno' => $this->string(100)->notNull(),
            'apellidoMaterno' => $this->string(100)->notNull(),
            'email'           => $this->string()->notNull(),
            'telefono'        => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%clientes}}');
    }
}
