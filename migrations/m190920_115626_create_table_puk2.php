<?php

use yii\db\Migration;

class m190920_115626_create_table_puk2 extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%puk2}}', [
            'id' => $this->primaryKey(),
            'id_user' => $this->integer()->notNull(),
            'id_post' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idupost', '{{%puk2}}', 'id_post');
        $this->createIndex('iduser', '{{%puk2}}', 'id_user');
        $this->addForeignKey('fkiduser', '{{%puk2}}', 'id_user', '{{%user}}', 'id', 'CASCADE', 'NO ACTION');
        $this->addForeignKey('fkidpost', '{{%puk2}}', 'id_post', '{{%post}}', 'id', 'CASCADE', 'NO ACTION');
    }

    public function down()
    {
        $this->dropTable('{{%puk2}}');
    }
}
