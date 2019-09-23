<?php

use yii\db\Migration;

class m190920_115629_create_table_puk3 extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%puk3}}', [
            'id' => $this->primaryKey(),
            'username' => $this->integer(),
            'pass' => $this->string(),
        ], $tableOptions);

        $this->createIndex('qpass', '{{%puk3}}', 'pass');
        $this->createIndex('quser', '{{%puk3}}', 'username');
        $this->addForeignKey('fkuser', '{{%puk3}}', 'username', '{{%user}}', 'id', 'CASCADE', 'NO ACTION');
    }

    public function down()
    {
        $this->dropTable('{{%puk3}}');
    }
}
