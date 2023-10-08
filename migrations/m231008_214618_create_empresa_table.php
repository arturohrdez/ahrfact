<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%empresa}}`.
 */
class m231008_214618_create_empresa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%empresa}}', [
            'id'             => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'razon_social'   => $this->string()->notNull(),
            'nombre'         => $this->string()->notNull(),
            'rfc'            => $this->string(15)->notNull(), 
            'curp'           => $this->string(20)->notNull(),
            'calle'          => $this->string()->notNull(),
            'no_exterior'    => $this->integer()->notNull(),
            'no_interior'    => $this->string(100)->notNull(),
            'codigo_postal'  => $this->string(5)->notNull(),
            'colonia'        => $this->string()->notNull(),
            'localidad'      => $this->string()->notNull(),
            'municipio'      => $this->string()->notNull(),
            'estado'         => $this->string()->notNull(),
            'pais'           => $this->string()->notNull(),
            'referencia'     => $this->string()->notNull(),
            'regimen_fiscal' => $this->string()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-empresa-user_id}}',
            '{{%empresa}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-empresa-user_id}}',
            '{{%empresa}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%rifas}}`
        $this->dropForeignKey(
            '{{%fk-users-user_id}}',
            '{{%user}}'
        );

        // drops index for column `rifa_id`
        $this->dropIndex(
            '{{%idx-users-user_id}}',
            '{{%user}}'
        );

        $this->dropTable('{{%empresa}}');
    }
}
