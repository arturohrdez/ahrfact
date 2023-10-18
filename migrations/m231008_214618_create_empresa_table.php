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
    public function up()
    {
        $this->createTable('{{%empresa}}', [
            'id'             => $this->primaryKey(),
            'razon_social'   => $this->string()->notNull(),
            'nombre'         => $this->string(),
            'rfc'            => $this->string(15)->notNull(), 
            'curp'           => $this->string(20),
            'calle'          => $this->string()->notNull(),
            'no_exterior'    => $this->integer()->notNull(),
            'no_interior'    => $this->string(100),
            'codigo_postal'  => $this->string(5)->notNull(),
            'colonia'        => $this->string()->notNull(),
            'localidad'      => $this->string()->notNull(),
            'municipio'      => $this->string()->notNull(),
            'estado'         => $this->string()->notNull(),
            'pais'           => $this->string()->notNull(),
            'referencia'     => $this->string(),
            'regimen_fiscal' => $this->string()->notNull(),
            'cliente_id'     => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-empresa-cliente_id}}',
            '{{%empresa}}',
            'cliente_id'
        );

        // add foreign key for table `{{%clientes}}`
        $this->addForeignKey(
            '{{%fk-empresa-cliente_id}}',
            '{{%empresa}}',
            'cliente_id',
            '{{%clientes}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        // drops foreign key for table `{{%rifas}}`
        $this->dropForeignKey(
            '{{%fk-empresa-cliente_id}}',
            '{{%empresa}}'
        );

        // drops index for column `rifa_id`
        $this->dropIndex(
            '{{%idx-empresa-cliente_id}}',
            '{{%empresa}}'
        );

        $this->dropTable('{{%empresa}}');
    }
}
