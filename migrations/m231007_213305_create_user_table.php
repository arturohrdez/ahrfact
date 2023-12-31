<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m231007_213305_create_user_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id'                   => $this->primaryKey(),
            'username'             => $this->string()->notNull()->unique(),
            'auth_key'             => $this->string(32)->notNull(),
            'password_hash'        => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email'                => $this->string()->notNull()->unique(),
            'status'               => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at'           => $this->integer()->notNull(),
            'updated_at'           => $this->integer()->notNull(),
            'cliente_id'           => $this->integer()->notNull(),
        ], $tableOptions);


         // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user-cliente_id}}',
            '{{%user}}',
            'cliente_id'
        );

        // add foreign key for table `{{%clientes}}`
        $this->addForeignKey(
            '{{%fk-user-cliente_id}}',
            '{{%user}}',
            'cliente_id',
            '{{%clientes}}',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
    
    /**
     * {@inheritdoc}
     */
    /*public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
        ]);
    }*/

    /**
     * {@inheritdoc}
     */
    /*public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }*/
}
