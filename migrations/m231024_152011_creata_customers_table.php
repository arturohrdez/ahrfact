<?php

use yii\db\Migration;

/**
 * Class m231024_152011_creata_customers_table
 */
class m231024_152011_creata_customers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up(){
        $this->createTable('{{%customers}}', [
            'id'               => $this->primaryKey(),
            'cliente_id'       => $this->integer()->notNull(),
            'razon_social'     => $this->string(125)->notNull(),
            'nombre_comercial' => $this->string(150),
            'email'            => $this->string(120),
            'telefono'         => $this->string(15),
            'rfc'              => $this->string(13)->notNull(),
            'uso_cfdi'         => $this->string(30)->notNull(),
            'regimen_fiscal'   => $this->string(80)->notNull(),
            'forma_pago'       => $this->string(80)->notNull(),
            'comentarios'      => $this->text(),
            'pais'             => $this->string(80),
            'estado'           => $this->string(100),
            'ciudad'           => $this->string(100),
            'municipio'        => $this->string(100),
            'codigo_postal'    => $this->string(15)->notNull(),
            'colonia'          => $this->string(200),
            'calle'            => $this->string(120),
            'no_exterior'      => $this->string(45),
            'no_interior'      => $this->string(45),
            'referencia'       => $this->text(),
            'tipo'             => $this->string(10),
            'estatus'          => $this->string(5)->notNull()

        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-customers-cliente_id}}',
            '{{%customers}}',
            'cliente_id'
        );

        // add foreign key for table `{{%clientes}}`
        $this->addForeignKey(
            '{{%fk-customers-cliente_id}}',
            '{{%customers}}',
            'cliente_id',
            '{{%clientes}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down(){
        // drops foreign key for table `{{%rifas}}`
        $this->dropForeignKey(
            '{{%fk-customers-cliente_id}}',
            '{{%customers}}'
        );

        // drops index for column `rifa_id`
        $this->dropIndex(
            '{{%idx-customers-cliente_id}}',
            '{{%customers}}'
        );

         $this->dropTable('{{%customers}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231024_152011_creata_customers_table cannot be reverted.\n";

        return false;
    }
    */
}
