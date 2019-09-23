<?php

use yii\db\Migration;

class m190920_115636_create_table_tovari extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%tovari}}', [
            'id' => $this->primaryKey(),
            'id_category' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createIndex('id_category', '{{%tovari}}', 'id_category');
        $this->addForeignKey('tovari_ibfk_1', '{{%tovari}}', 'id_category', '{{%category}}', 'id', 'CASCADE', 'RESTRICT');
    }

    public function down()
    {
        $this->dropTable('{{%tovari}}');
    }
}
